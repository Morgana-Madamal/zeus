<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

try {
    (new Dotenv\Dotenv(__DIR__ . '/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}

$app = new Slim\App([
    'settings' => [
        'displayErrorDetails' => getenv('APP_DEBUG') === 'true',

        'app' => [
            'name' => getenv('APP_NAME')
        ],

        'views' => [
            'cache' => getenv('VIEW_CACHE_DISABLED') === 'true' ? false : __DIR__ . '/../storage/views'
        ],

        'database' => [
            'database' => getenv('DB_DATABASE'),
            'driver' => getenv('DB_DRIVER'),
            'host' => getenv('DB_HOST'),
            'password' => getenv('DB_PASSWORD'),
            'port' => getenv('DB_PORT'),
            'username' => getenv('DB_USERNAME')
        ]
    ],
]);

$container = $app->getContainer();

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
        'cache' => $container->settings['views']['cache']
    ]);

    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

$container['validator'] = function($container) {
    return new \Zeus\Validation\Validator;
};

require_once __DIR__ . '/database.php';
require_once __DIR__ . '/../routes/web.php';
