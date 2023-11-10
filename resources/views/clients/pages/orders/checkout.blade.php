@extends('clients.layouts.app')
@section('app')
    <section id="page-header" class="about-header">
        <h2>#let's_talk</h2>
        <p>LEAVE A MESSAGE, We love to hear from you!</p>
    </section>
    <form action="{{ route('home.cart.completeCheckout') }}" method="POST">
        @csrf
        <section id="cart" class="section-p1">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Image</td>
                        <td >Product</td>
                        <td >Price</td>
                        <td>Quatity</td>
                        <td>Subtotal</td>
                    </tr>
                </thead>
                <tbody class="cart-box">
                    @php
                        $total = 0;
                        $sumTotal = 0;
                    @endphp
                    @foreach ($carts as $cart)
                        <tr class="pro-box">
                            <td><img src="{{ asset('upload')."/".$cart->image }}" alt="" class="mx-auto"></td>
                            <td>{{ $cart->proName }}</td>
                            <td>{{ number_format($cart->price) }}</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>{{ number_format($cart->quantity * $cart->price) }}</td>
                        </tr>
                        @php
                            $total = $total += ($cart->quantity * $cart->price);
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </section>

        <section id="cart-add" class="section-p1 justify-content-end">
            <div id="coupon">
                <h3>Your Infomation</h3>
                <div class="mt-2">
                    <input type="text" name="username" value="{{ Auth::user()->name }}" class="" placeholder="Enter your name">
                </div>
                <div class="mt-2">
                    <input type="text" name="address" value="{{ Auth::user()->address }}" class="" placeholder="Enter your address">
                </div>
                <div class="mt-2" class="mr-3">
                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="" placeholder="Enter your phone">
                </div>
            </div>
            <div id="subtotal">
                <h3>Cart totals</h3>
                <table>
                    <tr>
                        <td>Shipping</td>
                        <td>Free</td>
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>{{ number_format($total) }}</strong></td>
                    </tr>
                </table>
                <button class="btn btn-success">Complete to checkout</button>
            </div>
        </section>
    </form>
@endsection