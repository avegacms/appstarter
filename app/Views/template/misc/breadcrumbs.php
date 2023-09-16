<?php

use AvegaCms\Entities\Seo\BreadCrumbsEntity;

/**
 * @var BreadCrumbsEntity[] $breadcrumbs
 */
?>

<nav aria-label="breadcrumb">
    <ul class="breadcrumb my-3">
        <?php foreach ($breadcrumbs as $item): ?>
            <li class="<?php echo 'breadcrumb-item' . ($item->active ? ' active' : '') ?>" <?php echo ($item->active) ? 'aria-current="page"' : '' ?>>
                <?php echo ($item->active) ? $item->title : anchor($item->url, $item->title,
                    ['class' => 'breadcrumb-link']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>