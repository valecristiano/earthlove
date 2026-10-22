<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function getRouteKeyName()
    {
    return 'slug';
    }

     //funzione per inserire image_url al json da inviare
    protected $appends = ['image_url'];

    //funzione per inviare url immagine completo
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }
        return asset('storage/' . $this->image);
    }
    
     public function products()
    {
        return $this->hasMany(Product::class);
    }
}
