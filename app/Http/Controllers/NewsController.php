<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Http\Requests;
use Auth;
use App\new_img;
use App\Produt;
use DB;
use App\User;

class NewsController extends Controller
{
    public function addNew(Request $request)
    {$user = Auth::user();
        if($user->type) {
            $new = new News();
            $new->title = $request->newTitle;
            $new->content = $request->newContent;
            if($user->news()->save($new)){
                $image = $request->file('image');
                $imageFileName = time() . '.' . $image->getClientOriginalExtension();
                $filePath = '/news/' . $imageFileName;
                $s3 = \Storage::disk('s3');
                if($s3->put($filePath, file_get_contents($image), 'public')){
                    $new_img = new new_img();
                    $new_img->title = $imageFileName;
                    $new_img->path="/news/";
                    $new->new_img()->save($new_img);
                    return redirect("/user");
                }
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
        if($request->file('image')){
            $new_imgs = new_img::get();
            foreach ($new_imgs as $new_img) {
                if ($new_img->new_id == $new->id) {
                    $path = $new_img->path;
                    $title = $new_img->title;
                    \Storage::disk('s3')->delete($path . '' . $title);
                    DB::table('new_img')->where('new_id', '=', $new->id)->delete();

                    $image = $request->file('image');
                    $imageFileName = time() . '.' . $image->getClientOriginalExtension();
                    $filePath = '/news/' . $imageFileName;
                    $s3 = \Storage::disk('s3');
                    if($s3->put($filePath, file_get_contents($image), 'public')){
                        $new_img = new new_img();
                        $new_img->title = $imageFileName;
                        $new_img->path="/news/";
                        $new->new_img()->save($new_img);
                        return redirect("/user");
                    }
                }
            }
        }
        return redirect("/user");
    }

    public function checkNewState(Request $request){
        if($request->newState == "Eliminar New")
        {
            $news = News::get();
            foreach ($news as $new) {
                $new_id = $new->id;
                if($request->newId ==$new_id){
                    if(DB::table('news')->where('id','=', $new_id)->delete()) {

                        $new_imgs = DB::table('new_img')->where('new_id', '=', $new_id)->get();
                        foreach ($new_imgs as $new_img) {
                            $path = $new_img->path;
                            $title = $new_img->title;
                            \Storage::disk('s3')->delete($path . '' . $title);
                        }
                        DB::table('new_img')->where('new_id', '=', $new_id)->delete();
                    }
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


    public function getNews($new_id){

             $news = DB::table('news')

                 ->leftJoin('users','users.id','=','news.user_id')
                 ->select('name', 'news.id','news.created_at', 'news.updated_at','title', 'content')
                 ->where('news.id','=', $new_id)
                 ->orderBy('news.updated_at', 'desc')
                 ->get();

        return view('detailsNews', compact('news'));

    }



}
