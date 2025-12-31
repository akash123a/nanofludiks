@extends('admin.layout.app')

@section('content')
    <h2>Edit Blog</h2>

    <form method="POST" action="{{ route('admin.blog.update', $blog->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="title" class="form-control mb-3" value="{{ $blog->title }}">

        <textarea name="content" class="form-control mb-3" rows="6">{{ $blog->content }}</textarea>

        @if ($blog->image)
            <img src="{{ asset('storage/' . $blog->image) }}" width="120" class="mb-2">
        @endif

        <input type="file" name="image" class="form-control mb-3">

        <button class="btn btn-primary">Update</button>
    </form>
@endsection
