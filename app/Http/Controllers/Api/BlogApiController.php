<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\Blog;

class BlogApiController extends Controller
{
    //
      public function index()
    {
        $blogs = Blog::all();

        return response()->json([
            'status' => true,
            'data' => $blogs
        ]);
    }
}
