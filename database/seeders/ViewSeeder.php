<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\View;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        View::factory() -> count(10000) -> make() -> each(function($a){

            $apartment = Apartment::inRandomOrder()-> first();
            $a -> apartment() -> associate($apartment);
            $a -> save();
        });
    }
}
