<?php

use Zeus\Controllers\HomeController;
use Zeus\Controllers\Auth\AuthController;

$app->get('/', HomeController::class . ':index')->setName('home');
$app->get('/auth/signup', AuthController::class . ':getSignUp')->setName('auth.signup');
$app->post('/auth/signup', AuthController::class . ':postSignUp');
