<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use DB;
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
        $game->ticket_price= $request->ticket_price;
        $game->date = $request->game_time;
        if( $game->date > date('Y-m-d H:i')) {
            $satadium->games()->save($game);
        }
        return redirect("/user");
    }

    public function removeGame(Request $request){
        $game_id = $request->game_id;
        DB::table('games')->where('game_id','=', $game_id)->delete();
        return redirect("/user");
    }
}
