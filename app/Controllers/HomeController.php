<?php

namespace Zeus\Controllers;

use Zeus\Controllers\Controller;
use Zeus\Models\User;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HomeController extends Controller
{
    public function index(Request $request, Response $response, $args)
    {
        return $this->c->view->render($response, 'home/index.twig', [
        'appName' => $this->c->settings['app']['name'],
      ]);
    }
}
