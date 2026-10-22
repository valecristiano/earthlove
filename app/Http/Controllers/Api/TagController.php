<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index () {

        $tags = Tag::with('products')->get();

        return response()->json(
            [
                'success'=>true,
                
                'results'=> $tags
            ]
            );
    }

    public function show (Tag $tag) {

        $tag->load('products.brand', 'products.category' );

        return response()->json(
            [
                'success'=>true,
                
                'results'=> $tag
            ]
            );
    }
}
