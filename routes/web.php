<?php

use Illuminate\Http\Route;

use App\Controllers\HomeController;

//Route::get('/home', fn () => 5);

Route::get('/home' ,[HomeController::class, 'index']);


// // --1--
// Route::get('/users/{username}'),[ProfileIndexController::class, '__invoke']);

// /users/{username};