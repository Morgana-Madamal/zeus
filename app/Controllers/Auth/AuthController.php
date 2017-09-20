<?php

namespace Zeus\Controllers\Auth;

use Zeus\Controllers\Controller;
use Zeus\Models\User;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Validator as v;

class AuthController extends Controller
{
    public function getSignOut(Request $request, Response $response)
    {
        $this->c->auth->logout();

        return $response->withRedirect($this->c->router->pathFor('home'));
    }

    public function getSignIn(Request $request, Response $response)
    {
        return $this->c->view->render($response, 'auth/signin.twig');
    }

    public function postSignIn(Request $request, Response $response)
    {
        $auth = $this->c->auth->attempt(
            $request->getParam('username'),
            $request->getParam('password')
        );

        if (!$auth) {
            return $response->withRedirect($this->c->router->pathFor('auth.signin'));
        }

        return $response->withRedirect($this->c->router->pathFor('home'));
    }

    public function getSignUp(Request $request, Response $response)
    {
        return $this->c->view->render($response, 'auth/signup.twig');
    }

    public function postSignUp(Request $request, Response $response)
    {
        $validation = $this->c->validator->validate($request, [
            'username' => v::noWhitespace()->notEmpty()->alpha()->usernameInUse(),
            'email' => v::noWhitespace()->email()->emailInUse(),
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

        $this->c->auth->attempt($user->username, $request->getParam('password'));

        return $response->withRedirect($this->c->router->pathFor('home'));
    }
}
