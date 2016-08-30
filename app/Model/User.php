<?php

namespace App\Model;

use Core\Lib\Model;

class User extends Model
{
    const USER_NAME = 'user_name';

    const USER_PASSWORD = 'user_password';

    const USER_EMAIL = 'user_email';

    const USER_ROLE = 'user_role';

    const USER_COUNTRY = 'user_country';

    const USER_CITY = 'user_city';

    const USER_REAL_NAME = 'user_real_name';

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

    public function registerUser(string $username, string $password,
                                 string $email, int $role, string $country, string $city, string $realName)
    {
        $result = $this->getMasterDB()->insert(self::getTableName(), [
            self::USER_NAME => $username,
            self::USER_PASSWORD => $password,
            self::USER_EMAIL => $email,
            self::USER_ROLE => $role,
            self::USER_COUNTRY => $country,
            self::USER_CITY => $city,
            self::USER_REAL_NAME => $realName,
            '#create_time' => "NOW()",
            '#update_time' => "NOW()",
        ]);

//        var_dump($result);
//        var_dump($this->getMasterDB()->error());

        return $result;
    }
}