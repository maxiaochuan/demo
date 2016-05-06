<?php

namespace App\Controllers;

use Core\Lib\BaseController;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Providers\ValidatorProvider;

class AuthController extends BaseController
{
    public function login(Request $request, Response $response)
    {
        $data = $request->getBody();
        //格式验证
        $result = ValidatorProvider::validate($data, 'login');

        if ($result['result']) {
            return $response->getBody()->write($data);
        }
    }

    public function register(Request $request, Response $response)
    {
        $data = $request->getBody();

        $result = ValidatorProvider::validate($data, 'register');

        if ($result['result']) {
            return $request->getBody()->write($data);
        }
    }
}