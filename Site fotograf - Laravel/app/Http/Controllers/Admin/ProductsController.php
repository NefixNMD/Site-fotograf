<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\productCategories;
use App\Models\Products;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        $categories = productCategories::all();
        return view('photo_app.admin.product.product',compact('products','categories'));

    }

    public function store(Request $request)
    {
        $image=$request->file('image')->store('public/products');

        Products::create([
            'name'=> $request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'product_categories_id'=>$request->selector,
            'image'=>$image,
        ]);

        return to_route('product.categories')->with('success', 'Category created successfully.');
    }

    public function edit(Products $product)
    {
        $categories = productCategories::all();
        return view('photo_app.admin.product.product_edit', compact('product','categories'));
    }

    public function update(Request $request, Products $product)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $image = $product->image;
        if ($request->hasFile('image')) {
            Storage::delete($product->image);
            $image = $request->file('image')->store('public/categories');
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price'=>$request->price,
            'product_categories_id'=>$request->selector,
            'image' => $image
        ]);
        return to_route('products.categories')->with('success', 'Category created successfully.');
    }

    public function destroy(Products $product)
    {
        Storage::delete($product->image);
        $product->delete();

        return to_route('products.categories')->with('danger', 'Category deleted successfully.');
    }

    public function show($id)
    {
        $product = Products::find($id);
        $categories = productCategories::all();
        return view('photo_app.product',compact('product','categories'));
    }
}
