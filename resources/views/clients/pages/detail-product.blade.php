@extends('clients.layouts.app')
@section('title') Chi tiết sản phẩm @endsection
@section('app')
    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="{{ $product->image }}" width="100%" id="mainImg"
                 alt="">
        </div>
        <div class="single-pro-detail">
            <form action="{{ route('home.cart.addToCart') }}" method="POST">
                @csrf
                <h6><a href="{{ route('home-client')  }}" class="text-gray-700">Home</a>
                    / {{ $product->subCate->name  }}</h6>
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
        <div>
            <form action="{{ route('home.rating')  }}" method="POST">
                @csrf
                <label for="">
                    Đánh giá của bạn về sản phẩm
                    <div id="rateYo"></div>
                    <input type="hidden" name="rating" id="rating">
                    <input type="hidden" name="product_id" value="{{ $product?->id  }}">
                </label>
                <textarea name="review" id="review" cols="30" rows="3" class="block w-full px-2 py-2 text-sm
                text-gray-800 bg-white border-1 dark:bg-gray-800 focus:ring-0
                dark:text-white dark:placeholder-gray-400 rounded"></textarea>
                <button type="submit"
                        class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none
                        bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700
                        focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800
                        dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 my-2">
                    Post
                </button>
            </form>
        </div>
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
                            <img src="{{ $pro->image }}" alt="">
                        </a>
                        <div class="des">
                            <span>{{ $pro->subCate->name }}</span>
                            <h5>
                                <a href="{{route('home.site.product.show',['id' => $pro->id,'slug' => $pro->slug])."?cate=$pro->cate_id"}}"
                                   class="text-decoration-none text-body-secondary">{{ $pro->name }}</a></h5>
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
                                    {{ $pro->statusProduct->status  }}
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
@push('script')
    <script>
        jQuery(function () {

            jQuery("#rateYo").rateYo({
                rating: 0,
                starWidth: "30px",
            }).on("rateyo.set", function (e, data) {
                jQuery("#rating").val(data.rating);
                console.log(data.rating);
            });
        });
    </script>
@endpush
