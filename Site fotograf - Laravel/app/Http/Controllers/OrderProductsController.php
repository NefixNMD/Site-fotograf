<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderProductsController extends Controller
{
             /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show(){
        $products = Products::all();
        $carts = Cart::where('user_id','=',request()->user()->id)->take(PHP_INT_MAX)->get();
        return view('photo_app/checkout',compact(['products', 'carts']));
    }
}
