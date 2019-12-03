<?php

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../database.php';


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->dropIfExists('products');

Capsule::schema()->create('products', function (Blueprint $table) {

    $table->increments('id');
    $table->string('title');
    $table->decimal('price');
    $table->text('description')->nullable();
    $table->timestamps();

});