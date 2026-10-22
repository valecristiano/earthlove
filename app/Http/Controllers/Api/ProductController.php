<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index () {

        $products = Product::with('brand','category','tags')->get();

        return response()->json(
            [
                'success'=>true,
                
                'results'=> $products
            ]
            );
    }

    public function show (Product $product) {

        $product->load('brand','category','tags');

        return response()->json(
            [
                'success'=>true,
                
                'results'=> $product
            ]
            );
    }
}
