<?php
require_once __DIR__ . '/autoload.php';

use CleverAge\Formation\Utils\Database\DatabaseConfiguration;
use CleverAge\Formation\Utils\Database\DatabaseConnection;
use CleverAge\Formation\Utils\MessageBag;
use CleverAge\Formation\View\PhpTemplateEngine;

// Start new session, or resume existing one if user already has a session cookie.
session_start();

$config = new DatabaseConfiguration(
'mysql',
'3306',
'poe',
'poe',
'password'
);
$db = new DatabaseConnection($config);

$engine = new PhpTemplateEngine(__DIR__ . '/views');

$message_bag = new MessageBag();
