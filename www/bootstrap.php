<?php

require_once __DIR__ . '/autoload.php';

use CleverAge\Formation\Utils\Database\DatabaseConfiguration;
use CleverAge\Formation\Utils\Database\DatabaseConnection;
use CleverAge\Formation\View\PhpTemplateEngine;

$config = new DatabaseConfiguration(
'mysql',
'3306',
'poe',
'poe',
'password'
);
$db = new DatabaseConnection($config);

$engine = new PhpTemplateEngine(__DIR__ . '/views');
