<?php

require_once __DIR__ . '/bootstrap.php';

use CleverAge\Formation\Repository\TraineeRepository;

/** @var TraineeRepository $repository */
$repository = $container->get('CleverAge\Formation\Repository\TraineeRepository');

/** @var TraineeRepository $repository */
$trainees = $repository->findAll();

dump($trainees);