<?php

use App\Models\Service;
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
        Schema::create('services', function (Blueprint $table) {
            $table->    id();
            $table->    string('name', 32);
            $table->    timestamps();
        });

        $services= [
            [
                'name' => 'Wi-Fi'
            ],
            [
                'name' => 'Parcheggio gratuito'
            ],
            [
                'name' => 'Piscina'
            ],
            [
                'name' => 'Giardino'
            ],
            [
                'name' => 'Terrazza'
            ],
            [
                'name' => 'Colazione'
            ],
            [
                'name' => 'Servizi spa'
            ],
            [
                'name' => 'Solarium'
            ],
            [
                'name' => 'Palestra'
            ],
            [
                'name' => 'Caminetto'
            ],
            [
                'name' => 'Servizi di pulizia'
            ],
            [
                'name' => 'Riscaldamento'
            ],
            [
                'name' => 'Aria condizionata'
            ],
            [
                'name' => 'Cassaforte'
            ],
            [
                'name' => 'Cucina'
            ],
            [
                'name' => 'Divano letto'
            ],
            [
                'name' => 'Tv'
            ],
            [
                'name' => 'Vasca idromassaggio'
            ],
            [
                'name' => 'Asciugacapelli'
            ],
            [
                'name' => 'Frigorifero'
            ],
            [
                'name' => 'Lavatrice'
            ],
            [
                'name' => 'Asciugatrice'
            ],
        ];

        // create new service from array(services)
        foreach($services as $service){
            $newService = new Service();

            $newService -> name = $service['name'];

            $newService -> save();
        };
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
