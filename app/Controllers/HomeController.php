<?php

namespace Zeus\Controllers;

use Zeus\Controllers\Controller;
use Zeus\Models\User;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class HomeController extends Controller
{
    public function index(Request $request, Response $response, $args)
    {
      dump(User::find(1));
    }
}
