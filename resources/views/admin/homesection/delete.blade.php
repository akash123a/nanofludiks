@extends('admin.layout.app')

@section('content')
    <div class="container">
        <h2>Delete Home Section</h2>

        <div class="alert alert-danger mt-3">
            <strong>Warning!</strong> Are you sure you want to delete the home section content?
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <h4>{{ $home->title }}</h4>
                <p>{{ $home->subtitle }}</p>
                <p>{{ Str::limit($home->description1, 100) }}</p>

                @if ($home->image)
                    <img src="{{ asset($home->image) }}" width="200" class="mt-2">
                @endif
            </div>
        </div>

        <form action="{{ route('home.destroy', $home->id) }}" method="POST" class="mt-3">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Yes, Delete</button>

            <a href="{{ route('home.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
