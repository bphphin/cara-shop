<nav>
    <div class="logo-name">
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
                    <span class="link-name">Product</span>
                </a></li>
            <li><a href="{{ route('admin.brand.index')  }}">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Brand</span>
                </a></li>
            <li><a href="{{ route('admin.category.index')  }}">
                    <i class="fa-solid fa-coins"></i>
                    <span class="link-name">Category</span>
                </a></li>
            <li><a href="{{ route('admin.att.index')  }}">
                    <i class="fa-solid fa-industry"></i>
                    <span class="link-name">Attribute</span>
                </a></li>
            <li><a href="{{ route('admin.customer.index')  }}">
                    <i class="fa-solid fa-user-tie"></i>
                    <span class="link-name">Customer</span>
                </a></li>
            <li><a href="{{ route('admin.order.index')  }}">
                    <i class="fa-solid fa-thumbtack"></i>
                    <span class="link-name">Order Manager</span>
                </a></li>
        </ul>

        <ul class="logout-mode">
            <li><a href="{{ route('account.logout')  }}">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

            <li class="mode">
                <a href="#">
                    <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                    <span class="switch"></span>
                </div>
            </li>
        </ul>
    </div>
</nav>


