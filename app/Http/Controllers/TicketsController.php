<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Produt;
use App\product_img;
use App\Basket_Temp;
use Illuminate\Support\Facades\Storage;

use Auth;
use App\User;




class TicketsController extends Controller
{


    public function tickets()
    {
        return view('tickets');
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

