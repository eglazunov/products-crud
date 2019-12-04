<?php

namespace App\Providers;



use Illuminate\Validation\Factory;
use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;

class ValidationProvider extends Provider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->container->bind(\Illuminate\Validation\Factory::class, function() {
            $loader = new FileLoader(new Filesystem, __DIR__.'/../../lang');
            $translator = new Translator($loader, 'en');

            return new Factory($translator, Container::getInstance());
        });
    }
}