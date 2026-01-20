<?php

namespace App\Http\Controllers\Admin;

use App\Models\HomeSection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeSectionController extends Controller
{
      public function index()
    {
        $home = HomeSection::first();
        
        return view('admin.homesection.index', compact('home'));
    }

    public function edit()
    {
        $home = HomeSection::first();
        return view('admin.homesection.edit', compact('home'));
    }

    public function delete($id)
{
    $home = HomeSection::findOrFail($id);
    return view('admin.homesection.delete', compact('home'));
}

public function destroy($id)
{
    $home = HomeSection::findOrFail($id);

    // Delete image from folder
    if ($home->image && file_exists(public_path($home->image))) {
        unlink(public_path($home->image));
    }

    $home->delete();

    return redirect()->route('home.index')->with('success', 'Home Section deleted successfully!');
}


   public function update(Request $request) 
{
    // ✅ VALIDATION (PUT THIS HERE)
    $request->validate([
        'title' => 'required|string|max:255',
        'subtitle' => 'nullable|string|max:255',
        'description1' => 'nullable|string',
        'description2' => 'nullable|string',
        'description3' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    // Fetch existing record
    $home = HomeSection::first();

    // Update fields
    $home->title = $request->title;
    $home->subtitle = $request->subtitle;
    $home->description1 = $request->description1;
    $home->description2 = $request->description2;
    $home->description3 = $request->description3;

    // Image upload
    if ($request->hasFile('image')) {

        if ($home->image && file_exists(public_path($home->image))) {
            unlink(public_path($home->image));
        }

        $filename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/home'), $filename);

        $home->image = 'uploads/home/' . $filename;
    }

    $home->save();

    return redirect()
        ->route('home.index')
        ->with('success', 'Home Section Updated!');
}

}