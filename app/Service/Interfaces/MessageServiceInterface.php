<?php

namespace App\Service\Interfaces;

interface MessageServiceInterface
{
    public function getMsgById(int $id) : array;

    public function setMsg(string $message, array $commenterInfo, array $acceptorInfo = null);
}