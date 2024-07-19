<?php

require_once __DIR__ . '/middlewares/html_minifier.php';

$middlewares = [
    'html_minifier'
];

foreach($middlewares as $middleware) {
    ob_start($middleware);
}
