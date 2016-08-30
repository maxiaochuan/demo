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
//        if (!$this->checkUserExist($data[self::USER_NAME])) {
//            return
//        }
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
            $result[$index][User::USER_ICON] = 'http://' . $_SERVER['HTTP_HOST'] . '/static/' . $value[User::USER_ICON];
        }

        return json_encode($result);
    }
}