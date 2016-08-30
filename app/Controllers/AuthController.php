<?php

namespace App\Controllers;

use App\Model\User;
use App\Providers\AuthProvider as Auth;
use App\Providers\ValidatorProvider as Validator;
use Core\Lib\BaseController;
use Core\Lib\Session;
use Core\Lib\Token;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AuthController extends BaseController
{
    public function login(Request $request, Response $response)
    {
        $data = $request->getBody();

        $data = json_decode($data, true);

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
        if ($authResult['result']) {
            //验证成功，建立会话信息
            Session::start();
            $token = Token::createToken();
            Session::set('user_token', $token);
            if ($data['remember']) {
                $expire = time() + 3600 * 24 * 7;
                setcookie('user_token', $token, $expire);
            }
        }

        return $response->getBody()->write(json_encode($authResult));
    }

    public function register(Request $request, Response $response)
    {
        $data = $request->getBody();

        $data = json_decode($data, true);

        $result = Validator::validate($data, 'register');

        $password = password_hash($data['password'] . $_ENV['PASSWORD_SALT'], PASSWORD_DEFAULT);
        if ($result['result']) {
            User::getInstance()->registerUser(
                $data['username'], $password, $data['username'], $data['role'],
                $data['country'], $data['city'], $data['realname']);
            return $response->getBody()->write(json_encode([
                'result' => true
            ]));
        }

        return $response->getBody()->write(json_encode($result));
    }
}