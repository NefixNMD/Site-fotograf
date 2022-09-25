<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategoryStoreRequest;
use App\Models\Cart;
use App\Models\productCategories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductCategoriesController extends Controller
{
    public function index()
    {
        $categories = productCategories::all();
        return view('photo_app.admin.category-product.category',['categories' => $categories]);
    }
    public function createProduct()
    {
        $categories = productCategories::all();
        return view('photo_app.admin.product.create_product',['categories' => $categories]);

    }

    public function shopCat()
    {
        $categories = productCategories::all();
        $products = Products::all();
        $carts = Cart::where('user_id','=',request()->user()->id)->take(PHP_INT_MAX)->get();
        $cart_products = Products::all();
        if($carts){
            return view('photo_app.servicii',compact('products','categories','carts','cart_products'));
        }
        else{
            return view('photo_app.servicii',compact('products','categories','cart_products'));
        }
        

    }
       /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show(Request $request, $id)
    {
        $prt=[];
        $categories = productCategories::all();
        $cat=productCategories::find($id);
        if(!$cat) abort(404);
        $products = Products::where('product_categories_id','=',$cat->id)->take(PHP_INT_MAX)->get();
        
        if(!$products) abort(404);
      // foreach ($products as $product) {
       //   if($product->product_categories_id == $id){
       //       $prt = $product;
       //     }
       // }
      //  $products=$prt;
     // echo($products);
     $carts = Cart::where('user_id','=',request()->user()->id)->take(PHP_INT_MAX)->get();
     $cart_products = Products::all();
     return view('photo_app.servicii',compact('products','categories','carts','cart_products'));

    }
    public function store(Request $request)
    {

        productCategories::create([
            'name'=> $request->name,
        ]);

        return to_route('productCategories')->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function edit(productCategories $productCategory)
   {
       return view('photo_app.admin.category-product.category_edit', compact('productCategory'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, productCategories $productCategory)
   {
       $request->validate([
           'name' => 'required',
       ]);

       $productCategory->update([
           'name' => $request->name,
       ]);
       return to_route('productCategories')->with('success', 'Category updated successfully.');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy(productCategories $productCategory)
   {
       $productCategory->delete();

       return Redirect::back();
   }
}
