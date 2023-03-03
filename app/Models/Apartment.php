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
    
    // USER
    public function user(){
        return $this -> belongsTo(User::class);
    }

    // VIEW
    public function views(){
        return $this -> hasMany(View::class);
    }

    // MESSAGE
    public function messages(){
        return $this -> hasMany(Message::class);
    }
}
