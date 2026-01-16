<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\Product;

class WishlistController extends Controller
{
    public function store(Product $product)
    {
        Wishlist::firstOrCreate([
            'user_id'   => auth()->id(),
            'product_id'=> $product->id,
        ], [
            'product_name' => $product->name
        ]);

        return back()->with('success', 'Added to wishlist ❤️');
    }
}
