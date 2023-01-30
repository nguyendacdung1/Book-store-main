@extends('front.layout.master')

@section('title','Home')

@section('body')

    <div class="container">
        <section class="header-banner">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="./front/imgs/banner/banner-1.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="./front/imgs/banner/banner-2.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="./front/imgs/banner/banner-3.png" alt="">
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </section>

        <section class="bestselling">
            <div class="bestselling-title">
                <h1><span class="title-bold">Best</span> <span class="title-border">Selling</span></h1>
                <a class="link-showall" href="./shop">Show all</a>
            </div>

            <div class="bestselling-product products">
                @foreach($products as $product)
                    @include('front.components.product_component',['product'=>$product])
                @endforeach

            </div>

        </section>

        <section class="top-author">
            <div class="author-title">
                <p class="service-title-top">OUR SERVICES</p>
                <h2 class="service-title">Authors of the month</h2>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="list-authors">
                <div class="row">
                    @foreach($authors as $author)
                        @include('front.components.author_component',compact('author'))
                    @endforeach
                </div>


            </div>
        </section>





    </div>

    <script>
        var swiper = new Swiper(".mySwiper", {
            cssMode: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            mousewheel: true,
            keyboard: true,
        });
    </script>
@endsection
