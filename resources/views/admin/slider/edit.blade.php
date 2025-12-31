@extends('admin.layout.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-lg p-4" style="border-radius: 12px;">
                    <h2 class="text-center mb-4 fw-bold">Edit Slider</h2>

                    <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="fw-semibold">Title:</label>
                            <input type="text" name="title" class="form-control" value="{{ $slider->title }}">
                        </div>

                        <div class="mb-3">
                            <label class="fw-semibold">Subtitle:</label>
                            <input type="text" name="subtitle" class="form-control" value="{{ $slider->subtitle }}">
                        </div>

                        <div class="mb-3">
                            <label class="fw-semibold">Current Image:</label><br>
                            <img src="{{ asset('uploads/slider/' . $slider->image) }}" width="150"
                                class="rounded shadow-sm">
                        </div>

                        <div class="mb-3">
                            <label class="fw-semibold">Change Image:</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 mt-3 fw-semibold">
                            Update Slider
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
