<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;
use Symfony\Component\Console\Input\Input;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        return view('frontend.cart', compact('cartItems'));
    }
    public function list(Book $list)
    {
        return view('frontend.detailsbook', compact('list'));
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'category' => $request->category,
            'tags' => $request->tags,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'coverimage' => $request->coverimage,
            )
        ]);

        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
    public function searchcategory(Request $request)
    {

        $books = Book::orderBy('id', 'asc')
            ->with('category')
            ->when($request->category_id, function ($query) use ($request) {
                $query->whereIn('id', $request->category_id);
            })
            ->paginate(5);

        return view('frontend.books', compact('books'));
    }
    public function searchtag(Request $request)
    {

        $books = Book::orderBy('id', 'asc')
            ->with('tag')
            ->when($request->tag_id, function ($query) use ($request) {
                $query->whereIn('id', $request->tag_id);
            })
            ->paginate(5);

        return view('frontend.books', compact('books'));
    }

    public function edit($id)
    {
        $books = Book::get();
        return view('frontend.cart')->with(["books" => $books]);
    }
}
