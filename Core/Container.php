<?php 

namespace Core;

class Container 
{
    /* $bindings sarà un array associativo: la chiave sarà il path della classe, il valore sarà una callback 
    (Ad esempio: $config = require base_path('config.php');
    return new Database($config['database']);) */
    protected $bindings = [];  
    
    public function bind($key, $resolver) // Per aggiungere al service container 
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key) // Per estrarre qualcosa dal service container
    {

        if(!array_key_exists($key, $this->bindings)){
            throw new \Exception('No matching binding for ' . $key);
        }

        $resolver = $this->bindings[$key];

        return call_user_func($resolver);
    }
}