@extends('admin.layout.app')

@section('content')
    <div class="container py-4">

        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Add Service</h5>
                <a href="{{ route('services.index') }}" class="btn btn-sm btn-danger">✕</a>
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('services.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">FontAwesome Icon Class</label>
                        <input type="text" name="icon" class="form-control" placeholder="e.g. fas fa-microscope"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Service Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Service Description</label>
                        <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                    </div>

                    <button class="btn btn-success">Save Service</button>
                </form>
            </div>
        </div>

        {{-- Custom Styling --}}
        <style>
            .card {
                border-radius: 12px;
                transition: transform 0.2s;
            }

            .card:hover {
                transform: translateY(-2px);
            }

            .btn-success {
                border-radius: 6px;
                padding: 8px 16px;
                font-size: 14px;
                transition: 0.2s;
            }

            .btn-success:hover {
                transform: scale(1.05);
            }

            .alert-danger {
                border-radius: 8px;
                font-weight: 600;
            }

            .card-header {
                border-radius: 12px 12px 0 0 !important;
            }
        </style>

    </div>
@endsection
