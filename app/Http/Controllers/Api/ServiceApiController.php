<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceApiController extends Controller
{
    public function index()
    {
        $service = Service::all();
        return response()->json([
            'status' => true,
            'data' => $service
        ]);
    }
}







