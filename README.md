<h1 align="center">LARACAST COURSE GUIDE </h1>
<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>
<h2 align="center"> Laravel from the Scratch Course Guide</h2>

# 1.Workshop 1
<h2 align="center">Instalation Commands</h2>

<p>These line is to turn on ssh </p>

```bash
eval `ssh-agent -s`   
```
<h2 align="center">Routing</h2>

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

