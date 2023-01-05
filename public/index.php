<?php

// Show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Require composer autoload
require_once "../vendor/autoload.php";

use Plutonium\Core\Application;
$app = new Application(new \Plutonium\Core\Router());
// Dispatch application
$app->dispatch();

