<?php

namespace App\Model;

use Core\Lib\Model;

class User extends Model
{
    const USER_NAME = 'user_name';

    const USER_PASSWORD = 'user_password';

    const USER_EMAIL = 'user_email';

    /**
     * @return User
     */
    public static function getInstance()
    {
        return parent::getInstance();
    }

    public static function getTableName()
    {
        return 'user';
    }

    /**
     * @param string $id
     * @return array|bool
     */
    public function getUserById(string $id)
    {
        $result = $this->getMasterDB()->get(self::getTableName(), '*', [
            'id' => $id
        ]);

        return $result;
    }

    public function getPasswordByName(string $username)
    {
        $result = $this->getMasterDB()->get(self::getTableName(), self::USER_PASSWORD, [
            self::USER_NAME => $username
        ]);

        return $result;
    }

    public function registerUser(string $username, string $password, string $email)
    {
        $result = $this->getMasterDB()->insert(self::getTableName(), [
            self::USER_NAME => $username,
            self::USER_PASSWORD => $password,
            self::USER_EMAIL => $email,
            '#create_time' => 'sysdate()',
            '#update_time' => 'sysdate()',
        ]);

        return $result;
    }
}