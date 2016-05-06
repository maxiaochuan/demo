<?php

namespace Core\Lib;


class Model extends Singleton
{
    /**
     * @var \medoo|null
     */
    protected static $masterDb = null;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        if (is_null(self::$masterDb)) {
            self::$masterDb = new \medoo(Config::get('db.master'));
        }
    }

    public static function getInstance()
    {
        return parent::getInstance();
    }

    /**
     * @return \medoo|null
     */
    public static function getMasterDB()
    {
        return self::$masterDb;
    }
}