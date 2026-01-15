 @extends('admin.layout.app')

 @section('content')
     <div class="container mt-4">
         <div class="d-flex justify-content-between mb-3">
             <h3>Product List</h3>
             <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                 Add Product
             </a>
         </div>

         @if (session('success'))
             <div class="alert alert-success">{{ session('success') }}</div>
         @endif

         <table class="table table-bordered">
             <thead class="table-dark">
                 <tr>
                     <th>#</th>
                     <th>Name</th>
                     <th>Price</th>
                     <th>Description</th>
                     <th width="180">Action</th>
                 </tr>
             </thead>
             <tbody>


                 @forelse($products as $product)
                     <tr>
                         <td>{{ $loop->iteration }}</td>
                         <td>{{ $product->name }}</td>
                         <td>₹ {{ $product->price }}</td>
                         <td>{{ $product->description }}</td>
                         <td>
                             <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning">
                                 Edit
                             </a>

                             <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                 style="display:inline;">
                                 @csrf
                                 @method('DELETE')
                                 <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                     Delete
                                 </button>
                             </form>
                         </td>
                     </tr>
                 @empty
                     <tr>
                         <td colspan="5" class="text-center">No products found</td>
                     </tr>
                 @endforelse
             </tbody>
         </table>
     </div>
 @endsection
