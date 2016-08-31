<?php

namespace App\Service;

use App\Model\Message;
use App\Model\User;
use App\Service\Interfaces\MessageServiceInterface;
use Core\Lib\Singleton;

class MessageService extends Singleton implements MessageServiceInterface
{
    protected $_message = null;

    public function __construct()
    {
        if ($this->_message === null) {
            $this->_message = Message::getInstance();
        }
    }

    /**
     * @return MessageService
     */
    public static function getInstance()
    {
        return parent::getInstance();
    }

    public function getMsgById(int $id) : array
    {
        $data = $this->_message->getMsgById($id);

        foreach ($data as $i => $value) {
            $data[$i]['user'] = $value[Message::MSG_COMMENT_NAME];
            unset($data[$i][Message::MSG_COMMENT_NAME]);
        }

        return $data;
    }

    public function setMsg(string $message, array $commenterInfo, array $acceptorInfo = null)
    {
        $commenterId = $commenterInfo[User::ID];
        $commenterRealName = $acceptorInfo[User::USER_REAL_NAME];
        if ($commenterInfo == null) {
            $acceptorId = $commenterId;
            $acceptorRealName = $commenterRealName;
        } else {
            $acceptorId = $acceptorInfo[User::ID];
            $acceptorRealName = $acceptorInfo[User::USER_REAL_NAME];
        }

        $result = $this->_message->setMsg($acceptorId, $acceptorRealName, $commenterId, $commenterRealName, $message);

        //TODO: 检测

        return [
            'result' => true
        ];
    }
}