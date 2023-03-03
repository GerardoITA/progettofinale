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
}
