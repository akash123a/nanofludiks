@extends('layouts.app')

@section('title', 'My Wishlist')

@section('content')
    <h1>Welcome, {{ auth()->user()->name }}</h1>
    <h2>❤️ My Wishlist</h2>

    @if ($wishlists->count() == 0)
        <p>No items in wishlist.</p>
    @endif

    @foreach ($wishlists as $item)
        <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
            <strong>{{ $item->product->name }}</strong>

            <form method="POST" action="{{ route('wishlist.destroy', $item->product->id) }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Remove</button>
            </form>
        </div>
    @endforeach
@endsection
