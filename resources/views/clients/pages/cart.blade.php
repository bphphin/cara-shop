@extends('clients.layouts.app')
@section('app')
    <section id="page-header" class="about-header">
        <h2>#let's_talk</h2>
        <p>LEAVE A MESSAGE, We love to hear from you!</p>
    </section>
    @if (Auth::check())
    @if(count($carts) > 0)
    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quatity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            @php
                $total = 0;
                $sumTotal = 0;
            @endphp
            <tbody class="cart-box">
                @foreach ($carts as $cart)
                <tr class="pro-box">
                    <td><i class="far fa-times-circle"></i></td>
                    <td><img src="{{ asset('upload')."/".$cart->image }}" alt=""></td>
                    <td>{{ $cart->proName }}</td>
                    <td>{{ number_format($cart->price) }}</td>
                    <td>
                        <form action="{{ route('home.site.updateCart') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $cart->id }}">
                            <input type="hidden" name="pro_id" value="{{ $cart->pro_id }}">
                            <input type="number" value="{{ $cart->quantity }}" class="border w-[40px] h-[40px] text-center" name="quantity">
                            <button class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-3 py-2 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Update</button>
                        </form>
                    </td>
                    <td>{{ number_format($cart->quantity * $cart->price) }}</td>
                    @php
                        $total = $total += ($cart->quantity * $cart->price);
                    @endphp
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <section id="cart-add" class="section-p1 justify-content-end">
        <div id="subtotal">
            <h3>Cart totals</h3>
            <table>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td><strong>Tatal</strong></td>
                    <td><strong>{{ number_format($total) }}</strong></td>
                </tr>
            </table>
            <button class="normal">Proceed to checkout</button>
        </div>
    </section>
    @else
    <div class="mx-auto w-[600px]">
        <img src="{{ asset('assets/imgs/cart-empty.png') }}" alt="" class="w-[100%] h-[400px]">
        <p class="text-center text-sm text-gray-400">Giỏ hàng của bạn đang trống</p>
        <a href="{{ route('home-client') }}" class="w-[200px] text-center block text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 my-2 mx-auto">Mua sắm nào</a>
    </div>
    @endif
    @else
    <a href="{{ route('auth.loginForm') }}" class="w-[200px] text-center block text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 my-2 mx-auto">Đăng nhập tại đây</a>
    @endif
@endsection
