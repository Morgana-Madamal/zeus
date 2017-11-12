<?php

use Zeus\Controllers\HomeController;
use Zeus\Controllers\Auth\AuthController;
use Zeus\Controllers\Credit\CreditController;

$app->get('/', HomeController::class . ':index')->setName('home');
$app->get('/auth/signup', AuthController::class . ':getSignUp')->setName('auth.signup');
$app->post('/auth/signup', AuthController::class . ':postSignUp');

$app->get('/auth/signin', AuthController::class . ':getSignIn')->setName('auth.signin');
$app->post('/auth/signin', AuthController::class . ':postSignIn');
$app->get('/auth/signout', AuthController::class . ':getSignOut')->setName('auth.signout');

$app->get('/credit/topup', CreditController::class . ':getTopUp')->setName('credit.topup');
$app->post('/credit/topup', CreditController::class . ':postTopUp');
