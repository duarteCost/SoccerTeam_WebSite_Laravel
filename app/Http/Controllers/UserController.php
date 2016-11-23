<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkUser()
    {

        $user = Auth::user();
        return view('user', compact('user'));

        //$use = User::find($user);
      //return $user;
       // return view('user');
    }

    public function checkUser2()
    {
        $user = Auth::user();
        return view('addProduts', compact('user'));

    }
}
