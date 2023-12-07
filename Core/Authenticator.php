<?php 

namespace Core;

use Exception;
use Core\Middleware\Middleware;

class Authenticator
{
    public function attempt($email, $password, $name = false)
    {
        $user = App::resolve(Database::class)->query("SELECT * FROM users WHERE email = :email", [
            ':email' => $email
        ])->find();

        /* If the user doesn't exist */
        if(!$user){
            return false;
        }


        /* If the user exists and the password corresponds */
        if($user && password_verify($password, $user['password'])){

            /* If the user is not an admin */
            if($user['email'] !== 'alessandro.ord@gmail.com'){
                
                $this->setSessionVariable('auth', $name);

                return true;
            
            /* If the user is an admin */
            } else {
                
                $this->setSessionVariable('admin');
                
                return true;
            
            }
        }

        return false;
    }

    public function setSessionVariable(string $sessionName)
    {
        /* La variabile di sessione user è uguale ad un array associativo con chiave email e valore $user['email'] */
        $_SESSION[$sessionName] = $sessionName;

        if (!array_key_exists($sessionName, Middleware::MAP)) {
            throw new Exception("No match for middleware: $sessionName");
        }

        logSessionData();
    }

    public static function logout()
    {
        $_SESSION = [];

        session_destroy();

        $params = session_get_cookie_params();

        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}
