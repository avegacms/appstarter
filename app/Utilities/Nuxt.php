<?php

declare(strict_types=1);

namespace App\Utilities;

class Nuxt
{
    private array $manifest;
    public bool $isDev    = false;
    public string $assets = '';

    /**
     * @param  array{
     *     rootDir: string,
     *     outputDir: string,
     *     devServer?: array{
     *         host: string,
     *     }
     * }  $config
     */
    public function __construct(
        array $config
    ) {
        $manifest = @file_get_contents($config['rootDir'] . '.nuxt/dist/server/client.manifest.json');

        if ($manifest !== false) {
            $this->manifest = json_decode($manifest, true);
            $this->isDev    = isset($this->manifest['@vite/client']);

            $_js  = [];
            $_css = [];

            $path = ($this->isDev ? $config['devServer']['host'] ?? base_url() : $config['outputDir']) . '_nuxt/';

            helper('html');

            foreach ($this->manifest as $item) {
                if ($item['isEntry'] ?? false) {
                    $_js[] = script_tag([
                        'src'     => $path . $item['file'],
                        'type'    => 'module',
                        'charset' => 'UTF-8',
                    ]);

                    if (isset($item['css'])) {
                        foreach ($item['css'] as $css) {
                            $_css[] = link_tag(
                                [
                                    'href'  => $path . $css,
                                    'rel'   => 'stylesheet',
                                    'type'  => 'text/css',
                                    'media' => 'all',
                                ]
                            );
                        }
                    }
                }
            }

            $this->assets = implode(PHP_EOL, [
                implode(PHP_EOL, $_css),
                implode(PHP_EOL, $_js),
            ]);
        }
    }
}
