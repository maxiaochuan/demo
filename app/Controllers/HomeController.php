<?php
/**
 * Created by PhpStorm.
 * User: maxc
 * Date: 16-4-18
 * Time: 上午10:48
 */

namespace App\Controllers;

use Core\Lib\BaseController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends BaseController
{
    public function home(Request $request, Response $response, $next)
    {
//        $params = explode('/', $request->getAttribute('params'));
//        $response->getBody()->write(json_encode($params));

//        var_dump($next);
//        return $this->container->render->render($response, 'a.html', ['params' => $params]);
//        return $response;

//        return $this->container->view->render($response, 'home/home.html');

        print_r(md5('123456'));

        print_r(md5(crypt('123456', 'ac')));
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