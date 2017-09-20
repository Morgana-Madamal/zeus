<?php

use Zeus\Controllers\HomeController;
use Zeus\Controllers\Auth\AuthController;

$app->get('/', HomeController::class . ':index')->setName('home');
$app->get('/auth/signup', AuthController::class . ':getSignUp')->setName('auth.signup');
$app->post('/auth/signup', AuthController::class . ':postSignUp');

$app->get('/auth/signin', AuthController::class . ':getSignIn')->setName('auth.signin');
$app->post('/auth/signin', AuthController::class . ':postSignIn');
$app->get('/auth/signout', AuthController::class . ':getSignOut')->setName('auth.signout');