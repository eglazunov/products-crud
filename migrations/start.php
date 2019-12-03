<?php

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../database.php';


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;


/*
|--------------------------------------------------------------------------
| PRODUCTS
|--------------------------------------------------------------------------
*/
Capsule::schema()->dropIfExists('products');

Capsule::schema()->create('products', function (Blueprint $table) {

    $table->increments('id');
    $table->string('title');
    $table->decimal('price');
    $table->text('description')->nullable();
    $table->timestamps();

});

Capsule::table('products')->insert([
    [
        'title' => 'T-shirt #1',
        'price' => 15,
    ],
    [
        'title' => 'T-shirt #2',
        'price' => 20,
    ],
    [
        'title' => 'T-shirt #3',
        'price' => 23,
    ],
]);

/*
|--------------------------------------------------------------------------
| ATTRIBUTES
|--------------------------------------------------------------------------
*/
