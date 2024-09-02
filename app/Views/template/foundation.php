<?php

declare(strict_types = 1);

use App\Utilities\Nuxt;
use CodeIgniter\Config\Services;
use CodeIgniter\View\View;

/**
 * @var object|array|null $meta
 * @var object|array|null $breadcrumbs
 * @var string $template
 * @var object|array|null $content
 * @var array $data
 * @var View $this
 */
$app = [
    'breadcrumbs' => $breadcrumbs,
    'is404'       => Services::response()->getStatusCode() === 404,
    'data'        => $data,
    'meta'        => $meta,
    'content'     => $content,
];

$nuxt = new Nuxt(
    [
        'rootDir'   => ROOTPATH . 'template/',
        'outputDir' => 'dist/template/',
        'devServer' => ['host' => env('NUXT_HOST')],
    ]
)
?>

<!doctype html>
<html class="no-js" lang="<?php echo $meta->lang ?>">
<head>
    <meta charset="utf-8">
    <title><?php echo $meta->title ?></title>
    <meta name="keywords" content="<?php echo $meta->keywords ?>">
    <meta name="description" content="<?php echo $meta->description ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:site_name" content="<?php echo $meta->open_graph->site_name ?>">
    <meta property="og:locale" content="<?php echo $meta->open_graph->locale ?>">
    <meta property="og:title" content="<?php echo $meta->open_graph->title ?>">
    <meta property="og:type" content="<?php echo $meta->open_graph->type ?>">
    <meta property="og:url" content="<?php echo $meta->open_graph->url ?>">
    <meta property="og:image" content="<?php echo $meta->open_graph->image ?>">

    <?php if ($meta->use_multi_locales) : foreach ($meta->alternate as $item): ?>
        <link rel="alternate" hreflang="<?php echo $item['hreflang'] ?>" href="<?php echo $item['href'] ?>">
    <?php endforeach; endif; ?>

    <link rel="canonical" href="<?php echo $meta->canonical ?>">

    <meta name="robots" content="<?php echo $meta->robots ?>">

    <link rel="apple-touch-icon" sizes="57x57" href="/static/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/static/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/static/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/static/apple-touch-icon-144x144.png">
    <link rel="shortcut icon" href="/static/favicon.ico" type="image/x-icon">

    <meta name="theme-color" content="#ffffff">

    <?php if ($nuxt->isDev): ?>
        <script>
            if (!window.__NUXT_DEVTOOLS_TIME_METRIC__) {
                Object.defineProperty(window, "__NUXT_DEVTOOLS_TIME_METRIC__", {
                    value: {},
                    enumerable: false,
                    configurable: true
                });
            }
            window.__NUXT_DEVTOOLS_TIME_METRIC__.appInit = Date.now();
        </script>
    <?php endif; ?>

    <?php echo $nuxt->assets ?>
</head>

<body>
<div id="__nuxt"></div>
<div id="teleports"></div>
<script>window.__NUXT_LOGS__ = [];</script>
<script type="application/json" id="__NUXT_DATA__" data-ssr="false">
    [
        {
            "_errors": 1,
            "serverRendered": 2,
            "data": 3,
            "state": 4,
            "once": 5
        },
        {},
        false,
        {},
        {},
        [
            "Set"
        ]
    ]
</script>
<script>
    window.__NUXT__ = {};
    window.__NUXT__.config = {
        public: {},
        app: {baseURL: "/", buildAssetsDir: "/dist/template/", cdnURL: ""}
    };
</script>
<script type="text/javascript">
    document.$app = <?php echo json_encode($app, JSON_UNESCAPED_UNICODE)?>;
</script>
</html>
