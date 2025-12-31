<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
{
    return view('admin.auth.login');
}

public function loginPost(Request $request)
{
    $admin = Admin::where('email', $request->email)->first();

    if (!$admin || !Hash::check($request->password, $admin->password)) {
        return back()->with('error', 'Invalid credentials');
    }

    session(['admin_id' => $admin->id]);
    return redirect('/admin/dashboard');
}


public function createAdmin(Request $request)
{
    // Validate input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:admins,email',
        'password' => 'required|min:6|confirmed',
    ]);

    // Store in database
    Admin::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect('/admin/login')->with('success', 'Admin created successfully!');
}

public function logout()
{
    session()->forget('admin_id');
    return redirect('/admin/login');
}

}
