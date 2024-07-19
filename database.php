<?php

require_once __DIR__ . '/env.php';

// Create connection
$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
}

