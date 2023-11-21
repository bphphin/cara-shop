@extends('clients.layouts.app')
@section('title') Sản phẩm @endsection

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
                @else
                    <p class="text-center text-sm text-gray-400">Giỏ hàng của bạn đang trống</p>
                    <a href="{{ route('home-client') }}"
                       class="w-[200px] text-center block text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 my-2 mx-auto">Mua
                        sắm nào</a>
            </div>
            @endif
        </div>
        </div>
        @livewire('home-search-product')
    </section>

    <section id="product1" class="section-p1 p-shop">
        @include('clients.layouts.side-cate-from-shop')
        <div class="pro-container">
            @foreach($products as $pro)
                <div class="pro">
                    <a href="{{route('home.site.product.show',['id' => $pro->id,'slug' => $pro->slug])."?cate=$pro->cate_id"}}">
                        <img src="{{ $pro->image }}" alt="">
                    </a>
                    <div class="des">
                        <span>{{ $pro->subCate->name  }}</span>
                        <a href="{{route('home.site.product.show',['id' => $pro->id,'slug' => $pro->slug])}}">
                            <h5>{{ $pro->name  }}</h5>
                        </a>
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
    <div class="flex justify-center mb-6">
        {{ $products->links('admin.layouts.pagination')  }}
    </div>
    @include('clients.layouts.form-feedback')
@endsection
