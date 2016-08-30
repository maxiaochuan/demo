<?php

namespace App\Model\Interfaces;

interface UserInterface
{
    public function getPasswordByName(string $username);

    public function setUser(string $username, string $password, string $email, int $role,
                            string $country, string $city, string $realName, string $icon);

    public function getCountByName(string $username);

    public function getLocal();
}
