 @extends('layouts.app')

 @section('title', 'My Wishlist')

 @section('content')
     <div class="wishlist-container">
         <div class="wishlist-header">
             <div class="user-welcome">
                 <h1>Welcome back, {{ auth()->user()->name }}!</h1>
                 <p class="welcome-subtitle">Here are all the items you've saved to your wishlist</p>
             </div>
             <div class="wishlist-icon">
                 <i class="fas fa-heart"></i>
             </div>
         </div>

         @if (session('success'))
             <div class="alert alert-success">
                 <i class="fas fa-check-circle"></i>
                 {{ session('success') }}
             </div>
         @endif

         <div class="wishlist-stats">
             <div class="stat-card">
                 <i class="fas fa-heart"></i>
                 <div class="stat-content">
                     <span class="stat-number">{{ $wishlists->count() }}</span>
                     <span class="stat-label">Wishlist Items</span>
                 </div>
             </div>
             <div class="stat-card">
                 <i class="fas fa-tag"></i>
                 <div class="stat-content">
                     <span class="stat-number">
                         @if ($wishlists->count() > 0)
                             ₹{{ number_format($wishlists->sum(function ($item) {return $item->product->price;}),2) }}
                         @else
                             ₹0.00
                         @endif
                     </span>
                     <span class="stat-label">Total Value</span>
                 </div>
             </div>
         </div>

         <div class="wishlist-title">
             <h2><i class="fas fa-heart"></i> My Wishlist</h2>
             @if ($wishlists->count() > 0)
                 <span class="item-count">{{ $wishlists->count() }} items</span>
             @endif
         </div>

         @if ($wishlists->count() == 0)
             <div class="empty-wishlist">
                 <div class="empty-icon">
                     <i class="far fa-heart"></i>
                 </div>
                 <h3>Your wishlist is empty</h3>
                 <p>Start adding items you love by clicking the heart icon on products!</p>
                 <a href="{{ route('products.index') }}" class="browse-btn">
                     <i class="fas fa-shopping-bag"></i> Browse Products
                 </a>
             </div>
         @else
             @if ($wishlists->count() > 0)
                 <div class="wishlist-summary mb-4">
                     <h4>Total Items: {{ $wishlists->count() }}</h4>
                     <h3>Total Price: ₹{{ number_format($totalPrice, 2) }}</h3>

                     <form action="{{ route('wishlist.buyAll') }}" method="POST">
                         @csrf
                         <button class="btn btn-success mt-2">
                             🛒 Buy All
                         </button>
                     </form>
                 </div>
             @endif
             <div class="wishlist-grid">
                 @foreach ($wishlists as $item)
                     <div class="wishlist-item">
                         <div class="item-image">
                             <div class="image-placeholder">
                                 <i class="fas fa-box"></i>
                             </div>
                             <div class="item-badge">
                                 <i class="fas fa-heart"></i> Saved
                             </div>
                         </div>

                         <div class="item-content">
                             <h3 class="item-name">{{ $item->product->name }}</h3>
                             <div class="item-price">₹{{ number_format($item->product->price, 2) }}</div>
                             <p class="item-description">
                                 {{ Str::limit($item->product->description, 100) }}
                             </p>

                             <div class="item-actions">
                                 <a href="{{ route('order.store', $item->product->id) }}" class="buy-btn"
                                     onclick="event.preventDefault(); document.getElementById('buy-form-{{ $item->id }}').submit();">
                                     <i class="fas fa-shopping-cart"></i> Buy Now
                                 </a>
                                 <form id="buy-form-{{ $item->id }}"
                                     action="{{ route('order.store', $item->product->id) }}" method="POST"
                                     style="display: none;">
                                     @csrf
                                 </form>

                                 <form method="POST" action="{{ route('wishlist.destroy', $item->product->id) }}"
                                     class="remove-form">
                                     @csrf
                                     @method('DELETE')
                                     <button type="submit" class="remove-btn">
                                         <i class="fas fa-trash"></i> Remove
                                     </button>
                                 </form>
                             </div>
                         </div>
                     </div>
                 @endforeach
             </div>
         @endif
     </div>

     <style>
         .wishlist-container {
             max-width: 1200px;
             margin: 0 auto;
             padding: 30px 20px;
         }

         .wishlist-header {
             display: flex;
             justify-content: space-between;
             align-items: center;
             margin-bottom: 40px;
             padding-bottom: 20px;
             border-bottom: 2px solid #f0f0f0;
         }

         .user-welcome h1 {
             font-size: 2.2rem;
             color: #333;
             margin-bottom: 8px;
             font-weight: 700;
         }

         .welcome-subtitle {
             color: #666;
             font-size: 1.1rem;
         }

         .wishlist-icon {
             width: 80px;
             height: 80px;
             background: linear-gradient(135deg, #ff4081, #ff79a6);
             border-radius: 50%;
             display: flex;
             align-items: center;
             justify-content: center;
             color: white;
             font-size: 2.5rem;
             box-shadow: 0 8px 20px rgba(255, 64, 129, 0.3);
         }

         .alert {
             padding: 15px 20px;
             background: #d4edda;
             color: #155724;
             border-radius: 8px;
             margin-bottom: 30px;
             display: flex;
             align-items: center;
             gap: 10px;
             border-left: 4px solid #28a745;
         }

         .alert i {
             font-size: 1.2rem;
         }

         .wishlist-stats {
             display: grid;
             grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
             gap: 20px;
             margin-bottom: 40px;
         }

         .stat-card {
             background: white;
             border-radius: 12px;
             padding: 25px;
             box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
             display: flex;
             align-items: center;
             gap: 20px;
             transition: transform 0.3s ease;
         }

         .stat-card:hover {
             transform: translateY(-5px);
         }

         .stat-card i {
             font-size: 2.5rem;
             color: #ff4081;
             background: rgba(255, 64, 129, 0.1);
             width: 70px;
             height: 70px;
             border-radius: 50%;
             display: flex;
             align-items: center;
             justify-content: center;
         }

         .stat-number {
             font-size: 2rem;
             font-weight: 700;
             color: #333;
             display: block;
         }

         .stat-label {
             color: #666;
             font-size: 0.95rem;
         }

         .wishlist-title {
             display: flex;
             justify-content: space-between;
             align-items: center;
             margin-bottom: 30px;
         }

         .wishlist-title h2 {
             font-size: 1.8rem;
             color: #333;
             display: flex;
             align-items: center;
             gap: 10px;
         }

         .wishlist-title h2 i {
             color: #ff4081;
         }

         .item-count {
             background: #ff4081;
             color: white;
             padding: 5px 15px;
             border-radius: 20px;
             font-size: 0.9rem;
             font-weight: 600;
         }

         .empty-wishlist {
             text-align: center;
             padding: 60px 20px;
             background: white;
             border-radius: 12px;
             box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
         }

         .empty-icon {
             font-size: 4rem;
             color: #ffccd5;
             margin-bottom: 20px;
         }

         .empty-wishlist h3 {
             font-size: 1.5rem;
             color: #333;
             margin-bottom: 10px;
         }

         .empty-wishlist p {
             color: #666;
             max-width: 500px;
             margin: 0 auto 25px;
         }

         .browse-btn {
             display: inline-flex;
             align-items: center;
             gap: 10px;
             background: linear-gradient(135deg, #4361ee, #3a0ca3);
             color: white;
             padding: 12px 30px;
             border-radius: 8px;
             text-decoration: none;
             font-weight: 600;
             transition: all 0.3s ease;
         }

         .browse-btn:hover {
             transform: translateY(-3px);
             box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
         }

         .wishlist-grid {
             display: grid;
             grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
             gap: 25px;
         }

         .wishlist-item {
             background: white;
             border-radius: 12px;
             overflow: hidden;
             box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
             transition: all 0.3s ease;
         }

         .wishlist-item:hover {
             transform: translateY(-10px);
             box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
         }

         .item-image {
             height: 180px;
             background: linear-gradient(135deg, #7b8264, #d43327);
             position: relative;
             display: flex;
             align-items: center;
             justify-content: center;
         }

         .image-placeholder {
             color: rgba(255, 255, 255, 0.9);
             font-size: 4rem;
         }

         .item-badge {
             position: absolute;
             top: 15px;
             right: 15px;
             background: rgba(255, 255, 255, 0.9);
             color: #ff4081;
             padding: 5px 12px;
             border-radius: 20px;
             font-size: 0.85rem;
             font-weight: 600;
             display: flex;
             align-items: center;
             gap: 5px;
         }

         .item-content {
             padding: 25px;
         }

         .item-name {
             font-size: 1.3rem;
             color: #333;
             margin-bottom: 10px;
             font-weight: 600;
         }

         .item-price {
             font-size: 1.8rem;
             color: #333;
             font-weight: 700;
             margin-bottom: 15px;
             background: linear-gradient(135deg, #ff4081, #ff79a6);
             -webkit-background-clip: text;
             -webkit-text-fill-color: transparent;
             display: inline-block;
         }

         .item-description {
             color: #666;
             line-height: 1.6;
             margin-bottom: 20px;
             min-height: 50px;
         }

         .item-actions {
             display: flex;
             gap: 10px;
         }

         .buy-btn {
             flex: 2;
             background: linear-gradient(135deg, #4361ee, #3a0ca3);
             color: white;
             border: none;
             padding: 12px;
             border-radius: 8px;
             cursor: pointer;
             font-weight: 600;
             text-decoration: none;
             display: flex;
             align-items: center;
             justify-content: center;
             gap: 8px;
             transition: all 0.3s ease;
         }

         .buy-btn:hover {
             transform: translateY(-2px);
             box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
         }

         .remove-form {
             flex: 1;
         }

         .remove-btn {
             width: 100%;
             background: #ffebee;
             color: #ff4081;
             border: 2px solid #ffcdd2;
             padding: 12px;
             border-radius: 8px;
             cursor: pointer;
             font-weight: 600;
             display: flex;
             align-items: center;
             justify-content: center;
             gap: 8px;
             transition: all 0.3s ease;
         }

         .remove-btn:hover {
             background: #ff4081;
             color: white;
             transform: translateY(-2px);
         }

         @media (max-width: 768px) {
             .wishlist-header {
                 flex-direction: column;
                 text-align: center;
                 gap: 20px;
             }

             .wishlist-grid {
                 grid-template-columns: 1fr;
             }

             .item-actions {
                 flex-direction: column;
             }

             .user-welcome h1 {
                 font-size: 1.8rem;
             }
         }
     </style>
 @endsection
