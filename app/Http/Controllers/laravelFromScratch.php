<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class laravelFromScratch extends Controller
{
    public function showDataDB($name)
    {
        $post= \DB::table('posts')->where('name',$name)->first();
    return view('post',[
        'post'=> $post
    ]);
    }
}
