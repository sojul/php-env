<?php
require_once __DIR__ . '/bootstrap.php';

$trainee_repository = new \CleverAge\Formation\Repository\TraineeRepository($db);
$trainees = $trainee_repository->findAll();

var_dump($_POST);

echo $engine->render('trainee-add.html.php');

