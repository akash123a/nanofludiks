<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;



class DashboardController extends Controller
{
    //

       public function index()
    {
        // 1️⃣ Get products from database

        
 
        $products = Product::all();

        // 2️⃣ Send products to dashboard view
        return view('user.dashboard', compact('products'));
    }
}
