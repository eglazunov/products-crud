<?php

use Illuminate\Container\Container;

/**
 * Returns value from config
 *
 * @param string $key
 * @return mixed
 */
function config(string $key)
{
    try {
        $keys = explode('.', $key);
        $fileName = array_shift($keys);

        $config = include(__DIR__."/../../config/{$fileName}.php");

        $value = $config;

        foreach ($keys as $key) {
            $value = $value[$key];
        }

        return $value;
    } catch (\Exception $e) {
        echo $e->getMessage();
        die();
    }
}

/**
 * Register all providers
 *
 * @param Container $container
 */
function registerProviders(Container $container)
{
    $providers = include(__DIR__.'/../../config/providers.php');

    foreach ($providers as $provider) {
        $provider = new $provider($container);

        $provider->register();
    }
}