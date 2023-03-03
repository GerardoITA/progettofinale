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
            'Wi-Fi',            
            'Parcheggio gratuito',            
            'Piscina',            
            'Giardino',            
            'Terrazza',            
            'Colazione',            
            'Servizi spa',            
            'Solarium',            
            'Palestra',            
            'Caminetto',            
            'Servizi di pulizia',            
            'Riscaldamento',            
            'Aria condizionata',            
            'Cassaforte',            
            'Cucina',            
            'Divano letto',            
            'Tv',            
            'Vasca idromassaggio',            
            'Asciugacapelli',            
            'Frigorifero',            
            'Lavatrice',            
            'Asciugatrice',
        ];

        // create new service from array(services)
        foreach($services as $service){
            $newService = new Service();

            $newService -> name = $service;

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
