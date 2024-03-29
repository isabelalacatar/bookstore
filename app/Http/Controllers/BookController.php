<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(5);
    
        return view('backend.book.index', compact('books'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('backend.book.create');
    }
    public function edit(Book $book)
    {
        return view('backend.book.edit', compact('book'));
    }
    public function bookList()
    {
        $books = Book::all();

        return view('frontend.books', compact('books'));
    }

    public function show(Book $book)
    {
        return view('backend.book.show',compact('book'));
    }
    
    public function destroy(Book $book)
    {
        $book->delete();
     
        return redirect()->route('books.index')
                        ->with('success','Book deleted successfully');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'category' => 'required',
            'tags' => 'required',
            'coverimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
        ]);
  
        $books = $request->all();
  
        if ($coverimage = $request->file('coverimage')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $coverimage->getClientOriginalExtension();
            $coverimage->move($destinationPath, $profileImage);
            $books['coverimage'] = "$profileImage";
        }
    
        Book::create($books);
     
        return redirect()->route('books.index')
                        ->with('success','Book created successfully.');
    }
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'category' => 'required',
            'tags' => 'required',
            'price' => 'required',
        ]);
  
        $books = $request->all();
  
        if ($coverimage = $request->file('coverimage')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $coverimage->getClientOriginalExtension();
            $coverimage->move($destinationPath, $profileImage);
            $books['coverimage'] = "$profileImage";
        }else{
            unset($books['coverimage']);
        }
          
        $book->update($books);
    
        return redirect()->route('books.index')
                        ->with('success','Book updated successfully');
    }

}