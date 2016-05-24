<?php

namespace App\Providers;

use App\Model\User;

class AuthProvider
{
    /**
     * @param array $userInfo
     * @return array
     */
    public static function checkLogin(array &$userInfo)
    {
        $hashPassword = User::getInstance()->getPasswordByName($userInfo['username']);

        if ($hashPassword === false) {
            return [
                'result' => false,
                'errors' => [
                    'User does not exist!',
                ]
            ];
        }
        if (!password_verify($userInfo['password'], $hashPassword)) {
            return [
                'result' => false,
                'errors' => [
                    'Password is not correct!',
                ]
            ];
        }

        return [
            'result' => true,
        ];
    }
}