<section id="header">
    <a href="{{ route('home-client') }}" class="logo"><img src="{{ asset('assets/imgs/logo.png') }}" alt=""></a>
    <div class="">
        <ul id="navbar">
            <li><a class="active" href="{{ route('home-client') }}">Home</a></li>
            <li><a href="shop.html">Shop</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>

        </ul>
    </div>
    <div class="control">
        @if(Auth::check())
        {{-- <div class="dropdown">
            <p class="text-uppercase dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</p>
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="#">HTML</a></li>
                <li><a href="#">CSS</a></li>
                <li><a href="#">JavaScript</a></li>
            </ul>
        </div> --}}
        <div class="d-flex align-items-center">
            <div>
                <p class="text-uppercase my-2">{{ Auth::user()->name }}</p>
            </div>
            <div>
                <a href="{{ route('auth.logout') }}" class="text-decoration-none">Logout</a>
            </div>
        </div>
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
