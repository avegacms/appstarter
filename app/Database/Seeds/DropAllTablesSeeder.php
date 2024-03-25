<?php


use CodeIgniter\CLI\CLI;
use CodeIgniter\Database\Seeder;
use Config\Database;

class DropAllTablesSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        if (CLI::prompt('Drop all tables?', ['y', 'n']) === 'y') {
            if (ENVIRONMENT === 'production') {
                return;
            }

            $this->db = Database::connect();

            if (($tables = $this->db->listTables())) {
                $i   = 1;
                $num = count($tables);
                foreach ($tables as $table) {
                    CLI::showProgress($i++, $num);
                    $this->forge->dropTable($this->db->getPrefix() . $table, true, true);
                }
                CLI::showProgress(false);
                CLI::newLine();
            }
        }
    }
}
