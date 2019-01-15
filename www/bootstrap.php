<?php

require_once __DIR__ . '/autoload.php';

use CleverAge\Formation\Logger\DbLogger;
use CleverAge\Formation\Model\Trainee;
use CleverAge\Formation\Utils\Database\DatabaseConfiguration;
use CleverAge\Formation\Utils\Database\DatabaseConnection;

$config = new DatabaseConfiguration(
'mysql',
'3306',
'poe',
'poe',
'password'
);
$db = new DatabaseConnection($config);
