@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h1>Welcome to laravel</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo autem, tenetur quaerat molestias aperiam voluptatem
        eaque itaque id nam eligendi quis voluptate, enim placeat modi. Adipisci atque at odio aspernatur!</p>
    <a href="{{ route('register') }}" class="btn btn-dark fw-bold">Get Started</a>

    <a href="{{ route('checkout.show') }}" class="btn btn-success fw-bold">Checkout Now</a>

</div>

<x-shop-cart-view />
<x-shop-cart-view-btn />

<x-shop-checkout-address /><br>
<x-shop-checkout-delivery /><br>
<x-shop-checkout-payment /><br>
<x-shop-checkout-confirm /><br>

<x-shop-order-placed />

@endsection
