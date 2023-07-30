@extends('clients.layouts.app')
@section('app')
    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="{{ asset('upload')."/$product->image"  }}" width="100%" id="mainImg"
                 alt="">
        </div>

        <div class="single-pro-detail">
            <h6>Home / {{ $product->getCateName()->name  }}</h6>
            <h4>{{ $product->name  }}</h4>
            <h2>{{ number_format($product->price) }}</h2>
            <select name="size_id" id="">
                <option>Select size</option>
                @foreach($sizes as $size)
                    <option value="{{ $size->id  }}">{{ $size->name  }}</option>
                @endforeach
            </select>
            <input type="number" value="1" min="1">
            <button class="normal">Add To Cart</button>
            <h4>Product Details</h4>
            <span>{!! $product->description !!}   </span>
        </div>
    </section>
@endsection
