@extends('clients.layouts.app')

@section('title') Chi tiết sản phẩm @endsection

@section('app')

    <section id="page-header">
        <h2>#stayhome</h2>
        <p>Save more with coupons&up to 70%off!</p>
    </section>

    <section id="cart-wrap">
        <div class="cart-list">
            <h4><i class="fa-sharp fa-solid fa-cart-shopping"></i> Giỏ hàng</h4>
            <div class="cart-item">
                @if($carts->count() > 0)
                    @foreach($carts as $item)
                        <div class="product-list">
                            <div class="product-list-img">
                                <img src="{{ $item->image }}" alt=""></div>
                            <div class="product-info">
                                <h6>{{ $item->proName  }}</h6>
                                <span>Số lượng: {{ $item->quantity  }}</span>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('home.cart')  }}"
                               class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900
                       focus:outline-none bg-white rounded-full border border-gray-200
                       hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200
                       dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600
                       dark:hover:text-white dark:hover:bg-gray-700">
                                Xem giỏ hàng</a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        @include('clients.layouts.form-search-product')
    </section>

    <section id="product1" class="section-p1 p-shop">
        <div class="p-category">
            <h4>Danh mục sản phẩm</h4>
            <ul class="category-list">
                <li><a href="#">Bán chạy nhất</a></li>
                <li><a href="#">Hàng mới về</a></li>
                <li><a href="#">Hàng giảm giá</a></li>
                <li>
                    @foreach($subCate as $sCate)
                        <ul class="nav_menu">
                            <li>
                                <a href="{{ route('home.site.product.proFromSubCate',$sCate->id)."cate=$sCate->cate_id"  }}">{{ $sCate->name  }}</a>
                            </li>
                        </ul>
                    @endforeach

                </li>
                <li>
                    Top 10 hàng yêu thích
                    <ul>
                        <li class="hot_pro">
                            <a href="#">
                                <div class="hot_pro--img"><img src="{{ asset('assets/imgs/products/f1.jpg')  }}" alt="">
                                </div>
                                <span>Áo sơ mi</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="pro-container">
            @foreach($productToCate as $prToCate)
                <div class="pro">
                    <a href="{{route('home.site.product.show',['id' => $prToCate->id,'slug' => $prToCate->slug])."?cate=$prToCate->cate_id"}}">
                        <img src="{{ $prToCate->image }}" alt="">
                    </a>
                    <div class="des">
                        <span>{{ $prToCate->cateName  }}/{{ $prToCate->subCateName  }}</span>
                        <h5>
                            <a href="{{route('home.site.product.show',['id' => $prToCate->id,'slug' => $prToCate->slug])}}"
                               class="text-decoration-none text-body-secondary">{{ $prToCate->name }}</a></h5>

                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>{{ number_format($prToCate->price)  }}</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
                </div>
            @endforeach
        </div>
    </section>
    <div class="mb-3">
        {{--        {{ $products->links('admin.layouts.pagination')  }}--}}
    </div>
    @include('clients.layouts.form-feedback')
@endsection
