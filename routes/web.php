<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FashionController;
use App\Http\Middleware\AuthUserMiddleware;
use App\Http\Middleware\RegisterMiddleware;
use Illuminate\View\Middleware\ShareErrorsFromSession;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('identity', ["message"=>"ini-content-element", "options"=>["salam","hayy","hello"], "type"=>"text"]);
});

Route::controller(FashionController::class)->group(function(){
    Route::get('/fashions','index');
    Route::post('/fashions','store');
    Route::get('/fashions/create','create')->middleware(AuthUserMiddleware::class);
    Route::get('/fashions/trash','trash')->middleware(AuthUserMiddleware::class);
    Route::get('/fashions/{id}', 'show')->whereNumber('id');
    Route::patch('/fashions/{id}', 'update')->whereNumber('id')->middleware(AuthUserMiddleware::class);
    Route::delete('/fashions/{id}', 'destroy')->whereNumber('id')->middleware(AuthUserMiddleware::class);
    Route::get('/fashions/{id}/edit', 'edit')->whereNumber('id')->middleware(AuthUserMiddleware::class);
    Route::get('/fashions/{id}/undo', 'undo')->whereNumber('id')->middleware(AuthUserMiddleware::class);
    Route::get('/fashions/{id}/remove', 'remove')->whereNumber('id')->middleware(AuthUserMiddleware::class);
});

Route::controller(AuthController::class)->group(function(){
    Route::get('/auth/login','login')->middleware(RegisterMiddleware::class);
    Route::get('/auth/logout','logout');
    Route::post('/auth/login', 'authenticate');
    Route::get('/auth/register', 'register')->middleware(RegisterMiddleware::class);
    Route::post('/auth/register', 'registering');
});


