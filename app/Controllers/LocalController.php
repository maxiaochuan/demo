<?php

namespace App\Controllers;

use App\Service\UserService;
use Core\Lib\BaseController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LocalController extends BaseController
{
    public function local(Request $request, Response $response)
    {
        $result = UserService::getInstance()->getLocal();

        $response->getBody()->write($result);
    }
}