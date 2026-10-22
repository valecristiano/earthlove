<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index () {

        $brands = Brand::with('products')->get();

        return response()->json(
            [
                'success'=>true,
                
                'results'=> $brands
            ]
            );
    }

    public function show (Brand $brand) {

        $brand->load('products.category', 'products.tags' );

        return response()->json(
            [
                'success'=>true,
                
                'results'=> $brand
            ]
            );
    }
}
