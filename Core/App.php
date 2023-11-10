<?php 

namespace Core;

class App
{
    protected static $container; 

    public static function setContainer($container) // Esempio di singleton, 
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
