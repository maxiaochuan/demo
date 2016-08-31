<?php

namespace Core\Lib;


class Model extends Singleton
{
    const ID = 'id';

    const ORDER = 'ORDER';

    const CREATE_TIME = 'create_time';
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

    public static function getTableName()
    {
        $arr = explode('\\', get_called_class());
        return strtolower($arr[count($arr) - 1]);
    }
}