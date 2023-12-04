<?php 

namespace Core\Middleware;

class Auth
{
    public function handle()
    {
        if(! $_SESSION['auth'] ?? false){
            header('location: /');
            exit();
        }
    }
}