<?php 

error_reporting(E_ALL);

ini_set("display_errors", 0);

function customErrorHandler($errno, $errstr, $errfile, $errline){
    $message = "<b>Error:</b> [$errno] $errstr - $errfile:$errline" . PHP_EOL;
    error_log($message, 3, "../Errors/error_logs.txt");
}

set_error_handler("customErrorHandler");

function customExceptionHandler($exception) {
    $message = "<b>Exception:</b> " . $exception->getMessage() . " in " . $exception->getFile() . ":" . $exception->getLine() . PHP_EOL;
    error_log($message, 3, "../Errors/error_logs.txt");
    // Display a user-friendly error page
    echo "Something went wrong. Please try again later.";
}

set_exception_handler("customExceptionHandler");

// Your code here
try {
    echo $reswrewr; // This will cause a Notice: Undefined variable error
    $router = new \Core\Router(); // This will cause a Fatal error if the class is not defined
} catch (Exception $e) {
    // Handle exceptions here
    customExceptionHandler($e);
}

