@extends('admin.layout.app')

@section('content')
    <div class="container py-4">

        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Service</h5>
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

                <form action="{{ route('services.update', $service->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">FontAwesome Icon Class</label>
                        <input type="text" name="icon" class="form-control" value="{{ $service->icon }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $service->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ $service->description }}</textarea>
                    </div>

                    <button class="btn btn-success">Update Service</button>
                </form>
            </div>
        </div>

        {{-- Custom CSS --}}
        <style>
            .card {
                border-radius: 12px;
                transition: transform 0.2s ease;
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

            .card-header {
                border-radius: 12px 12px 0 0 !important;
            }

            .alert-danger {
                border-radius: 8px;
                font-weight: 600;
            }

            input.form-control,
            textarea.form-control {
                border-radius: 8px;
                padding: 10px;
            }

            label.form-label {
                font-weight: 600;
            }
        </style>

    </div>
@endsection
