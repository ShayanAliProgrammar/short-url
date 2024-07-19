<?php
header('Content-Type: application/xml');

require_once __DIR__ . '/base-config.php';
?>

<urlset xmlns="https://www.sitemap.org/schemas/sitemap/0.9">
    <url>
        <loc><?= $appUrl ?>/</loc>
    </url>
</urlset>