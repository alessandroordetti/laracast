<?php 

use Core\Response;

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

function redirect($path) {


    header("location: {$path}");
    
    exit();
}