<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    //funzione per utilizzare slug invece di id 
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


     public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
}
