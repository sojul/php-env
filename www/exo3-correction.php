<?php
require_once __DIR__ . '/bootstrap.php';

use CleverAge\Formation\Model\Trainee;
use CleverAge\Formation\Repository\TraineeRepository;

$trainee1 = new Trainee([
  'first_name' => 'Tom',
  'last_name' => 'Selleck',
  'date_of_birth' => '1945-01-12',
]);

$trainee2 = new Trainee([
  'first_name' => 'Rami',
  'last_name' => 'Malek',
  'date_of_birth' => '1981-05-12',
]);

$traineeRepository = new TraineeRepository($db);
$traineeRepository->add($trainee1);
$traineeRepository->add($trainee2);

var_dump($trainee1);
var_dump($trainee2);
