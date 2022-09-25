<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\productCategories;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::all();
        return view('photo_app.servicii');

    }
    
    /**
     * Store a newly created resource in storage.
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req){
        $categories= productCategories::all();
        Cart::create([
            'user_id'=>request()->user()->id,
            'products_id'=>$req->product_id,
        ]);
        $categories = productCategories::all();
        $products = Products::all();
        $carts = Cart::where('user_id','=',request()->user()->id)->take(PHP_INT_MAX)->get();
        $cart_products = Products::all();
        //return Redirect::back(); 
        return response()->json(['success'=>'Successfully uploaded.']); 
    }

       /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id){
   
        $company = Cart::find($id);
        $total_value = 0.00;
        $company->delete();  
  }


         /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show(){
        $total_value = 0.00;
        $products = Products::all();
        $carts = Cart::where('user_id','=',request()->user()->id)->take(PHP_INT_MAX)->get();
        if(!empty($carts)){
            foreach ($products as $product) {
                foreach ($carts as $cart) {
                    if ($product->id == $cart->products_id) {
                        $total_value = $total_value + $product->price;
                        $data[]=(['<tbody class="col-txt"><tr><td><img src="'.Storage::url($product->image).'"class="img-fluid img-thumbnail" alt="Sheep" style="padding: 0rem;background-color:transparent;border:0px;max-width: 70%;"></td><td>'. $product->name .'</td><td>'. $product->price .' Lei</td><td><a href="'. route('carts.destroy',$cart->id) .'" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" id="deleteCompany" data-id="'. $cart->id .'"><i style="    font-family: cursive;font-weight: 500;font-style: normal;">X</i></a></td></tr></tbody>']);
                    }
                }
            }
            return response()->json(['data'=>$data,'total_price'=>$total_value]);
        }
        else{
            return response()->json(['empty'=>'Cart is empty']);
        }
    }
    
    
    }
