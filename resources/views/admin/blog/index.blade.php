@extends('admin.layout.app')

@section('content')
    <h2>Blogs</h2>

    <a href="{{ route('admin.blog.create') }}" class="btn btn-primary mb-3">Add Blog</a>

    <table class="table table-bordered">
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Action</th>
        </tr>

        @foreach ($blogs as $blog)
            <tr>
                <td>
                    @if ($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" width="80">
                    @endif
                </td>
                <td>{{ $blog->title }}</td>
                <td>
                    <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
