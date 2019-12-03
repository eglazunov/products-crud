<?php

use Illuminate\Routing\Router;

$router->get('/', function () {
    return new \Illuminate\Http\RedirectResponse('/products');
});

$router->group(['namespace' => 'App\Controllers'], function (Router $router) {
    $router->resource('products', 'ProductsController');
});
