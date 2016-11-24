<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Produt;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

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
        $users = User::get();
        return view('user', compact('user','users'));

        //$use = User::find($user);
      //return $user;
       // return view('user');
    }

    public function checkUser2()
    {
        $user = Auth::user();
        return view('addProduts', compact('user'));

    }

    public function deleteSocio(Request $request)
    {
        $currentUser = Auth::user();
        $users = User::all();
        $o=0;
        foreach ($users as $user1) {
            $o++;
            $id = $user1->id;

            if ($currentUser->type) {
                if($request->$id){
                    $i=User::findOrFail($id)->delete();
                }else{
                    continue;
                }
            } else {
                return redirect("/user");
            }
        }
        return redirect("/user");
        return redirect("/user");
    }
}
