@extends('admin.layout.app')

@section('content')
    <div class="container py-4">

        <div class="row justify-content-center">
            <div class="col-md-8">

                {{-- Card --}}
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white rounded-top-4">
                        <h4 class="mb-0">Edit Home Section</h4>
                    </div>

                    <div class="card-body p-4">

                        {{-- Validation Errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('home.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Title --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Title</label>
                                <input type="text" name="title" value="{{ old('title', $home->title) }}"
                                    class="form-control" placeholder="Enter title">
                            </div>

                            {{-- Subtitle --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Subtitle</label>
                                <input type="text" name="subtitle" value="{{ old('subtitle', $home->subtitle) }}"
                                    class="form-control" placeholder="Enter subtitle">
                            </div>

                            {{-- Description 1 --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Description 1</label>
                                <textarea name="description1" rows="3" class="form-control" placeholder="Description 1">{{ old('description1', $home->description1) }}</textarea>
                            </div>

                            {{-- Description 2 --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Description 2</label>
                                <textarea name="description2" rows="3" class="form-control" placeholder="Description 2">{{ old('description2', $home->description2) }}</textarea>
                            </div>

                            {{-- Description 3 --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Description 3</label>
                                <textarea name="description3" rows="3" class="form-control" placeholder="Description 3">{{ old('description3', $home->description3) }}</textarea>
                            </div>

                            {{-- Image --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Home Image</label>
                                <input type="file" name="image" class="form-control">

                                @if ($home->image)
                                    <div class="mt-3">
                                        <p class="mb-1 text-muted">Current Image:</p>
                                        <img src="{{ asset($home->image) }}" width="150"
                                            class="img-thumbnail rounded shadow-sm">
                                    </div>
                                @endif
                            </div>

                            {{-- Buttons --}}
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('home.index') }}" class="btn btn-outline-secondary">
                                    ← Back
                                </a>

                                <button type="submit" class="btn btn-success px-4">
                                    Update Home Section
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
