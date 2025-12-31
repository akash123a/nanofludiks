@extends('admin.layout.app')

@section('content')
    <h3>Home Section</h3>

    @if ($home)
        <table class="table table-bordered">
            <tr>
                <th>Title</th>
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

            <tr>
                <th>Image</th>
                <td>
                    @if ($home->image)
                        <img src="{{ asset($home->image) }}" width="120">
                    @endif
                </td>
            </tr>
        </table>

        <a href="{{ route('home.edit') }}" class="btn btn-primary">
            Edit Home Section
        </a>

        <form action="{{ route('home.destroy', $home->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Home Section?')">
                Delete
            </button>
        </form>
    @else
        <p>No Home Section found.</p>
    @endif
@endsection
