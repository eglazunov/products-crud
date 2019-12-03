<?php

use Illuminate\Routing\Router;

$router->get('/', function () {
    return 'hello world!';
});

$router->group(['namespace' => 'App\Controllers'], function (Router $router) {
    $router->resource('products', 'ProductsController');
});
