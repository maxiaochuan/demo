<?php

namespace App\Service\Interfaces;

interface FriendServiceInterface
{
    public function getInfoByUserId(int $id) : array;
}