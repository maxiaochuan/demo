<?php

namespace App\Service;

use App\Model\Interfaces\FriendInterface;
use Core\Lib\Singleton;

class FriendService extends Singleton  implements FriendInterface
{
    public function getIdListByUserId(int $userId) : array
    {

    }
}