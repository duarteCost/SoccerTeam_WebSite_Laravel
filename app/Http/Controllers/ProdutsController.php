<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Produt;
use Auth;
use App\User;

class ProdutsController extends Controller
{
    public function produts()
    {
    	$produts = DB::table('produts')->get();
        return view('produts', compact('produts'));
    }

    public function addProduct(Request $request, User $user)
    {
        $produt = new Produt();
        $produt->name = $request->productName;
        $produt->price = $request->productPrice;
        $user->produts()->save($produt);
        return redirect("/user");
    }

    public function deleteProducts(Request $request)
    {
        $currentUser = Auth::user();
        $produts = Produt::all();
        foreach ($produts as $produt) {
            $id = $produt->id;

            if ($currentUser->type) {
                if($request->$id){
                    $i=Produt::findOrFail($id)->delete();
                }else{
                    continue;
                }
            } else {
                return redirect("/user");
            }
        }
        return redirect("/user");
    }
}
