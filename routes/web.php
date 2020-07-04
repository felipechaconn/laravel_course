<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Aqui cambiamos la ruta y el view
Route::get('test', function () {
    return view('test');
});

//Aqui retornamos en ves de una vista un texto
Route::get('/text', function () {
    return 'Hello World';
});

//Aqui retornamos en ves de una vista un json
Route::get('/json', function () {
    return ['foo'=> 'bar'];
});