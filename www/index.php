<?php
require_once __DIR__ . '/bootstrap.php';

// Get Path as requested by the client
// @see .htaccess
$path = $_GET['_path'];

// Remove _patch from query string after use. There is no need to let other
// functions / methods see that it exists.
unset($_GET['_path']);

// Ensure that we have controller & action names in the URL.
// For an URL like http://localhost:4444/trainee/list
//  - 'trainee' will be the controller
//  - 'list' will be the action
$path_parts = explode('/', $path);
if (count($path_parts) !== 2) {
  die("No controller/action found for the requested URL");
}

list($controller, $action) = $path_parts;

// Generate a full namespace based on the controller name.
$controller_class = sprintf('\\CleverAge\\Formation\\Controller\\%sController', ucfirst($controller));

// Ensure that the class exists
if (!class_exists($controller_class)) {
  die("There is no controller $controller_class");
}

// Instantiate controller and inject needed objects in constructor.
// @see ControllerBase for needed arguments.
// @see bootstrap.php for elements instantiation.
$controller = new $controller_class($db, $engine);

if (!method_exists($controller, $action)) {
  die("There is no action $action in the controller $controller_class");
}

// Finally call the controller method and display its return.
echo $controller->$action();
