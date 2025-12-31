<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    //
        public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/slider/'), $imageName);

        Slider::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.slider.index')->with('success', 'Slider Added Successfully!');
    }

  // ------------------------- EDIT -------------------------
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    // ------------------------- UPDATE -------------------------
    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update image if uploaded
        if ($request->hasFile('image')) {

            // Delete old image
            $oldPath = public_path('uploads/slider/'.$slider->image);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/slider/'), $imageName);

            $slider->image = $imageName;
        }

        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->save();

        return redirect()->route('admin.slider.index')->with('success', 'Slider Updated Successfully!');
    }

    // ------------------------- DELETE -------------------------
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        // Delete image
        $imagePath = public_path('uploads/slider/'.$slider->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $slider->delete();

        return redirect()->route('slider.index')->with('success', 'Slider Deleted Successfully!');
    }
}