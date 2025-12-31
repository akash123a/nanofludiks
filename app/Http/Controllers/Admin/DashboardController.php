<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog; 
use App\Models\Slider; 
use App\Models\HomeSection;
use App\Models\Service;

class DashboardController extends Controller
{
    //

    public function index()
{
      $blogs = Blog::all();
      $sliders = Slider::all();
           $home = HomeSection::first(); 
           $services = Service::all();

    return view('admin.dashboard', compact('blogs', 'sliders', 'home', 'services'));
}
}
