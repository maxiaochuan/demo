<?php

namespace App\Model;

use App\Model\Interfaces\UserInterface;
use Core\Lib\Model;

class User extends Model implements UserInterface
{
    const USER_NAME = 'username';

    const USER_PASSWORD = 'password';

    /**
     * 暂用用户名字段
     */
    const USER_EMAIL = 'email';

    const USER_ROLE = 'role';

    const USER_COUNTRY = 'country';

    const USER_CITY = 'city';

    const USER_REAL_NAME = 'realname';

    const USER_ICON = 'icon';

    const USER_TOKEN = 'user_token';

    const ROLE_LOCAL = 0;

    /**
     * @return User
     */
    public static function getInstance()
    {
        return parent::getInstance();
    }

//    /**
//     * @param string $id
//     * @return array|bool
//     */
//    public function getUserById(string $id)
//    {
//        $result = $this->getMasterDB()->get(self::getTableName(), '*', [
//            'id' => $id
//        ]);
//
//        return $result;
//    }

    public function getPasswordByName(string $username)
    {
        $result = $this->getMasterDB()->get(self::getTableName(), self::USER_PASSWORD, [
            self::USER_NAME => $username
        ]);

        return $result;
    }

    public function setUser(string $username, string $password, string $email, int $role,
                            string $country, string $city, string $realName, string $icon)
    {
        $result = $this->getMasterDB()->insert(self::getTableName(), [
            self::USER_NAME => $username,
            self::USER_PASSWORD => $password,
            self::USER_EMAIL => $email,
            self::USER_ROLE => $role,
            self::USER_COUNTRY => $country,
            self::USER_CITY => $city,
            self::USER_REAL_NAME => $realName,
            self::USER_ICON => $icon,
            '#create_time' => "NOW()",
            '#update_time' => "NOW()",
        ]);

        return $result;
    }

    public function getCountByName(string $username)
    {
        $result = $this->getMasterDB()->count(self::getTableName(), [
            self::USER_NAME => $username
        ]);

        return $result;
    }

    public function getLocal()
    {
        $result = $this->getMasterDB()->select(self::getTableName(), [
            self::USER_REAL_NAME,
            self::USER_CITY,
            self::USER_COUNTRY,
            self::USER_ICON
        ], [
            self::USER_ROLE => self::ROLE_LOCAL
        ]);

        return $result;
    }

    public function getIdByToken(string $token) : int
    {
        $result = $this->getMasterDB()->get(self::getTableName(), 'id', [
            self::USER_TOKEN => $token
        ]);

        return $result;
    }

    public function getIdByName(string $username) : int
    {
        $result = $this->getMasterDB()->get(self::getTableName(), 'id', [
            self::USER_NAME => $username
        ]);

        return $result;
    }

    public function getInfoByName(string $username)
    {
        $result = $this->getMasterDB()->get(self::getTableName(), [
            self::ID,
            self::USER_REAL_NAME
        ], [
            self::USER_NAME => $username
        ]);
//        $result[self::ID] = intval($result[self::ID]);

        return $result;
    }

    public function getInfoByToken(string $token)
    {
        $result = $this->getMasterDB()->get(self::getTableName(), [
            self::ID,
            self::USER_REAL_NAME
        ], [
            self::USER_TOKEN => $token
        ]);

        return $result;
    }

    public function setTokenByName(string $username, string $token)
    {
        $result = $this->getMasterDB()->update(self::getTableName(), [
            self::USER_TOKEN => $token
        ], [
            self::USER_NAME => $username
        ]);

        return $result;
    }

    public function getInfoByIdList(array $idList)
    {
        $result = $this->getMasterDB()->select(self::getTableName(), [
            self::USER_REAL_NAME,
            self::USER_CITY,
            self::USER_COUNTRY,
            self::USER_ICON
        ], [
            self::ID => $idList
        ]);

        return $result;
    }
}
