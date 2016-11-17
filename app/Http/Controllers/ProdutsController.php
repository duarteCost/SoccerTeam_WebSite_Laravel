<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class ProdutsController extends Controller
{
    public function produts()
    {
    	$produts = DB::table('produts')->get();
        return view('produts', compact('produts'));
    }
}
