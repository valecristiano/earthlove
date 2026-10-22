<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public function getRouteKeyName()
    {
    return 'slug';
    }
    
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
