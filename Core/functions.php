<?php 

use Core\Response;
use Core\Middleware\Middleware;

function dd($value)
{
    echo "<pre>";

    var_dump($value);

    echo "</pre>";

    die();
}

function uriIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}


function authorize($condition, $status = Response::FORBIDDEN)
{
    if(!$condition)
    {
        abort($status);
    }
}

function abort($status = 404)
{
    http_response_code($status);

    require base_path("views/" . $status . ".php");

    die();
}

function base_path($path)
{
    return BASE_PATH . $path; //base_path corrisponde alla cartella laracast
}

function view($path, $attributes= [])
{
    extract($attributes);
    
    require base_path('views/' . $path);
}

function setSessionVariable(string $sessionName, string $userEmail)
{
    /* La variabile di sessione user è uguale ad un array associativo con chiave email e valore $user['email'] */
    $_SESSION[$sessionName] = [
        'email' => $userEmail
    ];

    if (!array_key_exists($sessionName, Middleware::MAP)) {
        throw new Exception("No match for middleware: $sessionName");
    }
}