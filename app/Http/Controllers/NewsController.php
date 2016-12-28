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
use Illuminate\Support\Facades\Storage;
class NewsController extends Controller
{
    public function addNew(Request $request)
    {$user = Auth::user();
        if($user->type) {
            $new = new News();
            $new->title = $request->newTitle;
            $new->content = $request->newContent;
            if($user->news()->save($new)){
                $imageNew = $request->file('imageNew');
                $imageBanner = $request->file('imageBanner');
                $imageNewFileName = time() . '.' . $imageNew->getClientOriginalExtension();
                sleep(1);
                $imageBannerFileName = time() . '.' . $imageBanner->getClientOriginalExtension();
                $imageNewPath = 'news/' . $imageNewFileName;
                $imageBannerPath = 'news/' . $imageBannerFileName;
                $s3 = \Storage::disk('s3');
                if($s3->put($imageNewPath, file_get_contents($imageNew), 'public') && $s3->put($imageBannerPath, file_get_contents($imageBanner), 'public')){
                    $new_img = new new_img();
                    $new_img->title = $imageNewFileName;
                    $new_img->type = 0;
                    $new_img->path="news/";
                    $new->new_img()->save($new_img);
                    $new_img_b = new new_img();
                    $new_img_b->title = $imageBannerFileName;
                    $new_img_b->type = 1;
                    $new_img_b->path="news/";
                    $new->new_img()->save($new_img_b);
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
        if($request->file('imageNew') || $request->file('imageBanner')){
            $new_imgs = new_img::get();
            foreach ($new_imgs as $new_img) {
                if ($new_img->new_id == $new->id) {
                    $path = $new_img->path;
                    $title = $new_img->title;
                    \Storage::disk('s3')->delete($path . '' . $title);
                    DB::table('new_img')->where('new_id', '=', $new->id)->delete();

                    $imageNew = $request->file('imageNew');
                    $imageBanner = $request->file('imageBanner');
                    $imageNewFileName = time() . '.' . $imageNew->getClientOriginalExtension();
                    sleep(1);
                    $imageBannerFileName = time() . '.' . $imageBanner->getClientOriginalExtension();
                    $imageNewPath = 'news/' . $imageNewFileName;
                    $imageBannerPath = 'news/' . $imageBannerFileName;
                    $s3 = \Storage::disk('s3');
                    if($s3->put($imageNewPath, file_get_contents($imageNew), 'public') && $s3->put($imageBannerPath, file_get_contents($imageBanner), 'public')){
                        $new_img = new new_img();
                        $new_img->title = $imageNewFileName;
                        $new_img->type = 0;
                        $new_img->path="news/";
                        $new->new_img()->save($new_img);
                        $new_img_b = new new_img();
                        $new_img_b->title = $imageBannerFileName;
                        $new_img_b->type = 1;
                        $new_img_b->path="news/";
                        $new->new_img()->save($new_img_b);
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
                    $clubs = DB::table('clubs')->where('club_id','!=', 1)->get();
                    return view('user', compact('user','users','products','basket_temp','news','new','clubs'));
                }else{
                    continue;
                }
            }
            return redirect("/user");
        }
    }

/*----------------------- JORGE ------------------------------*/
    public function getNews()
    {
        $latest_news = DB::table('news')

            ->leftJoin('users','users.id','=','news.user_id')
            ->select('name', 'news.id','news.created_at', 'news.updated_at', 'news.content' ,'news.title' )
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
            if(!empty($imageName->title) && !empty($imageName->path)) {
                $path = $imageName->path . $imageName->title;
                $exists = $s3->exists($path);
                if ($exists) {
                    $urlFile = $s3->url($path);

                    $array_urls [$imageName->id][] = $urlFile;

                }
            }

        }

        return view('news', compact('latest_news', 'array_urls')) ;




    }


    public function getNew($new_id){

             $news = DB::table('news')
                 ->leftJoin('users','users.id','=','news.user_id')
                 ->select('name', 'news.id','news.created_at', 'news.updated_at', 'news.content' ,'news.title' )
                 ->where('news.id','=', $new_id)
                 ->orderBy('news.updated_at', 'desc')
                 ->get();

              $images = DB::table('news')
                  ->leftJoin('users','users.id','=','news.user_id')
                  ->leftJoin('new_img','new_id','=','news.id')
                  ->select('name', 'news.id','news.created_at', 'news.updated_at', 'news.content' ,'new_img.title','new_img.path' )
                  ->where('news.id','=', $new_id)
                  ->orderBy('news.updated_at', 'desc')
                  ->get();

        $array_urls = array();

        foreach($images as $imageName) {

            $s3 = Storage::disk('s3');
            $path = $imageName->path.$imageName->title;
            $exists = $s3->exists($path);
            if($exists) {
                $urlFile = $s3->url($path);

                    $array_urls [$imageName->id][] = $urlFile;



            }

        }

        return view('detailsNews', compact('news', 'array_urls'));

    }



}
