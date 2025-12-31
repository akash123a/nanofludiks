@extends('admin.layout.app')

@section('content')
    <h2>Create Blog</h2>

    <form method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
        @csrf

        <input type="text" name="title" class="form-control mb-3" placeholder="Title">

        <textarea name="content" class="form-control mb-3" rows="6" placeholder="Content"></textarea>

        <input type="file" name="image" class="form-control mb-3">

        <button class="btn btn-success">Save</button>
    </form>
@endsection
