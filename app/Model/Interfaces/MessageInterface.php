<?php

namespace App\Model\Interfaces;

interface MessageInterface
{
    /**
     * @param int $id
     * @return array
     */
    public function getMsgById(int $id) : array;

    public function setMsg(int $acceptorId, string $acceptorRealName,
                           int $commenterId, string $commenterRealName, string $message);
}