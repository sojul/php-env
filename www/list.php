<?php
require_once __DIR__ . '/bootstrap.php';

use CleverAge\Formation\Repository\TraineeRepository;

$trainee_repository = new TraineeRepository($db);
$trainees = $trainee_repository->findAll();

echo $engine->render('trainee-list.html.php', [
  'trainees' => $trainees
]);
