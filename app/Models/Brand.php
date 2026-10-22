<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    
    public function getRouteKeyName()
    {
    return 'slug';
    }

    //proprietà del Model Eloquent, per inserire image_url al json da inviare
    protected $appends = ['image_url'];

    //Accessor (metodo di gestione attributi) per inviare url immagine completo
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }
        //asset serve per generare url completi
        return asset('storage/' . $this->image);
    }
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
