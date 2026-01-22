@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')

    @if (session('success'))
        <p style="color: green; padding: 10px; background-color: #e8f5e9; border-radius: 4px;">
            {{ session('success') }}
        </p>
    @endif

    <h1>Welcome, {{ auth()->user()->name ?? '' }}</h1>
    <p>You are logged in successfully.</p>

    <hr>

    <h2>Products</h2>

    <style>
        :root {
            --primary: #00A5B6;
            --primary-dark: #008B9B;
            --secondary: #4361ee;
            --accent: #ff6b6b;
            --success: #4CAF50;
            --warning: #f0ad4e;
            --light: #ffffff;
            --dark: #2d3748;
            --gray: #718096;
            --gray-light: #e2e8f0;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            --shadow-hover: 0 20px 40px rgba(0, 0, 0, 0.15);
            --radius: 16px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .products-container {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 30px;
            margin: 20px auto;
            max-width: 1400px;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .product-card {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: var(--transition);
            position: relative;
            border: 1px solid var(--gray-light);
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-hover);
            border-color: var(--primary);
        }

        .product-image {
            height: 220px;
            width: 100%;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .product-card:hover .product-image img {
            transform: scale(1.1);
        }

        .product-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(0, 165, 182, 0.3);
            z-index: 2;
        }

        .product-content {
            padding: 25px;
        }

        .product-name {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .product-description {
            color: var(--gray);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-price {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .product-price::before {
            content: '₹';
            font-size: 1.2rem;
            font-weight: 600;
        }

        .product-actions {
            display: flex;
            gap: 12px;
            margin-top: 15px;
        }

        .buy-form,
        .wishlist-form {
            flex: 1;
        }

        .buy-btn,
        .wishlist-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .buy-btn {
            background: linear-gradient(135deg, var(--success), #45a049);
            color: white;
            box-shadow: 0 8px 20px rgba(76, 175, 80, 0.3);
        }

        .buy-btn:hover {
            background: linear-gradient(135deg, #45a049, var(--success));
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(76, 175, 80, 0.4);
        }

        .wishlist-btn {
            background: linear-gradient(135deg, var(--warning), #ee9c2e);
            color: white;
            box-shadow: 0 8px 20px rgba(240, 173, 78, 0.3);
        }

        .wishlist-btn:hover {
            background: linear-gradient(135deg, #ee9c2e, var(--warning));
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(240, 173, 78, 0.4);
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            grid-column: 1 / -1;
        }

        .empty-icon {
            font-size: 4rem;
            color: var(--gray-light);
            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .empty-state p {
            color: var(--gray);
            max-width: 500px;
            margin: 0 auto;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                gap: 25px;
            }
        }

        @media (max-width: 768px) {
            .products-container {
                padding: 20px;
                margin: 10px;
            }

            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
            }

            .product-image {
                height: 200px;
            }

            .product-content {
                padding: 20px;
            }

            .product-name {
                font-size: 1.2rem;
            }

            .product-price {
                font-size: 1.6rem;
            }
        }

        @media (max-width: 576px) {
            .products-grid {
                grid-template-columns: 1fr;
            }

            .product-actions {
                flex-direction: column;
            }

            .buy-btn,
            .wishlist-btn {
                padding: 12px;
                font-size: 0.95rem;
            }

            .empty-icon {
                font-size: 3rem;
            }

            .empty-state {
                padding: 40px 15px;
            }
        }

        /* Animation for new items */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .product-card {
            animation: fadeInUp 0.6s ease forwards;
        }

        .product-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .product-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .product-card:nth-child(3) {
            animation-delay: 0.3s;
        }

        .product-card:nth-child(4) {
            animation-delay: 0.4s;
        }

        .product-card:nth-child(5) {
            animation-delay: 0.5s;
        }

        .product-card:nth-child(6) {
            animation-delay: 0.6s;
        }
    </style>

    <div class="products-container">
        @if ($products->count() > 0)
            <div class="products-grid">
                @foreach ($products as $product)
                    <div class="product-card">
                        <div class="product-image">
                            @if ($product->image)
                                <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}">
                            @else
                                <div
                                    style="display: flex; align-items: center; justify-content: center; height: 100%; color: var(--gray);">
                                    <i class="fas fa-box-open" style="font-size: 3rem;"></i>
                                </div>
                            @endif
                            <div class="product-badge">
                                #{{ $loop->iteration }}
                            </div>
                        </div>

                        <div class="product-content">
                            <h3 class="product-name">{{ $product->name }}</h3>
                            <p class="product-description">{{ $product->description }}</p>

                            <div class="product-price">{{ number_format($product->price, 2) }}</div>

                            <div class="product-actions">
                                <form method="POST" action="{{ route('order.store', $product->id) }}" class="buy-form">
                                    @csrf
                                    <button type="submit" class="buy-btn">
                                        <i class="fas fa-shopping-cart"></i> Buy Now
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('wishlist.store', $product->id) }}"
                                    class="wishlist-form">
                                    @csrf
                                    <button type="submit" class="wishlist-btn">
                                        <i class="fas fa-heart"></i> Wishlist
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-box-open"></i>
                </div>
                <h3>No Products Found</h3>
                <p>There are currently no products available. Please check back later.</p>
            </div>
        @endif
    </div>



@endsection





{{-- 

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
             text-align: left;
         }

         .actions {
             display: flex;
             gap: 5px;
         }

         button {
             padding: 5px 10px;
             cursor: pointer;
         }

         .buy-btn {
             background-color: #4CAF50;
             color: white;
             border: none;
             border-radius: 3px;
         }

         .wishlist-btn {
             background-color: #e7da22;
             color: white;
             border: none;
             border-radius: 3px;
         }
     </style>
 </head>

 <body>
     @if (session('success'))
         <p style="color: green; padding: 10px; background-color: #e8f5e9; border-radius: 4px;">
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
             <th>Actions</th>
         </tr>

         @forelse($products as $product)
             <tr>
                 <td>{{ $loop->iteration }}</td>
                 <td>{{ $product->name }}</td>
                 <td>₹ {{ $product->price }}</td>
                 <td>{{ $product->description }}</td>
                 <td class="actions">
                     <form method="POST" action="{{ route('order.store', $product->id) }}">
                         @csrf
                         <button type="submit" class="buy-btn">Buy</button>
                     </form>
                     <form action="{{ route('wishlist.store', $product->id) }}" method="POST">
                         @csrf
                         <button type="submit" class="wishlist-btn"> Wishlist</button>
                     </form>
                 </td>
             </tr>
         @empty
             <tr>
                 <td colspan="5">No products found</td>
             </tr>
         @endforelse
     </table>

     <br>

     <form method="POST" action="{{ route('logout') }}">
         @csrf
         <button type="submit"
             style="padding: 8px 16px; background-color: #f44336; color: white; border: none; border-radius: 4px;">Logout</button>
     </form>

 </body>

 </html> --}}
