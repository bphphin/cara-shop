@extends('clients.layouts.app')
@section('app')
    <section id="page-header" class="about-header">
        <h2>#let's_talk</h2>
        <p>LEAVE A MESSAGE, We love to hear from you!</p>
    </section>
    <form action="">
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
                    @foreach ($carts as $cart)
                        <tr class="pro-box">
                            <td><img src="{{ asset('upload')."/".$cart->image }}" alt="" class="mx-auto"></td>
                            <td>{{ $cart->proName }}</td>
                            <td>{{ number_format($cart->price) }}</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>{{ number_format($cart->quantity * $cart->price) }}</td>
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
                        <td><strong>$223</strong></td>
                    </tr>
                </table>
                <button class="btn btn-success">Proceed to checkout</button>
            </div>
        </section>
    </form>
@endsection