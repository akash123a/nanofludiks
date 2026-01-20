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


           // ✅ Total price of wishlist
    $totalPrice = $wishlists->sum(function ($item) {
        return $item->product->price;
    });

    return view('user.wishlist', compact('wishlists','totalPrice'));
}

public function buyAll()
{
    $wishlists = Wishlist::with('product')
        ->where('user_id', auth()->id())
        ->get();

    if ($wishlists->isEmpty()) {
        return back()->with('error', 'Wishlist is empty');
    }

    foreach ($wishlists as $item) {
        auth()->user()->orders()->create([
            'product_id' => $item->product->id,
            'price' => $item->product->price,
        ]);
    }

    // Clear wishlist after purchase
    Wishlist::where('user_id', auth()->id())->delete();

    return redirect()
        ->route('wishlist.index')
        ->with('success', 'All wishlist items purchased successfully!');
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
