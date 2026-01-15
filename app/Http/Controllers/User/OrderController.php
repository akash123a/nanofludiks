<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Product $product)
    {
        Order::create([
            'user_id'    => auth()->id(),            
            'product_id' => $product->id,
            'product_name' => $product->name,
            'quantity'   => 1
        ]);

        return redirect()->back()->with('success', 'Product purchased successfully!');
    }
}
