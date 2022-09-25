<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use App\Models\AlbumImage;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function index(){
        $albumes = Album::all();
        $categories = Category::all();

        return view('photo_app.admin.album.album',compact('albumes','categories'));
    }
    

    public function store(Request $req){
        $img=$req->file('cover_image');
        $imgName=$req['title'].'-cover-'.time().rand(1,1000).'.'.$img->extension();
        $img->move(public_path('album_images/'.$req['title']),$imgName); 
        $data = $req->validate([
            'title'=>'required',
        ]);
        $new_album = Album::create([
            'title'=>$req->title,
            'cover_image'=>$imgName,
            'category_id'=>$req->selector,
        ]);
        if($req->has('images')){

            foreach($req->file('images') as $image){
               $imageName=$data['title'].'-image-'.rand(1,1000).'.'.$image->extension();
               $image->move(public_path('album_images/'.$req['title']),$imageName); 
               albumImage::create([
                  'album_id'=>$new_album->id,
                   'image'=>$imageName
               ]);
            }
        }
        return response()->json(['success'=>'Successfully uploaded.']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        $album_path = public_path('album_images/'.$album['title'].'/');
        echo($album_path);
        File::deleteDirectory(public_path('album_images/'.$album['title'].'/'));
        $images= AlbumImage::all();
        foreach($images as $image){
            if($image->album_id == $album->id){
                $image->delete();
            }
        }
        
        
        $album->delete();

        return to_route('albumes.categories')->with('danger', 'Category deleted successfully.');
    }

    public function images($id){
        $album = Album::find($id);
        if(!$album) abort(404);
        $images = $album->images;
        return view('photo_app.admin.album.album-images',compact('album','images'));
    }


}
