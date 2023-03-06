<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function showImages($apartment_id){
        $image = Image::where('apartment_id', $apartment_id)->get();
        // var_dump($apartment_id);
        return response() -> json([
            'success' => TRUE,
            'images' => $image 
        ]);
    }
    public function deleteImage(Image $image){
        $image -> delete();
        return response() -> json([
            'success' => TRUE,
        ]);
    }
}
