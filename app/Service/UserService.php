<?php

namespace App\Service;

use App\Model\User;
use App\Service\Interfaces\UserServiceInterface;
use Core\Lib\Singleton;

class UserService extends Singleton implements UserServiceInterface
{
    protected $_user = null;

    public function __construct()
    {
        if ($this->_user === null) {
            $this->_user = User::getInstance();
        }
    }

    /**
     * @return UserService
     */
    public static function getInstance()
    {
        return parent::getInstance();
    }

    public function getPasswordByName(string $name)
    {
        $result = $this->_user->getPasswordByName($name);
        return $result;
    }

    public function registerUser(array $data)
    {
        $email = $data[User::USER_NAME];
        $icon = array_key_exists(User::USER_ICON, $data) ? $data[User::USER_ICON] : 'default.png';
        $password = password_hash($data[User::USER_PASSWORD] . $_ENV['PASSWORD_SALT'], PASSWORD_DEFAULT);

        $result = $this->_user->setUser($data[User::USER_NAME], $password, $email,
            $data[User::USER_ROLE], $data[User::USER_COUNTRY], $data[User::USER_CITY],
            $data[User::USER_REAL_NAME], $icon);

        return $result;
    }

    public function checkUserExist(string $username)
    {
        $count = $this->_user->getCountByName($username);

        return $count !== 0;
    }

    public function getLocal()
    {
        $result = $this->_user->getLocal();
        foreach ($result as $index => $value) {
            $result[$index]['img-src'] = imgSrc($value[User::USER_ICON]);
        }

        return json_encode($result);
    }

    public function getIdByToken(string $token)
    {
        $result = $this->_user->getIdByToken($token);

        return $result;
    }

    public function getIdByName(string $username)
    {
        $result = $this->_user->getIdByName($username);

        return $result;
    }

    public function getInfoByName(string $username)
    {
        $result = $this->_user->getInfoByName($username);

        return $result;
    }

    public function getInfoByToken(string $token)
    {
        $result = $this->_user->getInfoByToken($token);

        return $result;
    }

    public function setTokenByName(string $username, string $token)
    {
        $result = $this->_user->setTokenByName($username, $token);

        return $result;
    }
}