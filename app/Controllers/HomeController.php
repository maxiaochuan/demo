<?php
/**
 * Created by PhpStorm.
 * User: maxc
 * Date: 16-4-18
 * Time: 上午10:48
 */

namespace App\Controllers;

use App\Database\User;
use Core\Lib\BaseController;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HomeController extends BaseController
{
    public function home(Request $request, Response $response, $next)
    {
//        $params = explode('/', $request->getAttribute('params'));
//        $response->getBody()->write(json_encode($params));

//        var_dump($next);
//        return $this->container->render->render($response, 'a.html', ['params' => $params]);
//        return $response;

        return $this->container->view->render($response, 'home/home.html');
    }

    public function login(Request $request, Response $response)
    {
        return $this->container->view->render($response, 'auth/login.html');
    }

    public function register(Request $request, Response $response)
    {
        return $this->container->view->render($response, 'auth/register.html');
    }
}