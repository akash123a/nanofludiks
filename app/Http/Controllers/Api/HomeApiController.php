<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HomeSection;

class HomeApiController extends Controller
{
    public function index()
    {
        $homesection = HomeSection::first(); // single record

        return response()->json([
            'status' => true,
            'data' => $homesection
        ]);
    }
}
