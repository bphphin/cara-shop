@extends('clients.layouts.app')
@section('app')

    <section id="page-header">
        <h2>#stayhome</h2>
        <p>Save more with coupons&up to 70%off!</p>
    </section>

    <section id="cart-wrap">
        <div class="cart-list">
            <h4><i class="fa-sharp fa-solid fa-cart-shopping"></i> Giỏ hàng</h4>
            <div class="cart-item">
                <div class="product-list">
                    <div class="product-list-img"><img
                            src="{{ asset('assets/imgs/products/f1.jpg')  }}" alt=""></div>
                    <div class="product-info">
                        <h6>Cartoon Astronaut T-Shirts</h6>
                        <span>Số lượng:1</span>
                    </div>
                    <div class="product-price">
                        <span>$78</span>
                        <button class="normal">Xóa</button>
                    </div>
                </div>
                <button class="normal"> Xem giỏ hàng</button>
            </div>
        </div>
{{--        <form action="{{ route('site.product.search')  }}" class="search border" method="POST">--}}
{{--            @csrf--}}
{{--            <input type="text" placeholder="Search product" name="name">--}}
{{--            <button class="normal me-1">Search</button>--}}
{{--        </form>--}}
        @include('clients.layouts.form-search-product')
    </section>

    <section id="product1" class="section-p1 p-shop">
        @include('clients.layouts.side-cate-from-shop')
        <div class="pro-container">
            @foreach($products as $pro)
                <div class="pro">
                    <img src="{{ asset('upload'). "/$pro->image"  }}" alt="">
                    <div class="des">
                        <span>{{ $pro->getSubCateName()->name  }}</span>
                        <h5>{{ $pro->name  }}</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>{{ number_format($pro->price)  }}</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
                </div>
            @endforeach
        </div>
    </section>
    <div class="mb-3">
        {{ $products->links('admin.layouts.pagination')  }}
    </div>
    @include('clients.layouts.form-feedback')
@endsection
