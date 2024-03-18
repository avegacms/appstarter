<?php


use CodeIgniter\Database\Seeder;

use CodeIgniter\CLI\CLI;

class UpDump extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        if (CLI::prompt('Запустит распаковку дампа базы', ['y', 'n']) === 'n') {
            return;
        }
        if (CLI::prompt('ВНИМАНИЕ!!! Текущая база будет удалена, но будет сделан бекап', ['y', 'n']) === 'n') {
            return;
        }

        shell_exec('cd ' . FCPATH . '../ && ./db_backup.sh');

        if ( ! file_exists(WRITEPATH . 'backups/dump.sql')) {
            CLI::write('Не удалось найти dump.sql', 'red');
        }

        $result = shell_exec(
            sprintf(
                'cd %s 2>&1 && mysql -u%s -p%s %s < dump.sql 2>&1',
                WRITEPATH . 'backups/',
                env('database.default.username'),
                env('database.default.password'),
                env('database.default.database')
            )
        );

        if ($result !== null) {
            CLI::write('Ошибка установки dump.sql', 'red');
        } else {
            CLI::write('База данных успешно загружена из dump.sql', 'green');
        }
    }
}
