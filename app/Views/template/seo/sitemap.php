<?=/**
 * @var bool|null $isSiteMap
 * @var array     $links
 */ '<?xml version="1.0" encoding="UTF-8" ?>';
?>
<?php if ($isSiteMap ?? false): ?>
    <sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        <?php foreach ($links as $link): ?>
            <sitemap>
                <loc><?= $link['url'] ?></loc>
                <lastmod><?= $link['date'] ?></lastmod>
                <changefreq><?= $link['changefreq'] ?></changefreq>
            </sitemap>
        <?php endforeach; ?>
    </sitemapindex>
<?php else: ?>
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        <?php foreach ($links as $link): ?>
            <url>
                <loc><?= $link['url'] ?></loc>
                <lastmod><?= $link['date'] ?></lastmod>
                <changefreq><?= $link['changefreq'] ?></changefreq>
            </url>
        <?php endforeach; ?>
    </urlset>
<?php endif; ?>
