<?php
/**
 * Bootstraps container application, set container and others things
 */

require_once __DIR__ . '/vendor/autoload.php';

use CleverAge\Formation\Repository\TraineeRepository;
use CleverAge\Formation\Utils\Database\DatabaseConfiguration;
use CleverAge\Formation\Utils\Database\DatabaseConnection;
use DI\Container;

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$builder = new DI\ContainerBuilder();
$builder->addDefinitions([
    'CleverAge\Formation\Utils\Database\DatabaseConfiguration' => DI\create()->constructor(
        'mysql',
        3306,
        'poe',
        'poe',
        'password'
    )
]);

$container = $builder->build();