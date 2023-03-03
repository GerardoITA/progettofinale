<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Apartment::factory() -> count(100) -> make() -> each(function($a){
            // user-apartment
            $user = User::inRandomOrder()-> first();
            $a -> user() -> associate($user);
            $a -> save();
        });
    }
}
