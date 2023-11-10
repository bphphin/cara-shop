@extends('clients.layouts.app')

@section('title') Chi tiết sản phẩm @endsection
@section('app')
    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="{{ asset('upload')."/$product->image"  }}" width="100%" id="mainImg"
                 alt="">
        </div>
        <div class="single-pro-detail">
            <form action="{{ route('home.cart.addToCart') }}" method="POST">
                @csrf
                <h6><a href="{{ route('home-client')  }}" class="text-gray-700">Home</a> / {{ $product->getSubCateName()->name  }}</h6>
                <h4>{{ $product->name  }}</h4>
                <input type="hidden" value="{{ $product->id }}" name="pro_id">
                <h2>{{ number_format($product->price) }}</h2>
                <select name="size_id" id="" class="border">
                    <option>Select size</option>
                    @foreach($sizes as $size)
                        <option value="{{ $size->id  }}">{{ $size->name  }}</option>
                    @endforeach
                </select>
                <input type="number" value="1" min="1" class="border" name="quantity">
                <button class="normal">Add To Cart</button>
            </form>
                <h4>Product Details</h4>
                <span>{!! $product->description !!}   </span>
        </div>
    </section>
    <section id="comment" class="section-p1">
        <h4>Bình luận - nhận xét sản phẩm</h4>
        <div></div>
    </section>
    @include('clients.layouts.form-feedback')
    <section id="product1" class="section-p1">
        @if (count($similarProductByCate) > 0)
        <h2 class="text-3xl">Sản phẩm cùng danh mục</h2>
        <p>Summer Collection New Morden Design</p>
        <div class="pro-container">
            @foreach ($similarProductByCate as $pro)
                <div class="pro">
                    <a href="{{route('home.site.product.show',['id' => $pro->id,'slug' => $pro->slug])."?cate=$pro->cate_id"}}">
                        <img src="{{ asset('upload').'/'.$pro->image }}" alt="">
                    </a>
                    <div class="des">
                        <span>{{ $pro->getSubCateName()->name }}</span>
                        <h5><a href="{{route('home.site.product.show',['id' => $pro->id,'slug' => $pro->slug])."?cate=$pro->cate_id"}}" class="text-decoration-none text-body-secondary">{{ $pro->name }}</a></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4>{{ number_format($pro->price) }}</h4>
                            </div>
                            <div>
                                {{ $pro->getStatusProduct()->status  }}
                                <i class="fa-solid fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @else
        <div class="text-center text-gray-500 italic">Không có sản phẩm cùng danh mục</div>
        @endif
    </section>
@endsection
