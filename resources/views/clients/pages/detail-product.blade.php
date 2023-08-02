@extends('clients.layouts.app')
@section('app')
    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="{{ asset('upload')."/$product->image"  }}" width="100%" id="mainImg"
                 alt="">
        </div>

        <div class="single-pro-detail">
            <form action="{{ route('site.addToCart') }}" method="POST">
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
@endsection
