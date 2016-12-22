<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Http\Requests;

class GameController extends Controller
{
    public function addGame(Request $request){

        $game = new Game();
        $game->awayTeam_id = $request->game;
        $game->date = $request->game_time;
        if( $game->date > date('Y-m-d H:i')) {
            $game->save();
        }
        return redirect("/user");
    }
}
