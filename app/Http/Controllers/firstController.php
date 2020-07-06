<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class firstController extends Controller
{
    //creamos el metodo show 
    public function show(){
        return 'Im in show function inside firstController';
    }
}
