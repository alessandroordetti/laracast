<?php


use Core\App;
use Core\Container;
use Core\Database;

$container = new Container(); // Il service container è ora istanziato

$container->bind('Core\Database', function(){
    $config = require base_path('config.php');
    return new Database($config['database']);
});

App::setContainer($container); // Adesso possiamo usare i services contenuti nel container in tutta la nostra app
