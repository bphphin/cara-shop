{{--begin header--}}
<header>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h1><a href="{{ route('home-client')  }}"><span>Cara</span></a></h1>
        </div>

        @include('admin.layouts.side-bar')
    </div>
    <h2>
        <label for="nav-toggle">
            <span class="fas fa-bars"></span>
        </label>
        Dashboard
    </h2>

    <div class="search-wrapper">
        <span class="fas fa-search"> </span>
        <input type="search" placeholder="Search..."/>

    </div>

    <div class="user-wrapper">
        @if(Auth::check())
            <img src="{{ Auth::user()->avatar  }}" width="40px" height="40px" alt="profile-img">
            <div class="">
                <h4>{{ Auth::user()->name  }}</h4>
                <small>Super Admin</small>
            </div>
        @endif

    </div>
</header>

{{-- end header --}}
