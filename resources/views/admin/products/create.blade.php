<!DOCTYPE html>
<html>

<head>
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">
        <h3>Add Product</h3>

        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Product Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Price</label>
                <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                @error('price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <button class="btn btn-success">Save</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>

</body>

</html>
