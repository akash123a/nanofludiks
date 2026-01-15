{{-- <!DOCTYPE html>
<html>

<head>
    <title>User Dashboard</title>
</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 8px;
    }
</style>

<body>

    <h1>Welcome, {{ auth()->user()->name }}</h1>

    <p>You are logged in successfully.</p>






    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>

</html> --}}





<!DOCTYPE html>
<html>

<head>
    <title>User Dashboard</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
        }
    </style>
</head>

<body>
    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <h1>Welcome, {{ auth()->user()->name }}</h1>
    <p>You are logged in successfully.</p>

    <hr>

    <h2>Products</h2>

    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Action</th>

        </tr>

        @forelse($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>₹ {{ $product->price }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <form method="POST" action="{{ route('order.store', $product->id) }}">
                        @csrf
                        <button type="submit">Buy</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No products found</td>
            </tr>
        @endforelse
    </table>

    <br>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>

</html>
