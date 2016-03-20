<?php

use yii\helpers\Url ?>
<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>

<urlset
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
    http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc><?= Yii::$app->params['frontend_url'] ?></loc>
        <lastmod><?= date('c', time()) ?></lastmod>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>
    <?php if ($cate) { ?>
    <url>
        <loc><?= $cate->getLink() ?></loc>
        <lastmod><?= date('c', time()) ?></lastmod>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>
<?php foreach ($cate->getArticles() as $item) { ?>
    <url>
        <loc><?= $item->getLink() ?></loc>
        <lastmod><?= date('c', time()) ?></lastmod>
        <changefreq>always</changefreq>
        <priority>0.9</priority>
    </url>
<?php } ?>
    <?php } ?>
</urlset>