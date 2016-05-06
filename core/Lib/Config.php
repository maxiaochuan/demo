<?php

namespace Core\Lib;

class Config extends Singleton
{
    private static $config;

    public function __construct()
    {
        if (is_null(self::$config)) {
            $this->setDefaultConfig();
        }
    }

    public static function getInstance()
    {
        return parent::getInstance();
    }

    public function setDefaultConfig()
    {
        self::$config = [
            'core' => [
                'settings' => [
                    'displayErrorDetails' => $_ENV['DISPLAY_ERROR_DETAILS'] == 'true' ? true : false,
                ],
            ],
            'db' => [
                'master' => [
                    'database_type' => $_ENV['MASTER_DATABASE_TYPE'],
                    'database_name' => $_ENV['MASTER_DATABASE_NAME'],
                    'server' => $_ENV['MASTER_DATABASE_SERVER'],
                    'username' => $_ENV['MASTER_DATABASE_USERNAME'],
                    'password' => $_ENV['MASTER_DATABASE_PASSWORD'],
                    'charset' => $_ENV['MASTER_DATABASE_CHARSET'],
                ],
            ],
        ];
    }

    public static function get(string $name)
    {
        self::getInstance();

        if (preg_match('/[.]/', $name)) {
            $name = explode('.', $name);
            $result = isset(self::$config[$name[0]][$name[1]]) ? self::$config[$name[0]][$name[1]] : null;
        } else {
            $result = isset(self::$config[$name]) ? self::$config[$name] : null;
        }

        return $result;
    }
}