<?php

/**
 * @var boolean|null $isSiteMap
 * @var array $links
 */

echo '<?xml version="1.0" encoding="UTF-8" ?>';
?>
<?php if ($isSiteMap ?? false): ?>
    <sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        <?php foreach ($links as $link): ?>
            <sitemap>
                <loc><?php echo $link['url'] ?></loc>
                <lastmod><?php echo $link['date'] ?></lastmod>
                <changefreq><?php echo $link['changefreq'] ?></changefreq>
            </sitemap>
        <?php endforeach; ?>
    </sitemapindex>
<?php else: ?>
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        <?php foreach ($links as $link): ?>
            <url>
                <loc><?php echo $link['url'] ?></loc>
                <lastmod><?php echo $link['date'] ?></lastmod>
                <changefreq><?php echo $link['changefreq'] ?></changefreq>
            </url>
        <?php endforeach; ?>
    </urlset>
<?php endif; ?>
