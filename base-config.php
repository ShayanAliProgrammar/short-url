<?php

$serverName = $_SERVER['SERVER_NAME'];

$appUrl = isset($_SERVER['HTTPS']) ? "https://{$serverName}" : "http://{$serverName}" . ($serverName == 'thergs.test' ? '' : '/thergs');

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);


$currentUrl = $appUrl . $path;

$expire = 60 * 60 * 60;
header("Cache-Control: max-age=$expire");
header("Expires: " . gmdate('D, d M Y H:i:s', time() + $expire) . ' GMT');


ini_set('zlib.output_compression', 'On');
header('Content-Encoding: gzip');

