<?php

namespace App\Model\Interfaces;

interface UserInterface
{
    public function getPasswordByName(string $username);

    public function setUser(string $username, string $password, string $email, int $role,
                            string $country, string $city, string $realName, string $icon);

    public function getCountByName(string $username);

    public function getLocal();

    public function getIdByToken(string $token) : int;

    public function getIdByName(string $username) : int;

    public function getInfoByToken(string $token);

    public function getInfoByName(string $username);

    public function setTokenByName(string $username, string $token);

    public function getInfoByIdList(array $idList) : array;
}
