<?php

namespace App\Model;

use App\Model\Interfaces\FriendInterface;
use Core\Lib\Model;

class Friend extends Model implements FriendInterface
{
    const FRIEND_ID = 'id';

    const FRIEND_ID_LIST = 'friend_id_list';

    /**
     * @return Friend
     */
    public static function getInstance()
    {
        return parent::getInstance();
    }

    public function getIdListByUserId(int $userId)
    {
        $result = $this->getMasterDB()->get(self::getTableName(), self::FRIEND_ID_LIST, [
            self::FRIEND_ID => $userId
        ]);

        return $result;
    }
}