<?php

namespace Modules\Admin\Views;

use App\Utils\Nuxt;

$nuxt = new Nuxt(
    [
        'rootDir'   => ROOTPATH . 'admin/',
        'outputDir' => 'dist/admin/',
        'devServer' => ['host' => 'http://172.17.120.189:3000/'],
    ]
);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $nuxt->assets ?>
    <title>Admin</title>
</head>
<body>
<div id="__nuxt"></div>
<div id="teleports"></div>
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
        app: { baseURL: "/admin", buildAssetsDir: "/dist/admin/_nuxt/", cdnURL: "" }
    };
</script>
</body>
</html>
