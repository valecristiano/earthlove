<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index () {

        $categories = Category::with('products')->get();

        return response()->json(
            [
                'success'=>true,
                
                'results'=> $categories
            ]
            );
    }

    public function show (Category $category) {

        $category->load('products.brand', 'products.tags');

        return response()->json(
            [
                'success'=>true,
                
                'results'=> $category
            ]
            );
    }
}
