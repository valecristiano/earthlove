<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $tags = Tag::All();
        return view ('tags.index' , compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
        'name' => 'required|string|max:255|unique:tags,name',
        'description' => 'required|string',
    ]);

        $newTag = New Tag();

        $newTag->name = $data['name'];
        $newTag->slug = Str::slug($data['name']);
        $newTag->description = $data['description'];
       

        $newTag->save();

        return redirect()->route('admin.tags.show', $newTag )->with('success', 'Tag creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view ('tags.show' , compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view ('tags.edit' , compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
        'name' => 'required|string|max:255|unique:tags,name,'. $tag->id,
        'description' => 'nullable|string',
    ]);

        $tag->name = $data['name'];
        $tag->slug = Str::slug($data['name']);
        $tag->description = $data['description'];

        $tag->update();

        return redirect()->route('admin.tags.show', $tag )->with('success', 'Tag modificato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index')->with('success', 'Tag eliminato con successo!');
    }
}
