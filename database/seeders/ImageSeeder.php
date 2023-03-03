<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Image::factory() -> count(100) -> make() -> each(function($a){

            $apartment = Apartment::inRandomOrder()-> first();
            $a -> apartment() -> associate($apartment);
            $a -> save();
        });
    }
}
