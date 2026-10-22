<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $categories = Category::All();
        return view ('categories.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view ('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
        'name' => 'required|string|max:255|unique:categories,name',
        'description' => 'required|string',
        'image' => 'nullable|image|max:2048',
    ]);

        $newCategory = New Category();

        $newCategory->name = $data['name'];
        $newCategory->slug = Str::slug($data['name']);
        $newCategory->description = $data['description'] ?? null;

        if(array_key_exists('image', $data)){
            $imageUrl = Storage::putFile('categoriesImg', $data['image'], 'public');
            $newCategory->image = $imageUrl;
        }
       
        $newCategory->save();

        return redirect()->route('admin.categories.show', $newCategory )->with('success', 'Categoria creata con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
         $data = $request->validate([
        'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
    ]);

        $category->name = $data['name'];
        $category->slug = Str::slug($data['name']);
        $category->description = $data['description'];

        if(array_key_exists('image', $data)){
            if ($category->image && Storage::exists($category->image)) {
                Storage::delete($category->image);
            }

            $imageUrl = Storage::putFile('categoriesImg', $data['image'], 'public');
            $category->image = $imageUrl;
        }
       
        $category->save();

        return redirect()->route('admin.categories.show', $category )->with('success', 'Categoria modificata con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
        ->route('admin.categories.index')
        ->with('success', 'Categoria eliminata con successo!');
    }
}
