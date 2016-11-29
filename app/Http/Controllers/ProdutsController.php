<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Produt;
use App\Basket_Temp;
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
        return redirect("/products");
    }

    public function addProduct(Request $request, User $user)
    {
        if($user->type) {
            $produt = new Produt();
            $produt->name = $request->productName;
            $produt->price = $request->productPrice;
            $produt->save();
            return redirect("/user");
        }
    }

    public function deleteProducts(Request $request)
    {
        $currentUser = Auth::user();
        $produts = Produt::all();
        foreach ($produts as $produt) {
            $id = $produt->id;

            if ($currentUser->type) {
                if($request->$id){
                    DB::table('produts')->where('id','=', $id)->delete();
                    DB::table('Basket_Temp')->where('product_id','=', $id)->delete();
                    return redirect("/user");
                }else{
                    continue;
                }
            } else {
                return redirect("/user");
            }
        }
        return redirect("/user");
    }

    public function emptyBasket(Request $request)
    {
        $currentUser = Auth::user();
        $basket_temp = Basket_Temp::get();
        foreach ($basket_temp as $basket_produt) {
            $product_id = $basket_produt->product_id;
            $id = $basket_produt->id;
            if($request->$product_id){
                DB::table('Basket_Temp')->where('id','=', $id)->delete();
                return redirect("/user");
            }else{
                continue;
            }
        }
        return redirect("/user");
    }
}
