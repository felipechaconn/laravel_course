<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use DB;
class laravelFromScratch extends Controller
{
    public function showDataDB($name)
    {
        $player=  DB::table('players')->where('name',$name)->first();
        
        if(!$player) {
            abort(404);
        }
    return view('players',[
        'player'=> $player
    ]);
    }

    public function showDataDBWithEloquent($name)
    {
        //El orfail evita hacer un if y verificar si trae algo
    return view('players',[
        'player'=> Player::where('name',$name)->firstOrFail()
    ]);
    }
}
