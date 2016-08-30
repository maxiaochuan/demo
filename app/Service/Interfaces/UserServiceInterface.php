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
}