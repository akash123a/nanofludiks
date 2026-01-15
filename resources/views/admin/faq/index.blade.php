@extends('admin.layout.app')

@section('content')
    <div class="container py-4"
        style="background-color: #ffffff; border-radius: 12px; padding: 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">

        <div class="d-flex justify-content-between mb-3">
            <h3 class="fw-bold">FAQ List</h3>
            <a href="{{ route('faq.create') }}" class="btn btn-primary shadow-sm px-3">+ Add FAQ</a>
        </div>

        {{-- Custom Styling --}}
        <style>
            .faq-card {

                background: #fff;
                padding: 25px;
                border-radius: 12px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
                transition: transform 0.2s;
            }

            .faq-card:hover {
                transform: translateY(-3px);
            }

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

            /* Added extra spacing and responsiveness */
            @media (max-width: 768px) {
                .faq-card {
                    padding: 20px;
                }

                .table-custom tbody tr td {
                    font-size: 13px;
                    padding: 10px;
                }

                .btn-warning,
                .btn-danger {
                    font-size: 12px;
                    padding: 5px 10px;
                }
            }
        </style>

        <div class="faq-card">

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-custom">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th style="width: 150px;">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($faqs as $faq)
                        <tr>
                            <td class="fw-semibold">{{ $loop->iteration }}</td>

                            <td class="fw-medium">{{ Str::limit($faq->question, 20) }}</td>

                            <td>{{ Str::limit($faq->answer, 20) }}</td>

                            <td>
                                <a href="{{ route('faq.edit', $faq->id) }}"
                                    class="btn btn-sm btn-warning me-1 shadow-sm">Edit</a>

                                <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Are you sure you want to delete this FAQ?')"
                                        class="btn btn-sm btn-danger shadow-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

    </div>
@endsection
