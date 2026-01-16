<header style="background:#333; padding:15px;">
    <h2 style="color:white;">My Website</h2>

    <nav>
        <a href="{{ url('/') }}" style="color:white; margin-right:15px;">Home</a>
        <a href="{{ route('user.dashboard') }}" style="color:white; margin-right:15px;">Dashboard</a>

        @auth
            @php
                $wishlistCount = \App\Models\Wishlist::where('user_id', auth()->id())->count();
            @endphp

            <a href="{{ route('wishlist.index') }}" style="color:white; margin-right:15px;">
                ❤️ Wishlist
                @if ($wishlistCount > 0)
                    <span
                        style="
                        background:red;
                        color:white;
                        padding:2px 6px;
                        border-radius:50%;
                        font-size:12px;
                        margin-left:4px;">
                        {{ $wishlistCount }}
                    </span>
                @endif
            </a>

            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth
    </nav>
</header>
