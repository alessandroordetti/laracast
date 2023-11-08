<?php 

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function($class){

    $class = str_replace('\\', '/', $class);
    require base_path( $class . '.php'); // Le classi necessarie all'app verranno caricate in automatica e cercate nella cartella Core
});

/* require base_path('Database.php');
require base_path('Response.php'); */
$router = new \Core\Router();

$routes = require base_path('routes.php');

// Removes query strings attached on it
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);


