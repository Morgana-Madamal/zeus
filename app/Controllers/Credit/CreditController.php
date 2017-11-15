<?php

namespace Zeus\Controllers\Credit;

use Zeus\Controllers\Controller;
use Zeus\Models\User;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Validator as v;
use Omnipay\Omnipay as Omnipay;

class CreditController extends Controller
{
    public function getTopUp(Request $request, Response $response)
    {
        return $this->c->view->render($response, 'credit/topup.twig');
    }

    public function postTopUp(Request $request, Response $response)
    {
    }
}
