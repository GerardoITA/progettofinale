<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Service;
use App\Models\Sponsorship;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    // show all apartments with paginations (12 elementi alla volta)
    public function index()
    {
        $apartments = Apartment::paginate(12);
        $apartments->load('sponsorships');

        return response()->json([
            "success" => true,
            "response" => $apartments,
        ]);
    }

    // show single apartment by id with relations
    public function show(Apartment $apartment)
    {
        $apartment->load('user');
        $apartment->load('images');
        $apartment->load('services');
        $apartment->load('sponsorships');

        return response()->json([
            "success" => true,
            "response" => [
                "data" => [
                    "apartments" => $apartment
                ],
            ]
        ]);
    }

    // delete apartment (and it will delete all relations)
    public function delete(Apartment $apartment)
    {
        $apartment->user()->dissociate();
        $apartment->views()->delete();
        $apartment->messages()->delete();
        $apartment->images()->delete();
        $apartment->sponsorships()->sync([]);
        $apartment->services()->sync([]);
        $apartment->delete();

        return response()->json([
            'success' => true
        ]);
    }

    // create apartment (for create form page)
    public function create()
    {
        $services = Service::all();

        return response()->json([
            "success" => true,
            "response" => [
                "data" => [
                    "services" => $services
                ],
            ]
        ]);
    }

    //  store apartment
    public function store(request $request)
    {
        $data = $request->validate([
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

        $service = Service::find($data['services_id']);

        $apartment = Apartment::make($data);

        $apartment->services()->sync($service);

        $apartment->save();

        return response()->json([
            'success' => true,
            'response' => $apartment,
            'data' => $request->all()
        ]);
    }
}
