<?php

require_once __DIR__ . '/../../base-config.php';

header('Content-Type: text/css');

echo file_get_contents(__DIR__.'/../tailwind-styles.css');
