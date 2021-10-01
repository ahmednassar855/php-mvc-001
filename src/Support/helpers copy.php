<?php

use Illuminate\Application;

if (!function_exists('base_path')) {
    function base_path()
    {
        return dirname(__DIR__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
    }
}

if (!function_exists('env')) {
    function env($key, $default = null)
    {
        if (array_key_exists($key, $_ENV)) {
            return $_ENV[$key];
        }

        return $default;
    }
}

if (!function_exists('app')) {
    function app()
    {
        static $instance = null;

        if (!$instance) {
            $instance = new Application();
        }

        return $instance;
    }
}

// 11 ----  han3mle fn include el view path elly ma3mool fe view.php
if(!function_exists('view_path')){
    function view_path(){
        // return base_path() hat3ml return le awl page path 
        return base_path() . 'views';
    }
}

if(!function_exists('view'))
{
    function view(string $view, array $params=[]){
    return View::make($view, $params);
}
}