<?php 

session_start(); // Possiamo salvare dei dati temporaneamente che vengono salvati fino a che non viene chiuso il broswer.

const BASE_PATH = __DIR__ . '/../'; // Corrissponde alla root del progetto

require BASE_PATH . 'Core/TemplateEngine.php';


require BASE_PATH . 'Core/functions.php'; // Richiedi il file functions per usarle in tutta l'app

template('welcome', $data);

require_once __DIR__ . '/../vendor/autoload.php';

spl_autoload_register(function($class){
    $class = str_replace('\\', '/', $class);
    require base_path( $class . '.php'); // Le classi necessarie all'app verranno caricate in automatico e cercate nella cartella Core
});

require base_path('bootstrap.php');


$router = new \Core\Router(); // Path assoluto per andare ad instanziare il Router
$routes = require base_path('routes.php'); // Richiediamo tutte le routes del nostro progetto

// Removes query strings attached on it
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD']; 
// Il doppio ?? corrisponde al cohalescent operator: 
// Se esiste la variabile globale $_POST['_method'], $uri avrà quel valore altrimenti avrà il valore di $_SERVER['REQUEST_METHOD']

$router->route($uri, $method);




