<?php
require_once __DIR__ . '/bootstrap.php';

use CleverAge\Formation\Logger\DbLogger;

$dbLogger = new DbLogger($db);
$dbLogger->log('Une visite de plus!');

