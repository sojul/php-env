<?php
require_once __DIR__ . '/bootstrap.php';

use CleverAge\Formation\Controller\FrontController;

// Instantiate and run Front Controller.
// All parameters like $db, $engine, etc. were created in bootstrap.php.
$fc = new FrontController($db, $engine, $message_bag);

// Check that current URI matches a controller / action.
$fc->checkUri();

// Execute controller and send content.
$fc->run();
