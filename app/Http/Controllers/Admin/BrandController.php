<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view ('brands.index' , compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $data = $request->validate([
        'name' => 'required|string|max:255|unique:brands,name',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
    ]);

        $newBrand = new Brand();

        $newBrand->name = $data['name'];
        $newBrand->slug = Str::slug($data['name']);
        $newBrand->description = $data['description'];
       
        if(array_key_exists('image', $data)){
            $imageUrl = Storage::putFile('brandsImg', $data['image'], 'public');
            $newBrand->image = $imageUrl;
        }  
        
        $newBrand->save();

        return redirect()->route('admin.brands.show', $newBrand )->with('success', 'Brand creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view ('brands.show' , compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view ('brands.edit' , compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        
        $data = $request->validate([
        'name' => 'required|string|max:255|unique:brands,name,' . $brand->id,
        'description' => 'required|string',
        'image' => 'nullable|image|max:2048',
    ]);

        $brand->name = $data['name'];
        $brand->slug = Str::slug($data['name']);
        $brand->description = $data['description'];


        if(array_key_exists('image', $data)){
            if ($brand->image && Storage::exists($brand->image)) {
                Storage::delete($brand->image);
            }

            $imageUrl = Storage::putFile('brandsImg', $data['image'], 'public');
            $brand->image = $imageUrl;
        }
       
        $brand->save();

        return redirect()->route('admin.brands.show', $brand )->with('success', 'Brand modificato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('admin.brands.index')->with('success', 'Brand eliminato con successo!');
    }
}
