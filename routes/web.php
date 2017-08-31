<?php

use Zeus\Controllers\HomeController;

$app->get('/', HomeController::class . ':index');
