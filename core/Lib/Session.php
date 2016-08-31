<?php

namespace Core\Lib;

use Predis\Client;
use Predis\Session\Handler;

class Session
{
    /**
     * @var Handler
     */
    protected static $_handler = null;

    public static function start(string $id = null)
    {
        if (self::$_handler === null) {
            $client = new Client();
            self::$_handler = new Handler($client);
            self::$_handler->register();
        }

        if (!is_null($id)) {
            session_id($id);
        }
        session_start();
    }

    public static function set(string $name, string $value)
    {
        $_SESSION[$name] = $value;
    }

    public static function get(string $name, string $default = null)
    {
        if (is_null($default)) {
            return $_SESSION[$name];
        }

        return $default;
    }

    public static function unset()
    {
        foreach ($_SESSION as $key => $value) {
            unset($_SESSION[$key]);
        }

        session_destroy();
    }
}