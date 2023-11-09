<?php 

class App
{
    protected static $container; 

    public static function setContainer($container) // Esempio di singleton
    {
        static::$container = $container;
    }

    public static function container()
    {
        return static::$container;
    }
}
