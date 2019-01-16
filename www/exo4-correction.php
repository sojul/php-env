<?php
require_once __DIR__ . '/bootstrap.php';

use CleverAge\Formation\Model\Trainee;
use CleverAge\Formation\Repository\TraineeRepository;

$message = '';

if (!empty($_POST)) {
  if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['date_of_birth'])) {
    $trainee = new Trainee([
      'first_name' => $_POST['first_name'],
      'last_name' => $_POST['last_name'],
      'date_of_birth' => $_POST['date_of_birth'],
    ]);

    $trainee_repository = new TraineeRepository($db);
    $trainee_repository->add($trainee);

    $message = "Le stagiaire #{$trainee->getId()} a été créé";
  }
}

echo $engine->render('trainee-add.html.php', [
  'message' => $message,
]);
