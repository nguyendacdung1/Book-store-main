@extends('front.layout.master')

@section('title','Cart')

@section('body')
    <div class="container">
        <section class="mycart">
            <div class="mycart-title">
                <h1><span class="title-bold">My</span> <span class="title-border"> Cart ({{count($cart_products)}})</span></h1>
                <a href="./shop">Back</a>
            </div>
            <div class="mycart-content">
                @if(count($cart_products))
                    <table class="table table-products table-mycart">
                        <tr class="tr-header">
                            <th class="th-name">Product</th>
                            <th class="th-price">Price</th>
                            <th class="th-qty">Quantity</th>
                            <th class="th-total">Total</th>
                        </tr>

                        @foreach($cart_products as $cart_product)
                            @include('front.components.cart-item',compact('cart_product'))
                        @endforeach
                        <tr class="tr-foot">
                            <th></th>
                            <th></th>
                            <th class="tfoot-qty"></th>
                            <th class="tfoot-total">${{$totalCart}}</th>
                        </tr>
                    </table>
                @else
                    @if(session('notification'))
                        <p>{{session('notification')}}</p>
                    @else
                        <p>No data.</p>
                    @endif

                @endif

            </div>
            @if(count($cart_products))
                <div class="mycart-footer">
                    <a href="./checkout">Check Out</a>
                </div>
            @endif

        </section>
    </div>
@endsection
