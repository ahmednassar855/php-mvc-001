<?php

namespace Illuminate\Http;

class Route
{
    protected Request $request;
    protected Response $response;

    protected static array $routes = [];

    public function __construct(Request $request , Response $response )
    {
        $this->request = $request;
        $this->response = $response;
    }

    public static function get($route, $action)
    {
        self::$routes['get'][$route] = $action;
    }

    public static function post($route, $action)
    {
        self::$routes['post'][$route] = $action;
    }

    public function resolve()
    {
        $path  = $this->request->path();
        $method = $this->request->method();
        $action = self::$routes[$method][$path] ?? false;

        //var_dump($action);
        dump(self::$routes);

        if(!array_key_exists($path, self::$routes[$method])){
            $this -> response -> setStatusCode(404);

            //View::makeError('404'); // taml taf3elha ma3a point 16
            View::makeError('404');
        }
        if(!$action) {
            return;
        }

        //Route::get('home', function ())

        if(is_callable($action)) {
            call_user_func_array($action, []);
        }

        if(is_array($action)){
            $controller = new $action[0];
            $method = $action[1];

            call_user_func_array([$controller, $method] , []);
        }
    }
}