<?php

namespace Core\Lib;

class Singleton
{
    protected static $instances = [];

    public static function getInstance()
    {
        $className = get_called_class();
        if (!array_key_exists($className, self::$instances)) {
            self::$instances[$className] = new $className();
        }

        return self::$instances[$className];
    }
}