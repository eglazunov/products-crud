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
Capsule::schema()->dropIfExists('attributes');

Capsule::schema()->create('attributes', function (Blueprint $table) {

    $table->increments('id');
    $table->string('title');

});

Capsule::table('attributes')->insert([
    [
        'title' => 'Size',
    ],
    [
        'title' => 'Color',
    ],
    [
        'title' => 'Material',
    ],
]);

/*
|--------------------------------------------------------------------------
| PIVOT
|--------------------------------------------------------------------------
*/
Capsule::schema()->dropIfExists('attribute_product');

Capsule::schema()->create('attribute_product', function (Blueprint $table) {

    $table->increments('id');
    $table->unsignedInteger('product_id');
    $table->unsignedInteger('attribute_id');
    $table->string('value');

    $table->unique(['product_id', 'attribute_id']);

});

Capsule::table('attribute_product')->insert([
    [
        'product_id' => 1,
        'attribute_id' => 1,
        'value' => 'S',
    ],
    [
        'product_id' => 1,
        'attribute_id' => 2,
        'value' => 'White',
    ],
    [
        'product_id' => 1,
        'attribute_id' => 3,
        'value' => 'Cotton 100%',
    ],

    [
        'product_id' => 2,
        'attribute_id' => 1,
        'value' => 'M',
    ],
    [
        'product_id' => 2,
        'attribute_id' => 2,
        'value' => 'Black',
    ],
    [
        'product_id' => 2,
        'attribute_id' => 3,
        'value' => 'Synthetics',
    ],

    [
        'product_id' => 3,
        'attribute_id' => 1,
        'value' => 'L',
    ],
    [
        'product_id' => 3,
        'attribute_id' => 2,
        'value' => 'Yellow',
    ],
    [
        'product_id' => 3,
        'attribute_id' => 3,
        'value' => 'Polyester',
    ],
]);