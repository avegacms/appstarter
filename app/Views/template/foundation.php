<?php

use AvegaCms\Utilities\Vite;
use AvegaCms\Entities\Seo\{MetaEntity, BreadCrumbsEntity};
use CodeIgniter\Pager\Pager;

/**
 * @var MetaEntity|null $meta
 * @var BreadCrumbsEntity[] $breadcrumbs
 * @var Pager|null $pager
 * @var string $template
 */

?>

<!doctype html>
<html class="no-js" lang="<?php echo $meta->lang ?>">
<head>
    <meta charset="utf-8">
    <title><?php echo $meta->title ?></title>
    <meta name="keywords" content="<?php echo $meta->keywords ?>">
    <meta name="description" content="<?php echo $meta->description ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:site_name" content="<?php echo $meta->openGraph->siteName ?>">
    <meta property="og:locale" content="<?php echo $meta->openGraph->locale ?>">
    <meta property="og:title" content="<?php echo $meta->openGraph->title ?>">
    <meta property="og:type" content="<?php echo $meta->openGraph->type ?>">
    <meta property="og:url" content="<?php echo $meta->openGraph->url ?>">
    <meta property="og:image" content="<?php echo $meta->openGraph->image ?>">

    <?php if ($meta->useMultiLocales) : foreach ($meta->alternate as $item): ?>
        <link rel="alternate" hreflang="<?php echo $item['hreflang'] ?>" href="<?php echo $item['href'] ?>">
    <?php endforeach; endif; ?>

    <link rel="canonical" href="<?php echo $meta->canonical ?>">

    <meta name="robots" content="<?php echo $meta->robots ?>">

    <!-- Придумать вывод иконок -->

    <?php echo Vite::css() ?>

    <meta name="theme-color" content="#fafafa">
</head>

<body>
<div id="app"></div>
</body>

<?php echo Vite::js() ?>
</html>
