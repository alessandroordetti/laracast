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

function logSessionData() {

    $dirPath = '../Session';

    $fileName = 'session_' . session_id() . '.txt'; // Name the file using the session ID
    
    $filePath = $dirPath . '/' . $fileName;

    $sessionData = print_r($_SESSION, true); // Convert session data to string
    
    file_put_contents($filePath, $sessionData); // Write to file
} 

function setSessionVariable(string $sessionName, $user)
{
    /* La variabile di sessione user è uguale ad un array associativo con chiave email e valore $user['email'] */
    $_SESSION[$sessionName] = $user;

    if (!array_key_exists($sessionName, Middleware::MAP)) {
        throw new Exception("No match for middleware: $sessionName");
    }

    logSessionData();

    session_regenerate_id(true);
}

function logout()
{
    $_SESSION = [];

    session_destroy();

    $params = session_get_cookie_params();

    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}