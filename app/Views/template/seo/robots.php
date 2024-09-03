<?php

declare(strict_types=1);

use AvegaCms\Utilities\Cms;

helper(['url']);

$allowList = [
    '/uploads/content/',
    '/uploads/modules/',
    '/uploads/sitemap/',
];
$disallowList = [
    '/*?*',
    '/*?',
    '*?page',
    '*?*=',
    '/search/',
    '/search/*?*',

    '*utm*=',
    '*openstat=',
];
$robots = 'User-agent: *' . PHP_EOL;

if (Cms::settings('core.seo.allowSiteIndexing')) {
    foreach ($allowList as $item) {
        $robots .= 'Allow: ' . $item . PHP_EOL;
    }

    $robots .= PHP_EOL . PHP_EOL;

    foreach ($disallowList as $item) {
        $robots .= 'Disallow: ' . $item . PHP_EOL;
    }

    $robots .= PHP_EOL . PHP_EOL .
        'Host: ' . base_url() . PHP_EOL .
        'Sitemap: ' . base_url('sitemap.xml') . PHP_EOL;
} else {
    $robots .= 'Disallow: ' . PHP_EOL;
}

echo $robots;
