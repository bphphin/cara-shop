@include('admin.layouts.side-bar')
<section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>

        <div class="search-box">
            @livewire('dashboard-search-product')
        </div>
        @if(Auth::check())
            <p>{{ Auth::user()->name  }}</p>
            <img src="{{ Auth::user()->avatar  }}" alt="">
        @endif
    </div>
