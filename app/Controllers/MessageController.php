<?php

namespace App\Controllers;

use App\Service\MessageService;
use App\Service\UserService;
use Core\Lib\BaseController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class MessageController extends BaseController
{
    public function getPersonalMsg(Request $request, Response $response)
    {
        $token = explode('/', $request->getAttribute('params'))[0];

        $id = UserService::getInstance()->getIdByToken($token);

        $result = MessageService::getInstance()->getMsgById($id);

        return $response->getBody()->write(json_encode($result));
    }

    public function sendMsg(Request $request, Response $response)
    {
        $data = $request->getParsedBody();

        $token = $data['token'];
        $acceptorName = $data['target'];
        $message = $data['message'];

//        var_dump($target);
//        var_dump($target == null);

        $commenterInfo = UserService::getInstance()->getInfoByToken($token);
        $acceptorInfo = $acceptorName == null ? null : UserService::getInstance()->getInfoByName($acceptorName);

        $result = MessageService::getInstance()->setMsg($message, $commenterInfo, $acceptorInfo);

        return $response->getBody()->write(json_encode($result));
    }
}