<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Illuminate/Routing
 *
 * @source https://github.com/illuminate/routing
 * @contributor Muhammed Gufran
 * @contributor Matt Stauffer
 * @contributor https://github.com/jwalton512
 * @contributor https://github.com/dead23angel
 */
require_once '../vendor/autoload.php';
require_once '../database.php';


use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Events\Dispatcher;
use Illuminate\Routing\Redirector;
use Illuminate\Container\Container;
use Illuminate\Routing\UrlGenerator;

// Create a service container
$container = Container::getInstance();

registerProviders($container);

// Create a request from server variables, and bind it to the container; optional
$request = Request::capture();
$container->instance('Illuminate\Http\Request', $request);

// Using Illuminate/Events/Dispatcher here (not required); any implementation of
// Illuminate/Contracts/Event/Dispatcher is acceptable
$events = new Dispatcher($container);
// Create the router instance
$router = new Router($events, $container);
// Load the routes
require_once '../routes/index.php';

// Create the redirect instance
// $redirect = new Redirector(new UrlGenerator($router->getRoutes(), $request));

// use redirect
// return $redirect->home();
// return $redirect->back();
// return $redirect->to('/');
// Dispatch the request through the router
$response = $router->dispatch($request);
// Send the response back to the browser
$response->send();