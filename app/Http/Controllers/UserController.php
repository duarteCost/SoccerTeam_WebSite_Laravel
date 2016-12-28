<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use App\Http\Requests;//Ricardo - Adicionei esta linha po mailer
use App\User;
use App\Produt;
use App\Ticket;
use App\News;
use App\Basket;
use App\products_purchased;
use Auth;
use DB;
use Illuminate\Support\Facades\Storage;
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

   /* public function processState(Request $request){
        $user = Auth::user();
        $users = DB::table('users')->where('type', '=', 0)->get();
        $news = News::get();
        $basket_temp = DB::table('Basket_Temp')->where('user_id','=', $user->id)->get();
        $products = Produt::get();
        $products_Purchased =products_purchased::get();
        return view('user', compact('user','users','products','basket_temp','news','products_Purchased'));

    }*/



    public function processState(Request $request){
        $user = Auth::user();
        $users = DB::table('users')->where('type', '=', 0)->get();
        $news = News::get();
        $basket_temp = DB::table('Basket_Temp')->where('user_id','=', $user->id)
            /*  JORGE   */
            ->leftJoin('product_img', 'product_img.product_id', '=', 'Basket_Temp.product_id')
            /* FIM JORGE   */
            ->get();
        $products = Produt::get();
        $products_Purchased =products_purchased::get();
        $products_user_Purchased = DB::table('products_purchaseds')->where('user_id','=', $user->id)->get();
        $clubs = DB::table('clubs')->where('club_id','!=', 1)->get();
        $tickets = Ticket::get();
        $games = Game::get();


        /*  JORGE   */


        $array_urls = array();

        foreach($basket_temp as $imageName) {

            $s3 = Storage::disk('s3');
            if(!empty($imageName->title) && !empty($imageName->path)) {
                $path = $imageName->path.$imageName->title;
                $exists = $s3->exists($path);
                if ($exists) {
                    $urlFile = $s3->url($path);

                    $array_urls [$imageName->product_id][] = $urlFile;


                }
            }
        }


        /*  FIM JORGE   */



        return view('user', compact('user','users','products','basket_temp','news','products_Purchased', 'array_urls', 'clubs', 'tickets', 'products_user_Purchased', 'games'));

    }
}
