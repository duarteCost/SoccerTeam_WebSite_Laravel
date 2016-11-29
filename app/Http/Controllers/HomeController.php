<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produt;
use DB;
use App\Http\Requests;

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
    public function news()
    {
        return view('news');
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
}
