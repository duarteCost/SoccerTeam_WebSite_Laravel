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
            ->leftJoin('new_img','new_id','=','news.id')
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
        $path = $imageName->path.$imageName->title;
            $exists = $s3->exists($path);
            if($exists) {
                $urlFile = $s3->url($path);
                if(empty($array_urls [$imageName->id][0])) {
                    $array_urls [$imageName->id][] = $urlFile;
                }

            }

        }

        return view('welcome', compact('latest_news', 'array_urls')) ;




    }



}
