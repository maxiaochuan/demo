<?php

namespace App\Model;

use App\Model\Interfaces\MessageInterface;
use Core\Lib\Model;

class Message extends Model implements MessageInterface
{

    const MSG_USER_ID = 'user_id';
    const MSG_USER_REAL_NAME = 'user_realname';
    const MSG_COMMENT_ID = 'comment_id';
    const MSG_COMMENT_NAME = 'comment_real_name';
    const MSG_INFO = 'message';

    /**
     * @return Message
     */
    public static function getInstance(): Message
    {
        return parent::getInstance();
    }

    public function getMsgById(int $id) : array
    {
        $result = $this->getMasterDB()->select(self::getTableName(), [
            self::MSG_COMMENT_NAME,
            self::MSG_INFO,
            self::ORDER => self::CREATE_TIME
        ], [
            self::MSG_USER_ID => $id
        ]);

        return $result;
    }

    public function setMsg(int $acceptorId, string $acceptorRealName,
                           int $commenterId, string $commenterRealName, string $message)
    {
        $result = $this->getMasterDB()->insert(self::getTableName(), [
            self::MSG_USER_ID => $acceptorId,
            self::MSG_USER_REAL_NAME => $acceptorRealName,
            self::MSG_COMMENT_ID => $commenterId,
            self::MSG_COMMENT_NAME => $commenterRealName,
            self::MSG_INFO => $message,
            '#create_time' => 'NOW()'
        ]);

        return $result;
    }
}