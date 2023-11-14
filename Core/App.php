<?php 

namespace Core;

class App
{
    protected static $container; 


    /* Esempio di singleton: è un design pattern che restringe l'istanza di una classe ad una volta sola
       e fornisce un accesso globale a quell'istanza all'interno della nostra app.
       Questo ci permette di accedere alle risorse dell'applicazione da qualsiasi punto del codice.
       Inoltre, non importa quante volte cerchiamo di istanziare una classe poiché otterremo sempre la stessa istanza.
    */
    public static function setContainer($container)
    {
        static::$container = $container; // Per inizializzare il container e salvarlo nella variabile statica $container
    }

    public static function container()
    {
        return static::$container; // Per ritornare il valore storato in $container
    }

    public static function bind($key, $resolver) 
    {
        static::container()->resolve($key, $resolver);
    }

    public static function resolve($key) 
    {
        return static::container()->resolve($key);
    }
}
