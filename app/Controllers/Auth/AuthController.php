<?php

namespace Zeus\Controllers\Auth;

use Zeus\Controllers\Controller;
use Zeus\Models\User;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Validator as v;

class AuthController extends Controller
{
    public function getSignUp(Request $request, Response $response)
    {
        return $this->c->view->render($response, 'auth/signup.twig');
    }

    public function postSignUp(Request $request, Response $response)
    {
        $validation = $this->c->validator->validate($request, [
            'username' => v::noWhitespace()->notEmpty()->alpha(),
            'email' => v::noWhitespace(),
            'password' => v::noWhitespace()->notEmpty()
        ]);

        if ($validation->failed()) {
            return $response->withRedirect($this->c->router->pathFor('auth.signup'));
        }

        $user = User::create([
            'username' => $request->getParam('username'),
            'email' => $request->getParam('email'),
            'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),
        ]);

        return $response->withRedirect($this->c->router->pathFor('auth.signup'));
    }
}
