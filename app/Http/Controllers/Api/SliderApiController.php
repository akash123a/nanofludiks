<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slider;

class SliderApiController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();

        return response()->json([
            'status' => true,
            'data' => $sliders
        ]);
    }
}
