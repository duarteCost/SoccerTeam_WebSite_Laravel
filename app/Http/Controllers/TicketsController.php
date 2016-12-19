<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Produt;
use App\product_img;
use App\Basket_Temp;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Http\File;
//use Illuminate\Contracts\Filesystem\Filesystem;
use Auth;
use App\User;




class TicketsController extends Controller
{


    public function tickets()
    {
        return view('tickets');
    }



    /*----------------------- JORGE ------------------------------*/
    public function getGames(){

        $games = DB::table('games')
            ->leftJoin('clubs', 'homeTeam_id', '=', 'game_id')

            ->get();

        return view('tickets', compact('games'));
    }



}

