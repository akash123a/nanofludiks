 @extends('admin.layout.app')

 @section('content')
     <h2>Sliders</h2>
     <div class="container py-4">

         <div class="d-flex justify-content-between align-items-center mb-3">
             <h2 class="fw-bold">All Sliders</h2>

             <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">
                 + Add New Slider
             </a>
         </div>

         {{-- Success Message --}}
         @if (session('success'))
             <div class="alert alert-success fw-semibold">
                 {{ session('success') }}
             </div>
         @endif

         <div class="card shadow-lg" style="border-radius: 12px;">
             <div class="card-body">

                 <table class="table table-striped table-hover text-center">
                     <thead class="table-dark">
                         <tr>
                             <th>ID</th>
                             <th>Slider Image</th>
                             <th>Title</th>
                             <th>Subtitle</th>
                             <th style="width: 180px;">Actions</th>
                         </tr>
                     </thead>

                     <tbody>
                         @foreach ($sliders as $slider)
                             <tr>
                                 <td class="fw-semibold">{{ $slider->id }}</td>

                                 <td>
                                     <img src="{{ asset('uploads/slider/' . $slider->image) }}" width="120"
                                         class="img-thumbnail rounded shadow-sm">
                                 </td>

                                 {{-- <td>{{ $slider->title }}</td> --}}
                                 {{-- <td>{{ $slider->subtitle }}</td> --}}
                                 <td>{{ Str::limit($slider->title, 20) }}</td>
                                 <td>{{ Str::limit($slider->subtitle, 30) }}</td>


                                 <td>
                                     <a href="{{ route('admin.slider.edit', $slider->id) }}"
                                         class="btn btn-warning btn-sm me-1">
                                         Edit
                                     </a>

                                     <form action="{{ route('admin.slider.delete', $slider->id) }}" method="POST"
                                         class="d-inline">
                                         @csrf
                                         @method('DELETE')

                                         <button class="btn btn-danger btn-sm"
                                             onclick="return confirm('Are you sure you want to delete this slider?')">
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

     </div>
 @endsection
