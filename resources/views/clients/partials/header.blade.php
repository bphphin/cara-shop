<section id="header">
    <a href="{{ route('home-client') }}" class="logo"><img src="{{ asset('assets/imgs/logo.png') }}" alt=""></a>
    <div class="">
        <ul id="navbar">
            <li><a class="" href="{{ route('home-client') }}">Home</a></li>
            <li><a href="{{ route('home.site.product.shop')  }}">Shop</a></li>
            <li><a href="{{ route('home.site.blog')  }}">Blog</a></li>
            <li><a href="{{ route('home.site.about')  }}">About</a></li>
            <li><a href="{{ route('home.site.contact')  }}">Contact</a></li>

        </ul>
    </div>
    <div class="control">
        @if(Auth::check())
            @if(Auth::user()->role === 1)
                <div class="btn-group">
                    <p class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </p>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin') }}">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ route('account.logout') }}">Logout</a></li>
                    </ul>
                </div>
            @else
                <div class="d-flex align-items-center ms-2 gap-x-3">
                    <a href="{{ route('clients.profile') }}">
                        <img src="{{ Auth::user()->avatar }}" alt="" class="object-contain w-[30px] rounded ">
                    </a>
                    <a href="{{ route('home.cart') }}">
                        <img src="{{ asset('assets/imgs/shopping-bag.png') }}" alt="" class="object-contain w-[30px] rounded">
                    </a>
                </div>
            @endif
        @else
            <a href="{{ route('account.login') }}">Log In</a>
            <a href="{{ route('account.register') }}">Sign Up</a>
        @endif
    </div>

    <div class="mobile">
        <i class="user fa-solid fa-user"></i>
        <a href="cart.html"><i class="fa-solid fa-bag-shopping"></i></a>
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section>
