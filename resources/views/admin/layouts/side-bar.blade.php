<nav>
    <div class="logo-name">
{{--        @if(Auth::check())--}}
{{--        <div class="logo-image">--}}
{{--            <img src="images/logo.png" alt="">--}}
{{--            <p>{{ Auth::user()->name  }}</p>--}}
{{--        </div>--}}
{{--        @endif--}}
        <a href="{{ route('home-client')  }}">
            <span class="logo_name">CaraShop</span>
        </a>
    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li><a href="{{ route('admin')  }}">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
            <li><a href="{{ route('admin.product.index')  }}">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Sản Phẩm</span>
                </a></li>
            <li><a href="{{ route('admin.brand.index')  }}">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Thương Hiệu</span>
                </a></li>
            <li><a href="{{ route('admin.category.index')  }}">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">Danh Mục</span>
                </a></li>
            <li><a href="#">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Comment</span>
                </a></li>
            <li><a href="#">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Share</span>
                </a></li>
        </ul>

        <ul class="logout-mode">
            <li><a href="{{ route('auth.logout')  }}">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

            <li class="mode">
{{--                <a href="#">--}}
{{--                    <i class="uil uil-moon"></i>--}}
{{--                    <span class="link-name">Dark Mode</span>--}}
{{--                </a>--}}

                <div class="mode-toggle">
{{--                    <span class="switch"></span>--}}
                </div>
            </li>
        </ul>
    </div>
</nav>


