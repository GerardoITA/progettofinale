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
        Schema::create('apartments', function (Blueprint $table) {
            $table->    id();
            $table->    string('title', 128);
            $table->    smallInteger('rooms') -> unsigned();
            $table->    smallInteger('beds') -> unsigned();
            $table->    smallInteger('bathrooms') -> unsigned();
            $table->    integer('square_meters') -> unsigned();
            $table->    string('address', 128);    
            $table->    string('latitude', 16);
            $table->    string('longitude', 16);
            $table->    string('main_image') ->default('no-img.jpg');
            $table->    boolean('visible') -> default(true);
            $table->    integer('price') -> unsigned() -> default(60);
            $table->    text('description') -> nullable();
            $table->    timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
