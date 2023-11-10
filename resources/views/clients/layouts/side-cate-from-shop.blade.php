<div class="p-category">
    <h4>Danh mục sản phẩm</h4>
    <ul class="category-list">
        <li><a href="#">Bán chạy nhất</a></li>
        <li><a href="#">Hàng mới về</a></li>
        <li><a href="#">Hàng giảm giá</a></li>
        <li>
            @foreach($cates as $cate)
                <ul class="nav_menu">
                    <li><a href="{{ route('home.site.cate.detail',$cate->id)  }}">{{ $cate->name  }}</a></li>
                </ul>
            @endforeach
        </li>
        <li>
            Top 10 hàng yêu thích
            <ul>
                <li class="hot_pro">
                    <a href="#">
                        <div class="hot_pro--img"><img src="{{ asset('assets/imgs/products/f1.jpg')  }}" alt=""></div>
                        <span>Áo sơ mi</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
