<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Http\Requests;
use Auth;
use App\Produt;
use DB;
use App\User;

class NewsController extends Controller
{
    public function addNew(Request $request, User $user)
    {
        if($user->type) {
            $new = new News();
            $new->title = $request->newTitle;
            $new->content = $request->newContent;
            $user->news() -> save($new);
            return redirect("/user");
        }
        else
        {return $request;}
    }
    public function checkNewState(Request $request){
        if($request->newState == "Eliminar New")
        {
            $news = News::get();
            foreach ($news as $new) {
                $new_id = $new->id;
                if($request->newId ==$new_id){
                    DB::table('news')->where('id','=', $new_id)->delete();
                }else{
                    continue;
                }
            }
            return redirect("/user");
        }
        else
        {
            $news = News::get();
            foreach ($news as $new) {
                $new_id = $new->id;
                if($request->newId ==$new_id){
                    $user = Auth::user();
                    $users = User::get();
                    $news = News::get();
                    $basket_temp = DB::table('Basket_Temp')->where('user_id','=', $user->id)->get();
                    $products = Produt::get();
                    return view('user', compact('user','users','products','basket_temp','news','new'));
                }else{
                    continue;
                }
            }
            return redirect("/user");
        }
    }
}
