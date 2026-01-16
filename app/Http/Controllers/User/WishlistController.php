<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\Product;

class WishlistController extends Controller
{

public function index()
{
    $wishlists = Wishlist::with('product')
        ->where('user_id', auth()->id())
        ->get();

    return view('user.wishlist', compact('wishlists'));
}



  public function store(Product $product)
{
    $exists = Wishlist::where('user_id', auth()->id())
        ->where('product_id', $product->id)
        ->exists();

    if ($exists) {
        return back()->with('info', 'Already in wishlist ❤️');
    }

    Wishlist::create([
        'user_id' => auth()->id(),
        'product_id' => $product->id,
        'product_name' => $product->name,
    ]);

    return back()->with('success', 'Added to wishlist ❤️');
}


public function destroy(Product $product)
{
    Wishlist::where('user_id', auth()->id())
        ->where('product_id', $product->id)
        ->delete();

    return back()->with('success', 'Removed from wishlist 🗑');
}


}
