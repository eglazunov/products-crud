<?php

use Illuminate\Routing\Router;

$router->get('/', function () {
    return 'hello world!';
});

$router->group(['namespace' => 'App\Controllers'], function (Router $router) {
    $router->get('products', ['name' => 'products.index', 'uses' => 'ProductsController@index']);
});
