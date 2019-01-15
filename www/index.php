<?php

require_once __DIR__ . '/autoload.php';

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

$trainee_repository = new \CleverAge\Formation\Repository\TraineeRepository($db);
$trainees = $trainee_repository->findAll();
