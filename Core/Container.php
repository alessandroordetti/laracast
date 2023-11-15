<?php 

namespace Core;

/*  In PHP, un "service container" è un componente utilizzato per la gestione delle dipendenze e l'iniezione delle dipendenze. 
    È anche noto come "container di inversione di controllo" o "container di dipendenze". 
    Il suo scopo principale è quello di creare e risolvere oggetti (servizi) 
    all'interno di un'applicazione in modo efficiente, gestendo le loro dipendenze in modo automatico. 
*/

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