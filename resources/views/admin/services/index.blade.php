@extends('admin.layout.app')

@section('content')
    <div class="container py-4"
        style="background-color: #ffffff; border-radius: 12px; padding: 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">

        <div class="d-flex justify-content-between mb-3">
            <h3 class="fw-bold">Service List</h3>
            <a href="{{ route('services.create') }}" class="btn btn-primary shadow-sm px-3">+ Add Service</a>
        </div>

        {{-- Custom Styling --}}
        <style>
            .table-custom thead th {
                background: #ffffff !important;
                font-size: 15px;
                font-weight: 600;
                padding: 14px;
                border-bottom: 2px solid #ddd !important;
                text-align: center;
            }

            .table-custom tbody tr td {
                background: #fff !important;
                padding: 12px;
                vertical-align: middle;
                font-size: 14px;
                text-align: center;
            }

            .table-custom tbody tr:hover {
                background: #f5f7ff !important;
                transition: 0.2s;
            }

            .btn-warning,
            .btn-danger {
                border-radius: 6px;
                font-size: 13px;
                padding: 6px 12px;
                transition: 0.2s;
            }

            .btn-warning:hover,
            .btn-danger:hover {
                transform: scale(1.05);
            }

            .alert-success {
                font-weight: 600;
                border-radius: 8px;
            }

            /* Icon styling */
            td i {
                font-size: 22px;
                color: #333;
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .table-custom tbody tr td {
                    font-size: 13px;
                    padding: 10px;
                }

                .btn-warning,
                .btn-danger,
                .btn-primary {
                    font-size: 12px;
                    padding: 5px 10px;
                }
            }
        </style>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Table --}}
        <table class="table table-bordered table-custom">
            <thead>
                <tr>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td><i class="{{ $service->icon }}"></i></td>
                        <td>{{ $service->title }}</td>
                        <td>{{ Str::limit($service->description, 40) }}</td>

                        <td>
                            <a href="{{ route('services.edit', $service->id) }}"
                                class="btn btn-warning btn-sm me-1 shadow-sm">Edit</a>

                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm shadow-sm"
                                    onclick="return confirm('Delete this service?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
