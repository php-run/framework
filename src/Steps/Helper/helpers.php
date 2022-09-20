<?php

use Illuminate\Container\Container;
use Run\Steps\Routing\Router;

if (! function_exists('app')) {
    /**
     * Get the available container instance.
     *
     * @param string|null $make
     * @param array $parameters
     * @return mixed|\Run\Application
     */
    function app($make = null, array $parameters = [])
    {
        if (is_null($make)) {
            return Container::getInstance();
        }

        return Container::getInstance()->make($make, $parameters);
    }

}


if (! function_exists('Route')) {
    /**
     * Get the Route Instance
     * @return mixed|Router
     */
    function Route()
    {
        return app()->get(Router::class);
    }

}

