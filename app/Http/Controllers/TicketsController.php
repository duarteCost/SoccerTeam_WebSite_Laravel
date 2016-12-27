<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Ticket;
use App\Basket_Temp;
use Illuminate\Support\Facades\Storage;

use Auth;
use App\User;




class TicketsController extends Controller
{


    /*public function tickets()
    {
        return view('tickets');
    }*/
    public function addTicket(Request $request, $game){

        if (Auth::check()) {
            $quant = $request->quantity;
            $game_id = $game;
            $area = $request->zone;

            $games = DB::table('games')->where('game_id', '=', $game_id)->get();
            foreach ($games as $game) {
                for ($i = 0; $i < $quant; $i++) {
                    $clube_away = DB::table('clubs')->where('club_id', '=', $game->awayTeam_id)->value('club_name');
                    $game_name = "Real Madrid vs " . $clube_away;
                    $ticket = new Ticket();;
                    $ticket->price = $game->ticket_price;
                    $ticket->area = $area;
                    $ticket->game_name = $game_name;
                    $ticket->game_id = $game->game_id;
                    $ticket->date = $game->date;
                    $ticket->save();

                    $currentUser = Auth::user();
                    $basket_temp = new Basket_Temp();
                    $basket_temp->ticket_id = $ticket->id;
                    $currentUser->basket_temp()->save($basket_temp);
                }
            }
            return redirect("/tickets/all");
        }
        else{
            return redirect("/login");
        }
    }



    /*----------------------- JORGE ------------------------------*/
    public function getGames($game_id){
        if($game_id == "all") {


        $homeTeams = DB::table('games')
            ->leftJoin('clubs', 'club_id', '=', 'homeTeam_id')

            ->get();


        $awayTeams = DB::table('games')
            ->leftJoin('clubs', 'club_id', '=', 'awayTeam_id')

            ->get();
        }
        else
        {
            $homeTeams = DB::table('games')
                ->leftJoin('clubs', 'club_id', '=', 'homeTeam_id')
                ->where('games.game_id','=', $game_id)
                ->get();


            $awayTeams = DB::table('games')
                ->leftJoin('clubs', 'club_id', '=', 'awayTeam_id')
                ->where('games.game_id','=', $game_id)
                ->get();

        }

        $homeTeams_urls = array();

        foreach($homeTeams as $imageName) {

            $s3 = Storage::disk('s3');
            if(!empty($imageName->club_title) && !empty($imageName->club_path)) {
                $path = $imageName->club_path.$imageName->club_title;
                $exists = $s3->exists($path);
                if ($exists) {
                    $urlFile = $s3->url($path);

                    $homeTeams_urls [$imageName->game_id][] = $urlFile;


                }
            }
        }

        $awayTeams_urls = array();

        foreach($awayTeams as $imageName) {

            $s3 = Storage::disk('s3');
            if(!empty($imageName->club_title) && !empty($imageName->club_path)) {
                $path = $imageName->club_path.$imageName->club_title;
                $exists = $s3->exists($path);
                if ($exists) {
                    $urlFile = $s3->url($path);

                    $awayTeams_urls [$imageName->game_id][] = $urlFile;


                }
            }
        }
        if($game_id == "all") {
            return view('tickets', compact('awayTeams', 'homeTeams' , 'awayTeams_urls', 'homeTeams_urls'));
        }
        else
        {
            return view('gameTicket', compact('awayTeams', 'homeTeams' , 'awayTeams_urls', 'homeTeams_urls'));
        }

    }



}

