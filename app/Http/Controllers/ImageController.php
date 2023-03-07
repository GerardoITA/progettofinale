<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    // SHOW
    public function showImages($apartment_id){
        $image = Image::where('apartment_id', $apartment_id)->get();
        
        return response() -> json([
            'success' => TRUE,
            'images' => $image 
        ]);
    }

    // DELETE
    public function deleteImage(Image $image){
        $image -> delete();
        return response() -> json([
            'success' => TRUE,
        ]);
    }

    // STORE
    public function storeImage(Request $request){

        $data = $request -> validate([
            'title' => 'required|string|max:32',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,gif,jpeg,svg|max:2048',
            'apartment_id' => 'required',
        ]);

        // save image in the Storage
        $image_path= Storage::put('uploads', $data['image']);
        $image_path = $request->file('image')->store('image', 'public');
        $data['image']=$image_path;
        
        // associate image to Apartment
        $apartment= Apartment::find($data[ 'apartment_id']);
        $image = Image::make($data);
        $image -> apartment() ->associate($apartment);

        // save element
        $image  -> save();
        

        return response() ->json([
            'success' => true,
            'response'=>$image,
        ]);
    }
}
