<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(5);
    
        return view('backend.category.index', compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('backend.category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'typecategory' => 'required',
        ]);
  
        $categories = $request->all();    
        Category::create($categories);
     
        return redirect()->route('categories.index')
                        ->with('success','Category created successfully.');
    }
    public function show(Category $category)
    {
        return view('backend.category.show',compact('category'));
    }
    public function edit(Category $category)
    {
        return view('backend.category.edit', compact('category'));
    }
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'typecategory' => 'required',
        ]);
  
        $categories = $request->all();
          
        $category->update($categories);
    
        return redirect()->route('categories.index')
                        ->with('success', 'Category updated successfully');
    }
    public function destroy(Category $category)
    {
        $category->delete();
     
        return redirect()->route('categories.index')
                        ->with('success','Category deleted successfully');
    }

}