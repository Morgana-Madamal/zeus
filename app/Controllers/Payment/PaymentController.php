<?php

namespace Zeus\Controllers\Payment;

use Zeus\Controllers\Controller;
use Zeus\Models\User;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Validator as v;
use Omnipay\Omnipay as Omnipay;

class PaymentController extends Controller
{
    public function getTopUp(Request $request, Response $response)
    {
        return $this->c->view->render($response, 'credit/topup.twig');
    }

    public function postTopUp(Request $request, Response $response)
    {
        //die($request->getParam('method'));
        if ($request->getParam('method') === "paypal") {
            $gateway = Omnipay::create('PayPal_Rest');
            $gateway->setClientId(getenv('PAYMENT_PAYPAL_CLIENT_ID'));
            $gateway->setSecret(getenv('PAYMENT_PAYPAL_CLIENT_SECRET'));
            $gateway->setTestMode(getenv('PAYMENT_TESTS'));
            $purchase = $gateway->purchase(array(
              'currency' => 'EUR',
              'amount' => '15.00',
              'cancelUrl' => 'http://localhost/credit/payment/cancel',
              'returnUrl' => 'http://localhost/credit/payment/confirm',
          ));

            $payment = $purchase->send();

            $payment->redirect();
        }
    }
}
