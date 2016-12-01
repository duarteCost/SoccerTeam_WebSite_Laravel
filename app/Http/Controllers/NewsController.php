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
    public function addNew(Request $request)
    {$user = Auth::user();
        if($user->type) {
            $news = News::get();
            foreach ($news as $new) {
                $Nnew = new News();
                $Nnew->title = $request->newTitle;
                $Nnew->content = $request->newContent;
                $user->news()->save($Nnew);
                return redirect("/user");
            }
        }
        else
        {
            return redirect("/user");
        }
    }

    public function editeNew(Request $request, News $new){
        $title = $request->newTitle;
        $content = $request->newContent;
        DB::table('news')->where('id','=', $new->id)->update(array('title'=> $title, 'content' => $content));
        return redirect("/user");
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
