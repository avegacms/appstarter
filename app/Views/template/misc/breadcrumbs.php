<?php

use AvegaCms\Entities\Seo\BreadCrumbsEntity;

/**
 * @var list<BreadCrumbsEntity> $breadcrumbs
 */
?>

<nav aria-label="breadcrumb">
    <ul class="breadcrumb my-3">
        <?php foreach ($breadcrumbs as $item): ?>
            <li class="<?= 'breadcrumb-item' . ($item->active ? ' active' : '') ?>" <?= ($item->active) ? 'aria-current="page"' : '' ?>>
                <?= ($item->active) ? $item->title : anchor(
                    $item->url,
                    $item->title,
                    ['class' => 'breadcrumb-link']
                ) ?>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>