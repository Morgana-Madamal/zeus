<?php

namespace Zeus\Controllers\User;

use Zeus\Controllers\Controller;
use Zeus\Models\User;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Validator as v;

class UserController extends Controller
{
    public function getSettings(Request $request, Response $response)
    {
        return $this->c->view->render($response, 'user/settings.twig');
    }
}
