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
    return view('params');
});

//Aqui retornamos en ves de una vista un texto
Route::get('/text', function () {
    return 'Hello World';
});

//Aqui retornamos en ves de una vista un json
Route::get('/json', function () {
    return ['foo'=> 'bar'];
});



/*
Pasando parametros
http://pizzalaravel.com/param?key=felipe
*/
Route::get('param', function () {
    $name = request('key');
    return $name;
});

/*
Pasando parametro y usandolos en el blade (Probar con las dos url)
http://pizzalaravel.com/param2?name=FelipeChacon
http://pizzalaravel.com/param2?name=<script>alert('FelipeChacon')</script>
*/
Route::get('param2', function () {
    return view('params',[
        'name'=> request('name'),
    ]);
});


/**
 * Wildcards
 * Podemos pasarle cualquier valor como paramertro
 * http://pizzalaravel.com/posts/ABC12312312
 */
Route::get('/posts/{wildcard}', function ($wildcard) {
    return $wildcard;
});

/**
 * Wildcard
 * Usandolo en el blade
 * http://pizzalaravel.com/posts/my-first-wildcard
 * http://pizzalaravel.com/posts/my-second-wildcard
 */
Route::get('/posts/{wildcard}', function ($wildcard) {
    $wildcards = [
        ##estos serian los parametros si colocamos otro parametro se cae, pero se puede manejar con el default
        'my-first-wildcard'=> 'hello this is my first wildcard post!',
        'my-second-wildcard'=> 'Im learning'
    ];

    ##Este if es para retornaer un 404 en caso de pasar otro wildcard
    if(! array_key_exists($wildcard,$wildcards)) {
        abort(404,'Ups that post not found');
    }

    return view('wildcards',[
        'wildcard'=> $wildcards[$wildcard]
       ## se puede validar un default asi tambien en vez del if 'wildcard'=> $wildcards[$wildcard] ?? 'Este seria el default'

    ]);
});


/**
 * Route to controller
 * ES LA MEJOR MANERA DE ENRUTAR, ya que las rutas no tienen que tener logica de negocio
 */
Route::get('/firstController/{post}','firstController@show');

/**
 * Route to controller
 * Database testing
 * http://pizzalaravel.com/testDB/SergioRamos
 */
Route::get('/testDB/{name}','laravelFromScratch@showDataDB');