<?php

use App\Models\Sponsorship;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sponsorships', function (Blueprint $table) {
            $table->    id();
            $table->    string('name',16);
            $table ->   decimal('price');
            $table ->   time('duration' );
            $table->    timestamps();
        });

        $sponsorships = [
            [
                'name' => 'Basic',
                'price' => '2.99',
                'duration' => '24:00:00',
            ],
            [
                'name' => 'Advanced',
                'price' => '5.99',
                'duration' => '72:00:00',
            ],
            [
                'name' => 'Premium',
                'price' => '9.99',
                'duration' => '144:00:00',
            ],
        ];

        // create new sponsorships from array(sponsorships)
        foreach($sponsorships as $sponsorship){
            $newSponsorship = new Sponsorship();
            
            $newSponsorship -> name = $sponsorship['name'];
            $newSponsorship -> price = $sponsorship['price'];
            $newSponsorship -> duration = $sponsorship['duration'];

            $newSponsorship -> save();
            
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsorships');
    }
};
