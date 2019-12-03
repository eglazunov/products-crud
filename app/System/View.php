<?php

namespace App\System;


class View
{
    const VIEW_PATH = 'views';

    /**
     * @var array
     */
    private $args;

    /**
     * @var string
     */
    private $viewBody;

    /**
     * @param string $viewName
     * @param array $args
     */
    public function __construct(string $viewName, array $args = [])
    {
        $this->args = $args;
        $this->viewBody = $this->buildView($viewName);
    }
    /**
     * Returns view by given name
     *
     * @param string $viewName
     * @return string
     */
    private function buildView(string $viewName) : string
    {
        $path = __DIR__.'/../../'.self::VIEW_PATH."/{$viewName}.php";

        ob_start();
        extract($this->args);
        include($path);

        return ltrim(ob_get_clean());
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->viewBody;
    }
}