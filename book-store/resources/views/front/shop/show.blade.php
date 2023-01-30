@extends('front.layout.master')

@section('title',$product->name)

@section('body')
    <div class="container">
        <section class="section-review-product">
            <div class="row gx-5 gy-5">
                <div class="col-12 col-lg-6">
                    <div class="img-book-detail">
                        <div class="list-mini">
                            <div class="img-mini">
                                <img src="./front/imgs/products/{{$product->productImages[1]->path}}" alt="">
                            </div>
                            <div class="img-mini">
                                <img src="./front/imgs/products/{{$product->productImages[2]->path}}" alt="">
                            </div>
                            <div class="img-mini">
                                <img src="./front/imgs/products/{{$product->productImages[3]->path}}" alt="">
                            </div>
                        </div>
                        <div class="img-big">
                            <img src="./front/imgs/products/{{$product->productImages[0]->path}}" alt="">
                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-6">
                    <div class="review-product">
                        <p>{{$product->author->name}}</p>
                        <h1>{{$product->name}}</h1>
                        <div class="below-title">
                            @if(count($product->productComments)>0)
                                <div class="star">
                                    @for($i=1;$i<=5;$i++)
                                        @if($i<=$product->productComments->avg('rating'))
                                            <i class="fa-solid fa-star-sharp"></i>
                                        @else
                                            <i class="fa-light fa-star-sharp"></i>
                                        @endif
                                    @endfor
                                </div>
                            @else
                                <div class="star">
                                    @for($i=1;$i<=5;$i++)
                                        @if($i<=$product->productComments->avg('rating'))
                                            <i class="fa-solid fa-star-sharp"></i>
                                        @else
                                            <i class="fa-light fa-star-sharp"></i>
                                        @endif
                                    @endfor
                                </div>
                            @endif
                            <span class="text-right">{{count($product->productComments)}} feedback</span>
                        </div>
                        <div class="review-product-price">
                            <div class="group-input">
                                <form action="./cart/add" method="post" id="formProductShow">
                                    @csrf
                                    @method('POST')
                                    <input type="number" name="id" hidden value="{{$product->id}}">
                                    <input style="padding: 4px" type="number" id="qtyShow" name="qty" class="form-control" value="1" min="1" max="100">

                                </form>
                            </div>

                            <p style="margin: 0">${{$product->price}}</p>
                        </div>

                        <div class="below-review">
                            <button class="btn btn-secondary add-product-show"><i class="fa-light fa-cart-plus"></i> ADD TO CART</button>
                        </div>

                        <div class="table-review">
                            <table>
                                <tr>
                                    <td>Size</td>
                                    <td>{{$product->width}} x {{$product->height}} cm</td>
                                </tr>
                                <tr>
                                    <td>Author</td>
                                    <td>{{$product->author->name}}</td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td>{{$product->type==1?'Hardcover':'Paperback'}}</td>
                                </tr>
                                <tr>
                                    <td>Pages</td>
                                    <td>{{$product->pages}}</td>
                                </tr>
                                <tr>
                                    <td>Publisher</td>
                                    <td>{{$product->nxb}}</td>
                                </tr>
                            </table>
                        </div>


                    </div>
                </div>
            </div>

        </section>

        <section class="section-describe">
            <h2>Description</h2>
            <div class="describe-content">
                {!! $product->description!!}
            </div>
        </section>

        <section class="section-feedback">
            <h2>Feedback</h2>
            <div class="feedback-content">
                <div class="row gx-5 gy-5">
                    <div class="col-12 col-lg-6">
                        <div class="feedback-point">
                            <span class="point">{{number_format($product->productComments->avg('rating'),1)}}</span>
                            <div class="star">
                                <div class="icon-top">
                                    @for($i=1;$i<=5;$i++)
                                        @if($i<=$product->productComments->avg('rating'))
                                            <i class="fa-solid fa-star-sharp"></i>
                                        @else
                                            <i class="fa-light fa-star-sharp"></i>
                                        @endif
                                    @endfor
                                </div>
                                <p class="feedback-count">{{count($product->productComments)}} feedback</p>
                            </div>
                        </div>
                        <div class="list-point">
                            <div class="five-point num-point">
                                <div class="star">
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                </div>
                                <div class="count">
                                    <div class="line" data="{{count($product->productComments)>0 ? count($product->productComments->where('rating',5))/count($product->productComments) : 0}}"></div>
                                    <p>{{count($product->productComments->where('rating',5))}}</p>
                                </div>
                            </div>
                            <div class="four-point num-point">
                                <div class="star">
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-light fa-star-sharp"></i>
                                </div>
                                <div class="count">
                                    <div class="line" data="{{count($product->productComments)>0 ? count($product->productComments->where('rating',4))/count($product->productComments) : 0}}"></div>
                                    <p>{{count($product->productComments->where('rating',4))}}</p>
                                </div>
                            </div>
                            <div class="three-point num-point">
                                <div class="star">
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-light fa-star-sharp"></i>
                                    <i class="fa-light fa-star-sharp"></i>
                                </div>
                                <div class="count">
                                    <div class="line" data="{{count($product->productComments)>0 ? count($product->productComments->where('rating',3))/count($product->productComments) : 0}}"></div>
                                    <p>{{count($product->productComments->where('rating',3))}}</p>
                                </div>
                            </div>
                            <div class="two-point num-point">
                                <div class="star">
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-light fa-star-sharp"></i>
                                    <i class="fa-light fa-star-sharp"></i>
                                    <i class="fa-light fa-star-sharp"></i>
                                </div>
                                <div class="count">
                                    <div class="line" data="{{count($product->productComments)>0 ? count($product->productComments->where('rating',2))/count($product->productComments) : 0}}"></div>
                                    <p>{{count($product->productComments->where('rating',2))}}</p>
                                </div>
                            </div>
                            <div class="one-point num-point">
                                <div class="star">
                                    <i class="fa-solid fa-star-sharp"></i>
                                    <i class="fa-light fa-star-sharp"></i>
                                    <i class="fa-light fa-star-sharp"></i>
                                    <i class="fa-light fa-star-sharp"></i>
                                    <i class="fa-light fa-star-sharp"></i>
                                </div>
                                <div class="count">
                                    <div class="line" data="{{count($product->productComments)>0 ? count($product->productComments->where('rating',1))/count($product->productComments) : 0}}"></div>
                                    <p>{{count($product->productComments->where('rating',1))}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="feedback-imgs">
                            <div class="feedback-img-title">
                                <p>
                                    @if(count($product->productComments)>50)
                                        50+
                                    @endif
                                </p>
                                <span>Product reviews</span>
                            </div>
                            <div class="feedback-user">
                                <div class="swiper mySwiper2" style="width: 100%;">
                                    <div class="swiper-wrapper">
                                        @for($i=0;$i<count($product->productComments);$i+=2)
                                            <div class="swiper-slide">
                                                @include('front.components.feedback-user-item',['comment'=>$product->productComments[$i]])
                                                @if($i+1==count($product->productComments))
                                                    @break
                                                @endif
                                                @include('front.components.feedback-user-item',['comment'=>$product->productComments[$i+1]])
                                            </div>
                                        @endfor


                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section class="bestselling">
            <div class="bestselling-title">
                <h1><span class="title-bold">Same Author</span></h1>
            </div>

            <div class="bestselling-product products">
                @foreach($suggest_products as $product)
                    @include('front.components.product_component',compact('product'))
                @endforeach
            </div>

        </section>
    </div>
    <script>
        var swiper = new Swiper(".mySwiper2", {
            loop:true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            }
        });
        $('.add-product-show').click(function(){
            formProductShow.submit()
        })
        $('.line').each(function (){
            let rate = $(this).attr('data')
            let el = document.createElement('div')
            $(el).css({
                position:'absolute',
                background:'#187498',
                'border-radius' : '1em',
                width : rate*100+'%',
                height:'6px'
            })
            $(this).append($(el))
        })
        $('.img-mini').click(function (){
            let tem = $(this).find('img').attr('src')
            let srcBig = $('.img-big').find('img').attr('src')
            $(this).find('img').attr('src',srcBig)
            $('.img-big').find('img').attr('src',tem)
        })
    </script>
@endsection
