<section id="header">
    <a href="{{ route('home-client') }}" class="logo"><img src="{{ asset('assets/imgs/logo.png') }}" alt=""></a>
    <div class="">
        <ul id="navbar">
            <li><a class="" href="{{ route('home-client') }}">Home</a></li>
            <li><a href="{{ route('site.product.shop')  }}">Shop</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="{{ route('site.about')  }}">About</a></li>
            <li><a href="contact.html">Contact</a></li>

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
                        <li><a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a></li>
                    </ul>
                </div>
            @else
                <div class="d-flex align-items-center ms-2">
                    <div class="btn-group me-2">
                        <p class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </p>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('auth.logout') }}">Account Setting</a></li>
                            <li><a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a></li>
                        </ul>
                    </div>
                    <div>
                        <a href="#">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </div>
                </div>
            @endif

        @else
            <a href="{{ route('auth.loginForm') }}">Log In</a>
            <a href="{{ route('auth.registerForm') }}">Sign Up</a>
        @endif
    </div>

    <div class="mobile">
        <i class="user fa-solid fa-user"></i>
        <a href="cart.html"><i class="fa-solid fa-bag-shopping"></i></a>
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section>
