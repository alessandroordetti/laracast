<?php 

namespace Core;

use Closure;
use Core\Middleware\Middleware;

class Router {

    public $routes = [];

    public function add($method, $uri, $controller) {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'middleware' => null
        ];

        return $this; // Facendo ritornare l'istanza dell'oggetto router possiamo continuare a richiamare e concatenare altri metodi 
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key; // Prendiamo l'ultimo elemento nell'array routes e alla chiave 'middleware' diamo valore $key

        return $this;
    }

    public function route($uri, $method)
    {
        foreach($this->routes as $route){ 
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)){
                
                // Check if the controller is a Closure, if so, execute it
                if ($route['controller'] instanceof Closure) {
                    return call_user_func($route['controller']);
                }

                Middleware::resolve($route['middleware']);
                
                return require base_path($route['controller']);
            }
        }   

        $this->abort();
    }

    protected function abort($code = 404)
    {
        http_response_code($code);

        require base_path("views/". $code . ".php");

        die();
    }
}


