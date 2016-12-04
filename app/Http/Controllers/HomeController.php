<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produt;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function about()
    {
        return view('about');
    }


    public function products()
    {
        $produts = DB::table('produts')->get();
        return view('produts', compact('produts'));
    }


    public function help()
    {
        return view('help');
    }

    //----------- JORGE ---------------

    public function news()
    {
        $news = DB::table('news')->get();
        return view('news', compact('news'));

    }



    public function home()
    {
        $latest_news = DB::table('news')

            ->leftJoin('users','users.id','=','news.user_id')
            ->select('name', 'news.id','news.created_at', 'news.updated_at','news.title', 'news.content')
            ->orderBy('news.updated_at', 'desc')
            ->get();

        $latest = DB::table('news')

            ->leftJoin('users','users.id','=','news.user_id')
            ->leftJoin('new_img','new_id','=','news.id')
            ->select('name', 'news.id','news.created_at', 'news.updated_at', 'news.content' ,'new_img.title','new_img.path' )
            ->orderBy('news.updated_at', 'desc')
            ->get();



        $array_urls = array();
        foreach($latest as $imageName) {

            $s3 = Storage::disk('s3');
            if (!empty($imageName->title) && !empty($imageName->path)) {
                $path = $imageName->path . $imageName->title;
                $exists = $s3->exists($path);
                if ($exists) {
                    $urlFile = $s3->url($path);

                    $array_urls [$imageName->id][] = $urlFile;

                }

            }
        }




        /*------------- API Tabela --------------*/

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://api.football-data.org/v1/competitions/436/leagueTable",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "x-auth-token: 6afff763f3334c7f8b128322605fbe28"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
}

/*----------------- Tabla de jogos  ---------------*/



$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://api.football-data.org/v1/teams/86/fixtures",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "postman-token: e6aeba2a-422e-4e70-04a0-60f9c0049b66",
        "x-auth-token: 6afff763f3334c7f8b128322605fbe28"
    ),
));

$response_games = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
}


        return view('welcome', compact('latest_news', 'array_urls' , 'response' , 'response_games')) ;



    }



}
