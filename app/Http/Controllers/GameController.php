<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Stadium_place;
use App\Http\Requests;

class GameController extends Controller
{
    public function addGame(Request $request){
        $satadium = new Stadium_place();
        $satadium->zone_a = 500;
        $satadium->zone_b = 200;
        $satadium->zone_c = 400;
        $satadium->zone_d = 250;
        $satadium->save();
        $game = new Game();
        $game->awayTeam_id = $request->game;
        $game->date = $request->game_time;
        if( $game->date > date('Y-m-d H:i')) {
            $satadium->games()->save($game);
        }
        return redirect("/user");
    }
}
