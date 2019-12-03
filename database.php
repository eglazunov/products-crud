<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
    'host' => config('database.host'),
    'driver' => config('database.driver'),
    'database' => config('database.database'),
    'username' => config('database.username'),
    'password' => config('database.password'),
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();
