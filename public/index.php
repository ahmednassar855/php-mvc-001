<?php

use Dotenv\Dotenv;
//use Illuminate\View\View;

use Illuminate\Validation\Validator;
session_start();

// require_once '../vendor/autoload.php';   12---- el code kan ma3mool be el tarteeb dah fe 2wel ba3d keda et3'ayar
// require_once '../src/Support/helpers.php';
// require_once '../routes/web.php';

require_once __DIR__ . '/../src/Support/helpers.php';
require_once base_path() . 'vendor/autoload.php';
//require_once base_path() . 'routes/web.php';

//$dotenv = Dotenv::createImmutable(base_path());
//$dotenv->load();

// $v = new View;
// $v = getViewContent('auth.signup');
//app()->run();
//dump(env('APP_NAME'));

//dump(env('APP'));

//dump(env('APP_DATABASE'));

//dump(env('APP_KEY', 'abc'));

//dump((new Request())->method());


//dump((new Request())->all());

//dump(app());
//dump(app());
//dump(app());
/* 

if (!function_exists('env')) {
    function env($key, $default = null)
    {
        return $_ENV[$key] ?: $default;
    }
}
dumb()

if (!function_exists('env')) {
    function env($key, $default = null)
    {
        if (array_key_exists($key, $_ENV)) {
            return $_ENV[$key];
        }

        return $default;
    }
}
dump(env('APP_KEY', 'abc'));

*/


$v = new Validator();

$v-> setRules([
    'username' =>  ['required'],
    'email' => ['required','email'],
    'password' => ['required','confirmed']
    
]);

$v->make([
    'username' =>'ahemdNassar',
    'email' => 'ahmed.nassar@gmail.com',
    'password' => 'secret',
    'password_confirmation' => 'secret'
]);

var_dump($v ->errors());

var_dump($v ->passes());