<?php

namespace App\Controllers;

use App\Providers\AuthProvider as Auth;
use App\Providers\ValidatorProvider as Validator;
use App\Service\UserService;
use Core\Lib\BaseController;
use Core\Lib\Session;
use Core\Lib\Token;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AuthController extends BaseController
{
    public function login(Request $request, Response $response)
    {
        $data = $request->getParsedBody();

        $userInfo = [
            'username' => $data['username'],
            'password' => $data['password']
        ];
        //格式验证
        $result = Validator::validate($userInfo, 'login');

        if (!$result['result']) {
            return $response->getBody()->write(json_encode($result));
        }
        //数据验证
        $authResult = Auth::checkLogin($userInfo);

        if (!$authResult['result']) {
            return $response->getBody()->write(json_encode($authResult));
        }
        //验证成功，建立会话信息
        $token = Token::createToken();
        Session::set('user_token', $token);
        UserService::getInstance()->setTokenByName($userInfo['username'], $token);
//            if ($data['remember']) {
//                $expire = time() + 3600 * 24 * 7;
//                setcookie('user_token', $token, $expire);
//            }
        $result = $authResult;
        $result['token'] = $token;

        return $response->getBody()->write(json_encode($result));

    }

    public function logout(Request $request, Response $response)
    {
//        $data = $request->getParsedBody();

//        $token = $data['token'];

        Session::unset();

        return $response->getBody()->write(json_encode([
            'result' => true
        ]));
    }

    public function register(Request $request, Response $response)
    {
        $data = $request->getBody();

        $data = json_decode($data, true);

        $result = Validator::validate($data, 'register');

        if (!$result['result']) {
            return $response->getBody()->write(json_encode($result));
        }

        $authResult = Auth::checkRegister($data['username']);

        if ($authResult['result']) {
            UserService::getInstance()->registerUser($data);
            return $response->getBody()->write(json_encode($authResult));
        }

        return $response->getBody()->write(json_encode($authResult));
    }
}