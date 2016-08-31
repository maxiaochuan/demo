<?php

namespace App\Service\Interfaces;

interface UserServiceInterface
{
    public function getPasswordByName(string $name);

    /**
     * @param array $data
     * @return string $result
     */
    public function registerUser(array $data);

    public function checkUserExist(string $username);

    public function getLocal();

    public function getIdByToken(string $token);

    public function getIdByName(string $username);

    public function getInfoByToken(string $token);

    public function getInfoByName(string $username);

    public function setTokenByName(string $username, string $token);
}