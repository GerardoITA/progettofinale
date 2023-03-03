<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apartment>
 */
class ApartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake() ->  name() , 
            'rooms' => fake() ->  numberBetween(1, 8), 
            'beds' => fake() ->   numberBetween(1, 6), 
            'bathrooms' => fake() ->   numberBetween(1, 3), 
            'square_meters' => fake() ->  numberBetween(20, 300), 
            'address' => fake() ->   address(), 
            'latitude' => fake() ->   latitude(-90, 90), 
            'longitude' => fake() ->   longitude(-180, 180), 
            // 'main_image' => fake() ->  imageUrl(360, 360, 'animals', true, 'dogs', true), 
            'visible' => fake() ->   boolean(100), 
            'price' => fake() ->   numberBetween(10, 1500), 
            'description' => fake() ->  paragraph(3), 
        ];
    }
}
