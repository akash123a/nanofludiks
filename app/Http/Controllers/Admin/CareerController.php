<?php

namespace App\Http\Controllers\Admin;


use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CareerApplication;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
{
    /**
     * ===============================
     * 1️⃣ SHOW ALL APPLICATIONS (ADMIN)
     * ===============================
     */
    public function index()
    {
        $applications = CareerApplication:: latest()->get();
        
        return view('admin.career.index', compact('applications' ));
    }




    /**
     * ===============================
     * 2️⃣ DOWNLOAD PDF
     * ===============================
     */
 


    /**
     * ===============================
     * 2️⃣ DOWNLOAD CSV
     * ===============================
     */
    

    /**
     * ===============================
     * 3️⃣ STORE APPLICATION (FRONTEND)
     * ===============================
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name'  => 'required|string|max:255',
            'email'      => 'required|email',
            'phone'      => 'required|string|max:20',
            'position'   => 'required|string',
            'motivation' => 'required|string',
            'resume'     => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Upload Resume
        $resumeName = time() . '_' . $request->resume->getClientOriginalName();
        $request->resume->move(public_path('uploads/resumes'), $resumeName);

        CareerApplication::create([
            'full_name'  => $request->full_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'position'   => $request->position,
            'experience' => $request->experience,
            'motivation' => $request->motivation,
            'resume'     => $resumeName,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Application submitted successfully!'
        ]);
    }
}
