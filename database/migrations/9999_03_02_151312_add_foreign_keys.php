<?php

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

        //VIEWS FOREIGN
        Schema::table('views', function (Blueprint $table) {
            $table -> foreignId('apartment_id')
                   -> constrained(); 
        });

        //MESSAGES FOREIGN
        Schema::table('messages', function (Blueprint $table) {
            $table -> foreignId('apartment_id')
            -> constrained();
        });

        //IMAGES FOREIGN
        Schema::table('images', function (Blueprint $table) {
            $table -> foreignId('apartment_id')
            -> constrained();
        });
          
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //VIEWS FOREIGN
        Schema::table('views', function (Blueprint $table) {
            $table -> dropForeign('views_apartment_id_foreign'); 
        });

        //MESSAGES FOREIGN
        Schema::table('messages', function (Blueprint $table) {
            $table -> dropForeign('messages_apartment_id_foreign'); 

        });

        //IMAGES FOREIGN
        Schema::table('images', function (Blueprint $table) {
            $table -> dropForeign('images_apartment_id_foreign'); 

        });        
    }
};
