<?php

namespace App\Database;

use Core\Lib\Model;

class User extends Model
{
    const USER_USERNAME = 'username';

    const USER_PASSWORD = 'password';

    const USER_EMAIL = 'email';

    /**
     * @return User
     */
    public static function getInstance()
    {
        return parent::getInstance();
    }

    /**
     * @param string $id
     * @return array|bool
     */
    public function getUserById(string $id)
    {
        $result = $this->getMasterDB()->select('user', '*', [
            'user_id' => $id
        ]);

        return $result[0];
    }

    public function registerUser(string $username, string $password, string $email)
    {
        $result = $this->getMasterDB()->insert('user', [
            self::USER_USERNAME => $username,
            self::USER_PASSWORD => $password,
            self::USER_EMAIL => $email,
            '#create_time' => 'sysdate()',
            '#update_time' => 'sysdate()',
        ]);

        return $result;
    }
}