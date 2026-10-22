<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view ('products.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $tags = Tag::all();

        return view ('products.create', compact('brands', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validazione dei dati del form con validate()
        $data = $request->validate([
        'name' => 'required|string|max:255|unique:products,name',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'brand_id' => 'required|exists:brands,id',
        'category_id' => 'required|exists:categories,id',
        'tags' => 'nullable|array',
        'tags.*' => 'exists:tags,id',
        'image' => 'nullable|image|max:2048',
    ]);

        $newProduct = New Product();

        $newProduct->name = $data['name'];
        $newProduct->slug = Str::slug($data['name']);
        $newProduct->description = $data['description'];
        $newProduct->price = $data['price'];
        $newProduct->stock = $data['stock'];
        $newProduct->brand_id = $data['brand_id'];
        $newProduct->category_id = $data['category_id'];

        if(array_key_exists('image', $data)){
            $imageUrl = Storage::putFile('productsImg', $data['image'], 'public');
            $newProduct->image = $imageUrl;
        }


        $newProduct->save();

        if($request->has('tags')){
            $newProduct->tags()->attach($data['tags']);
        }

        return redirect()->route('admin.products.show', $newProduct )->with('success', 'Prodotto creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $tags = Tag::all();

        return view('products.edit', compact('product', 'brands', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
        'name' => 'required|string|max:255|unique:products,name,'. $product->id,
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'brand_id' => 'required|exists:brands,id',
        'category_id' => 'required|exists:categories,id',
        'tags' => 'nullable|array',
        'tags.*' => 'exists:tags,id',
        'image' => 'nullable|image|max:2048',
    ]);

        $product->name = $data['name'];
        $product->slug = Str::slug($data['name']);
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->stock = $data['stock'];
        $product->brand_id = $data['brand_id'];
        $product->category_id = $data['category_id'];

        if(array_key_exists('image', $data)){
            if ($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }

            $imageUrl = Storage::putFile('productsImg', $data['image'], 'public');
            $product->image = $imageUrl;
        }

        $product->save();

        if($request->has('tags')){
            $product->tags()->sync($data['tags']);
        } else {
            $product->tags()->detach();
        }

        return redirect()->route('admin.products.show', $product )->with('success', 'Prodotto aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if($product->image) {
            Storage::delete($product->image);
        }
        $product->tags()->detach();
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Prodotto eliminato con successo!');
    }
}
