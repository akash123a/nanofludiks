@extends('admin.layout.app')

@section('content')
    <h3 class="mb-4">Home Section</h3>

    @if ($home)
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row align-items-start">

                    {{-- LEFT SIDE IMAGE --}}
                    <div class="col-md-4 text-center">
                        @if ($home->image)
                            <img src="{{ asset($home->image) }}" class="img-fluid rounded shadow" alt="Home Image">
                        @else
                            <p class="text-muted">No image uploaded</p>
                        @endif
                    </div>

                    {{-- RIGHT SIDE CONTENT --}}
                    <div class="col-md-8">
                        <table class="table table-borderless">
                            <tr>
                                <th width="160">Title</th>
                                <td>{{ $home->title }}</td>
                            </tr>

                            <tr>
                                <th>Subtitle</th>
                                <td>{{ $home->subtitle }}</td>
                            </tr>

                            <tr>
                                <th>Description 1</th>
                                <td>{{ $home->description1 }}</td>
                            </tr>

                            <tr>
                                <th>Description 2</th>
                                <td>{{ $home->description2 }}</td>
                            </tr>

                            <tr>
                                <th>Description 3</th>
                                <td>{{ $home->description3 }}</td>
                            </tr>
                        </table>

                        {{-- ACTION BUTTONS --}}
                        <div class="mt-3">
                            <a href="{{ route('home.edit') }}" class="btn btn-primary me-2">
                                Edit Home Section
                            </a>

                            <form action="{{ route('home.destroy', $home->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this Home Section?')">
                                    Delete
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @else
        <p class="text-muted">No Home Section found.</p>
    @endif
@endsection
