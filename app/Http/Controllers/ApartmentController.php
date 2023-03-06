<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Service;
use App\Models\Sponsorship;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index()
    {
        $apartments = Apartment::all();

        return response()->json([
            "success" => true,
            "response" => [
                "apartments" => $apartments,
            ]
        ]);
    }

    // public function show(Apartment $apartment){
    //     $apartments = Apartment::all();

    //     return response()->json([
    //         "success" => true,
    //         "response" => [
    //             "apartments" => $apartments,
    //         ]
    //     ]);
    // }

    // controller create appartamento 
    public function store(request $request){
        $data = $request -> validate([
            'title' => 'required|string|min:0|max:128',
            'rooms' => 'required|integer|min:0',
            'beds' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'square_meters' => 'required|integer|min:0',
            'address' => 'required|string|min:0|max:128',
            'latitude' => 'required|string|min:0|max:16',
            'longitude' => 'required|string|min:0|max:16',
            'main_image' => 'required|string|min:0|max:128',
            'visible' => 'required|boolean',
            'price' => 'required|integer|min:0',
            'description' => 'string',
            'services_id' => 'nullable|array',
        ]);

        $service = Service :: find($data ['services_id']);

        $apartment = Apartment :: make($data);

        $apartment -> services() -> sync($service);

        $apartment -> save();

        return response() -> json([
            'success' => true,
            'response' => $apartment,
            'data' => $request -> all()
        ]);
    }
}
