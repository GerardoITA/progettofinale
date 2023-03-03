<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Service;
use App\Models\Sponsorship;
use App\Models\User;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Apartment::factory() -> count(100) -> make() -> each(function($apartment){
            // user-apartment
            $user = User::inRandomOrder()-> first();
            $apartment -> user() -> associate($user);
            $apartment -> save();

            // apartment-service
            $service = Service::inRandomOrder() -> limit(rand(5, 15)) -> get();
            $apartment -> services()-> attach($service);

            // apartment-sponsorship
            $sponsorship = Sponsorship::inRandomOrder() -> limit(rand(2,4)) ->get();
            $apartment -> sponsorships() -> attach($sponsorship, ['end_date' => new DateTime('tomorrow')]);

        });
    }
}
