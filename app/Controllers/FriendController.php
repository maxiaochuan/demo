<?php

namespace App\Controllers;

use App\Model\Title;
use App\Model\User;
use App\Service\FriendService;
use Core\Lib\BaseController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class FriendController extends BaseController
{
    public function friends(Request $request, Response $response)
    {
//        $token = explode('/', $request->getAttribute('params'))[0];
//
//        $id = User::getInstance()->getIdByToken($token);
//
//        $idList = FriendService::getInstance()->getIdListByUserId($id);

        $idList = [1, 3, 5, 7, 9, 11];
        $result['title'] = Title::getInstance()->getTitlesByType(FriendService::FRIEND_TITLE_TYPE);

        $list = User::getInstance()->getInfoByIdList($idList);

        $result['list'] = $list ? $list : [];


        $response->getBody()->write(json_encode($result));
    }
}