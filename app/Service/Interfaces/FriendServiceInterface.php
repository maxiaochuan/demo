<?php

namespace App\Service\Interfaces;

interface FriendServiceInterface
{
    public function getListById(string $id) : array;
}