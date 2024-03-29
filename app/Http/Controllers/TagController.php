<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::latest()->paginate(5);
    
        return view('backend.tag.index', compact('tags'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('backend.tag.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'typetag' => 'required',
        ]);
        $tags = $request->all();
        Tag::create($tags);
     
        return redirect()->route('tags.index')
                        ->with('success','Tag created successfully.');
    }
    public function show(Tag $tag)
    {
        return view('backend.tag.show',compact('tag'));
    }
    public function edit(Tag $tag)
    {
        return view('backend.tag.edit', compact('tag'));
    }
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'typetag' => 'required',
        ]);
  
        $tags = $request->all();
          
        $tag->update($tags);
    
        return redirect()->route('tags.index')
                        ->with('success', 'Tag updated successfully');
    }
    public function destroy(Tag $tag)
    {
        $tag->delete();
     
        return redirect()->route('tags.index')
                        ->with('success','Tag deleted successfully');
    }

}