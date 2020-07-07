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

## Routing to controllers

This is the best way to manage routes, we have to link the route with controller
like this:
@show is the functios inside firstController
```php
Route::get('/firstController/{post}','firstController@show');
```

We can create the controller with this command 

```bash
 php artisan make:controller firstController
```

<h2 align="center">Database</h2>

## Configuration

1. You need to configurate db credentials in .env and select what type of BD you would like to use
   ```.env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravelFromScratch
    DB_USERNAME=felipechaconn
    DB_PASSWORD=Admin

   ```
2. Execute commands to inside into mysql 
   ```bash
    mysql -u felipechaconn -p
    ```
3. Create Database
    ```bash
    create database laravelFromScratch;
    ```
4. Check the connection in db managment(workbench mysql)
    Reference-style: 
    ![alt text][logo]
    [logo]:../imagesMarkDown/WorkbenchConfig.png "Logo Title Text 2"
5. Insert Data in DB.
6. In Controller  you will need to do something like that to consult db:
    ```php
        $post= \DB::table('posts')->where('name',$name)->first();
        dd($post);
    ```
8. In blade you could recive data like this:
```html
 <h1>My first consult</h1> 
   <p>His soccer Team is {{$post->soccerTeam}}</p>
```
1. Check the data in explorer http://pizzalaravel.com/testDB/SergioRamos;


## Hello Eloquent

1. Create Model
    ```bash
        php artisan make:model Player   
    ```
2. In controller with Eloquent looks like :
   ```php
      return view('players',[
        'player'=> Player::where('name',$name)->firstOrFail()
    ]);
   ```
## Migrations 101

1. To create migration you have to use this command
    ```bash
        php artisan make:migration create_players_table
    ```
2. Execute the migration:
   ```bash
        php artisan migrate
    ```

<h2 align="center">Views</h2>

## Layout pages
You can manage view with layouts, you have only one file with the name 
layout,  then you can add dynamic content, with helpers like @yields
