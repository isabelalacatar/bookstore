<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use Symfony\Component\Console\Input\Input;

class CartController extends Controller
{
    public function index()
    {
        $orders= Order::latest()->paginate(5);
    
        return view('backend.order.index', compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}