<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Album;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('photo_app.portofoliu',['categories' => $categories]);

    }

    public function createAlbum()
    {
        $categories = Category::all();
        return view('photo_app.admin.album.create_album',['categories' => $categories]);

    }

    public function test()
    {
        $categories = Category::all();
        return view('photo_app.admin.category.category',['categories' => $categories]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $image=$request->file('image')->store('public/categories');

        Category::create([
            'name'=> $request->name,
            'image'=>$image,
        ]);

        return to_route('categories.test')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $categories)
    {
        return view('categories.show', compact('categories/'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('photo_app.admin.category.category_edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $image = $category->image;
        if ($request->hasFile('image')) {
            Storage::delete($category->image);
            $image = $request->file('image')->store('public/categories');
        }

        $category->update([
            'name' => $request->name,
            'image' => $image
        ]);
        return to_route('categories.test')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Storage::delete($category->image);
        $category->delete();

        return to_route('categories.test')->with('danger', 'Category deleted successfully.');
    }

    public function albumes($id){
        $category = Category::find($id);
        if(!$category) abort(404);
        $albumes= $category->albumes;
        return view('photo_app.admin.category.cat-albumes',compact('category','albumes'));
    }
}
