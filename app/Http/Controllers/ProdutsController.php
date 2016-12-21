<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Produt;
use App\product_img;
use App\Basket_Temp;
use App\products_purchased;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Http\File;
//use Illuminate\Contracts\Filesystem\Filesystem;
use Auth;
use App\User;

class ProdutsController extends Controller
{
    /*public function products()
    {
    	$produts = DB::table('produts')->get();
        return view('produts', compact('produts'));
    }*/

    public function addBasketTemp(Request $request, Produt $produt){
        $currentUser = Auth::user();
        //$bakets_temp = Basket_Temp::all();
        $basket_temp = new Basket_Temp();
       // $basket_temp->user_id = $currentUser->id;
        $basket_temp->product_id = $produt->id;
        $currentUser->basket_temp()->save($basket_temp);
        return redirect("/products/all");
    }

    public function addProduct(Request $request, User $user)
    {
        if($user->type) {
            $produt = new Produt();
            $produt->name = $request->productName;
            $produt->price = $request->productPrice;
            if($produt->save()){
                $image = $request->file('image');
                $imageFileName = time() . '.' . $image->getClientOriginalExtension();
                $filePath = '/products/' . $imageFileName;
                $s3 = \Storage::disk('s3');
                if($s3->put($filePath, file_get_contents($image), 'public')){
                    $product_img = new product_img();
                    $product_img->title = $imageFileName;
                    $product_img->path="products/";
                    $produt->product_img()->save($product_img);
                    return redirect("/user");
                }
            }

            return redirect("/user");
        }
    }
    //verifica o estado e dependente elimina ou acrescenta imagem

    public function delete_editProducts(Request $request)
    {
        $currentUser = Auth::user();
        $produts = Produt::all();
        if($request->productState== "Eliminar"){
            foreach ($produts as $produt) {
                $id = $produt->id;
                if ($currentUser->type) {
                    if ($request->product_Id == $id) {
                        DB::table('Basket_Temp')->where('product_id', '=', $id)->delete();
                        if(DB::table('produts')->where('id', '=', $id)->delete()) {

                            $product_imgs = DB::table('product_imgs')->where('product_id', '=', $id)->get();
                            foreach ($product_imgs as $product_img) {
                                $path = $product_img->path;
                                $title = $product_img->title;
                                \Storage::disk('s3')->delete($path . '' . $title);
                            }
                            DB::table('product_imgs')->where('product_id', '=', $id)->delete();
                        }
                    } else {
                        continue;
                    }
                } else {
                    return redirect("/user");
                }
            }
            return redirect("/user");
        }
        else{
            foreach ($produts as $produt) {
                $id = $produt->id;
                if ($currentUser->type) {
                    if ($request->product_Id == $id) {

                        $image = $request->file('image');
                        $imageFileName = time() . '.' . $image->getClientOriginalExtension();
                        $filePath = '/products/' . $imageFileName;
                        $s3 = \Storage::disk('s3');
                        if($s3->put($filePath, file_get_contents($image), 'public')){
                            $product_img = new product_img();
                            $product_img->title = $imageFileName;
                            $product_img->path="products/";
                            $produt->product_img()->save($product_img);
                            return redirect("/user");
                        }
                    } else {
                        continue;
                    }
                } else {
                    return redirect("/user");
                }
            }
            return redirect("/user");
        }
    }
    //seliminar os produtos do carrinho do sócio
    public function basketOperation(Request $request)
    {
        if($request->basketOperation == "Eliminar") {
            $basket_temp = Basket_Temp::get();
            foreach ($basket_temp as $basket_produt) {
                $product_id = $basket_produt->product_id;
                $id = $basket_produt->id;
                if ($request->$product_id) {
                    DB::table('Basket_Temp')->where('id', '=', $id)->delete();
                    return redirect("/user");
                } else {
                    continue;
                }
            }
            return redirect("/user");
        } elseif($request->basketOperation == "Comprar"){
            $basket_temp = Basket_Temp::get();
            foreach ($basket_temp as $basket_product) {
                $product_id = $basket_product->product_id;
                $id = $basket_product->id;
                if ($request->$product_id) {
                    $currentUser = Auth::user();
                    $products= DB::table('produts')->where('id', '=', $product_id)->get();
                    foreach ($products as $product){
                        $price = $product->price;
                    }
                    $amount=$currentUser->amount;
                    $a_amount = $amount-$product->price;
                    DB::table('users')->where('id', '=', $currentUser->id)->update(array('amount' => $a_amount));
                    DB::table('Basket_Temp')->where('id', '=', $id)->delete();
                    $basket = new products_purchased();
                    $basket->product_id = $basket_product->product_id;$currentUser->basket()->save($basket);
                    return redirect("/user");

                } else {
                    continue;
                }

            }
            return redirect("/user");

        }
    }


    /*----------------------- JORGE ------------------------------*/
    public function getProducts($product_id){
        if($product_id == "all") {
            $products = DB::table('produts')
                ->leftJoin('product_imgs', 'produts.id', '=', 'product_id')
                ->select('produts.name','produts.price','produts.id','produts.created_at', 'produts.updated_at' ,'product_imgs.title','product_imgs.path' )
                ->get();
        }
        else
        {
            $products = DB::table('produts')
                ->leftJoin('product_imgs', 'produts.id', '=', 'product_id')
                ->select('produts.name','produts.price','produts.id','produts.created_at', 'produts.updated_at' ,'product_imgs.title','product_imgs.path' )
                ->where('produts.id','=', $product_id)
                ->get();
        }

        $array_urls = array();

        foreach($products as $imageName) {

            $s3 = Storage::disk('s3');
            if(!empty($imageName->title) && !empty($imageName->path)) {
                $path = $imageName->path.$imageName->title;
                $exists = $s3->exists($path);
                if ($exists) {
                    $urlFile = $s3->url($path);

                    $array_urls [$imageName->id][] = $urlFile;


                }
            }
        }
        if($product_id == "all") {
        return view('produts', compact('products', 'array_urls'));
        }
        else
        {
            return view('detailsProduct', compact('products', 'array_urls'));
        }
    }



}
