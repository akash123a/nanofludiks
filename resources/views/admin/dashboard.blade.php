@extends('admin.layout.app')

@section('content')
    <h1>Welcome Admin</h1>



    <hr>

    {{-- Call Blogs page --}}
    @include('admin.blog.index');
    @include('admin.slider.index');
    @include('admin.homesection.index');
    @include('admin.service-section.index');
@endsection
