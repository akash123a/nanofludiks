<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog; 
use App\Models\Slider; 
use App\Models\HomeSection;
use App\Models\Service;
use App\Models\Faq;
use App\Models\CareerApplication;
use App\Models\Product;

class DashboardController extends Controller
{
    //

    public function index()
{
      $blogs = Blog::all();
      $sliders = Slider::all();
           $home = HomeSection::first(); 
           $services = Service::all();
           $faq  = Faq::all();      
        $applications = CareerApplication::all();
        $products = Product::all();
    return view('admin.dashboard', compact('blogs', 'sliders', 'home', 'services', 'faq','applications','products'));
}
}
