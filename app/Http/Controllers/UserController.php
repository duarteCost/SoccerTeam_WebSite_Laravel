<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Produt;
use App\News;
use App\products_purchased;
use Auth;
use DB;
use App\Basket_Temp;
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

    public function deleteSocio(Request $request)
    {
        $currentUser = Auth::user();
        $users = User::all();
        foreach ($users as $user1) {
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
    }

    public function processState(Request $request){
        $user = Auth::user();
        $users = DB::table('users')->where('type', '=', 0)->get();
        $news = News::get();
        $basket_temp = DB::table('Basket_Temp')->where('user_id','=', $user->id)->get();
        $products = Produt::get();
        $products_Purchased =products_purchased::get();
        return view('user', compact('user','users','products','basket_temp','news','products_Purchased'));

    }
}
