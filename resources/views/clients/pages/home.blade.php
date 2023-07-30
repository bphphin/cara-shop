@extends('clients.layouts.app')
@section('app')
    {{-- Begin Banner   --}}
    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>crazy deals</h4>
            <h2>buy 1 get 1 free</h2>
            <span>The best classic dress is on sale at cara</span>
            <button class="white">Learn More</button>
        </div>
        <div class="banner-box banner-box2">
            <h4>spring/summer</h4>
            <h2>uncomming season</h2>
            <span>The best classic dress is on sale at cara</span>
            <button class="white">Collection</button>
        </div>
    </section>
    <section id="banner3">
        <div class="banner-box">
            <h2>SEASONAL SALE</h2>
            <h3>Winter Collection -50% OFF</h3>
        </div>

        <div class="banner-box banner-box2">
            <h2>NEW FOOTWEAR COLLECTION</h2>
            <h3>Spring/Summer 2022</h3>
        </div>

        <div class="banner-box banner-box3">
            <h2>T-SHIRTS</h2>
            <h3>New Trendy Prints</h3>
        </div>
    </section>
    {{-- End Banner   --}}
    {{-- Begin Product 1   --}}
    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Morden Design</p>
        <div class="pro-container">
            @foreach ($products as $pro)
                @if($pro->status_id === 1)
                    <div class="pro">
                        <a href="{{route('home.product.show',['id' => $pro->id,'slug' => $pro->slug])}}">
                            <img src="{{ asset('upload').'/'.$pro->image }}" alt="">
                        </a>
                        <div class="des">
                            <span>{{ $pro->getCateName()->name }}</span>
                            <h5><a href="{{route('home.product.show',['id' => $pro->id,'slug' => $pro->slug])}}" class="text-decoration-none text-body-secondary">{{ $pro->name }}</a></h5>
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
{{--                        <a href="sproduct.html"><i class="fa-solid fa-cart-shopping cart"></i></a>--}}
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    {{--  End Product 1  --}}
    {{-- Banner Top --}}
    <section id="banner" class="section-m1">
        <h4>Repair Services</h4>
        <h2>Up to <span>70%Off</span> -Allt-Shirts&Accessories</h2>
        <button class="normal"> Explore More</button>
    </section>
    {{--  End Banner Top  --}}
    {{-- Begin Product 2   --}}
    <section id="product1" class="section-p1">
        <h2>New Arrivals</h2>
        <p>Summer Collection New Morden Design</p>
        <div class="pro-container">
            @foreach($products as $pro)
                @if($pro->status_id === 2)
                    <div class="pro">
                        <a href="{{route('home.product.show',['id' => $pro->id,'slug' => $pro->slug])}}">
                            <img src="{{ asset('upload').'/'.$pro->image }}" alt="">
                        </a>
                        <div class="des">
                            <span>{{ $pro->getCateName()->name }}</span>
                            <h5><a href="{{route('home.product.show',['id' => $pro->id,'slug' => $pro->slug])}}" class="text-decoration-none text-body-secondary">{{ $pro->name }}</a></h5>
                            <div class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                                <div>
                                    <h4>{{ number_format($pro->price) }}</h4>
                                </div>
                                <div>
                                    {{ $pro->getStatusProduct()->status  }}
                                    <i class="fa-solid fa-heart"></i>
                                </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </section>
    {{-- End Product 2   --}}
@endsection
