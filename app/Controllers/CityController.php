<?php

namespace App\Controllers;

use App\Service\CityService;
use Core\Lib\BaseController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class CityController extends BaseController
{

    public function cities(Request $request, Response $response)
    {
        $data = CityService::getInstance()->getList();

        $response->getBody()->write(json_encode($data));
    }
}