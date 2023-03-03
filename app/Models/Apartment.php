<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'rooms',    
        'beds',	
        'bathrooms',	
        'square_meters',	
        'address',	
        'latitude',
        'longitude',	
        'main_image',	
        'visible',	
        'price',	
        'description',        
        	
    ];
    
}
