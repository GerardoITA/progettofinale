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
        $apartments = Apartment::paginate(12);
        $apartments->load('sponsorships');

        return response()->json([
            "success" => true,
            "response" => [
                $apartments,
            ]
        ]);
    }


    public function show(Apartment $apartment)
    {
        $apartment->load('user');
        $apartment->load('images');
        $apartment->load('services');
        $apartment->load('sponsorships');

        return response()->json([
            "success" => true,
            "response" => [
                "data" => $apartment,
            ]
        ]);
    }

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

    // public function edit(Apartment $apartment)
}
