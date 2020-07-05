<h1 align="center">LARACAST COURSE GUIDE </h1>
<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>
<h2 align="center"> Laravel from the Scratch Course Guide</h2>

# 1.Workshop 1
<h2 align="center">INSTALATION COMMANDS</h2>

<p>These line is to turn on ssh </p>

```bash
eval `ssh-agent -s`   
```
<h2 align="center">ROUTING</h2>


## Basic Routing
<p>The most basic Laravel routes accept a URI and a Closure</br>providing a very simple and expressive method of defining routes:
</p>

```php
Route::get('/text', function () {
    return 'Hello World';
});
```
<p>You can redirect or route to json objects, or to html views (blades);
</p>

```php

Route::get('/json', function () {
    return ['foo'=> 'bar'];
});

Route::get('/', function () {
    return view('welcome');
});
```
## Routing Params 

You can redirect or route with params.

The 'key' is the word that you use in QueryString like: http://pizzalaravel.com/param?key=felipe ,you'd need pass the word 'KEY' then set = and then set the param you would like 

```php
Route::get('param', function () {
    $name = request('key');
    return $name;
});
```

Or you can simplify the route like this;

```php
Route::get('param2', function () {
    return view('test',[
        'name'=> request('name'),
    ]);
});
```

## Routing Wildcards

Wildcard is like a param, you can pass  values without specify the key

Check te url http://pizzalaravel.com/posts/ABC12312312

```php
Route::get('/posts/{wildcard}', function ($wildcard) {
    return $wildcard;
});

```

These type of wildcard permits you to set the variables and results you would like check the url 

Plus, you can check the if, the if validate if params exists in array, if not show 404 message.

Check the urls http://pizzalaravel.com/posts/my-first-wildcard and http://pizzalaravel.com/posts/my-second-wildcard

```php
Route::get('/posts/{wildcard}', function ($wildcard) {
    $wildcards = [
      
        'my-first-wildcard'=> 'hello this is my first wildcard post!',
        'my-second-wildcard'=> 'Im learning'
    ];

   
    if(! array_key_exists($wildcard,$wildcards)) {
        abort(404,'Ups that post not found');
    }

    return view('wildcards',[
        'wildcard'=> $wildcards[$wildcard]
    
    ]);
});

```