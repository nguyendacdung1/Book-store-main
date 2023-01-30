@extends('front.layout.master')

@section('title','History')

@section('body')
    <div class="container">
        <section class="mycart">
            <div class="mycart-title">
                <h1><span class="title-bold">Order</span> <span class="title-border">History</span></h1>
                <a href="./account/address">
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="24" viewBox="0 0 27 24">
                        <g id="Group_561" data-name="Group 561" transform="translate(-1286 -230.5)">
                            <path id="Icon_awesome-map-marked" data-name="Icon awesome-map-marked" d="M13.5,0A5.906,5.906,0,0,0,7.594,5.906c0,2.637,3.86,7.444,5.339,9.188a.739.739,0,0,0,1.134,0c1.479-1.745,5.339-6.551,5.339-9.188A5.906,5.906,0,0,0,13.5,0ZM.943,10.123A1.5,1.5,0,0,0,0,11.515V23.249a.75.75,0,0,0,1.028.7L7.5,21V10.074A14.2,14.2,0,0,1,6.5,7.9ZM13.5,16.86a2.24,2.24,0,0,1-1.711-.8c-.922-1.088-1.9-2.326-2.789-3.6V21l9,3V12.469c-.887,1.27-1.867,2.509-2.789,3.6A2.241,2.241,0,0,1,13.5,16.86ZM25.972,7.554,19.5,10.5V24l6.557-2.623A1.5,1.5,0,0,0,27,19.985V8.251A.75.75,0,0,0,25.972,7.554Z" transform="translate(1286 230.5)" fill="#187498"/>
                            <circle id="Ellipse_16" data-name="Ellipse 16" cx="3" cy="3" r="3" transform="translate(1296.5 233)" fill="#fff"/>
                        </g>
                    </svg>
                </a>
            </div>
            <div class="mycart-content order-history">
                <div class="select-options-order">
                    <form action="">
                        <select  class="form-select"
                                 style="font-weight: 600;margin-bottom: 40px;padding-left: 12px" name="status" id="order-status"
                                    onchange="this.form.submit()"
                        >
                            @foreach(\App\Utilities\Constant::$order_status as $status)
                                <option value="{{array_search($status,\App\Utilities\Constant::$order_status)}}"
                                    @if(request('status'))
                                        {{request('status')==array_search($status,\App\Utilities\Constant::$order_status) ? 'selected' : ''}}
                                    @else
                                        @if($status=='All')
                                            selected
                                        @endif
                                    @endif
                                >{{$status}}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                @foreach($orders as $order)
                    <div class="order-item">
                        <table class="table table-products">
                        <tbody style="border: transparent">
                        <tr class="tr-header">
                            <th class="th-name d-flex" style="border: none">
                                #{{Auth::id().$order->id}} ({{\App\Utilities\Constant::$order_status[$order->status]}})
                                @if($order->status==\App\Utilities\Constant::order_status_Prepare)
                                    <form action="./account/order/{{$order->id}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" hidden name="user_id" value="{{Auth::id()}}">
                                        <input type="number" name="status" hidden value="{{\App\Utilities\Constant::order_status_Cancelled}}">
                                        <button
                                            class="btn text-danger"
                                            style="transform: translateY(-6px);margin-left: 8px"
                                            onclick="confirm('Do you want to cancel your order?') ? this.form.submit() : ''"
                                        ><i class="fa-light fa-eraser mr-1"></i>Cancel</button>
                                    </form>
                                @endif
                            </th>
                            <th class="th-price">Price</th>
                            <th class="th-qty">Quantity</th>
                            <th class="th-total">Total</th>
                        </tr>
                        @foreach($order->orderDetails as $orderDetail)
                            <tr class="tr-product">
                            <th>
                                <div class="row-product-item" order="{{$order->id}}">
                                    <img src="./front/imgs/products/{{$orderDetail->product->productImages[0]->path}}" alt="">
                                    <a href="./shop/product/{{$orderDetail->product->id}}">{{$orderDetail->product->name}}</a>
                                    @if($order->status==2 &&
                                        \App\Models\ProductComment::where('user_id',Auth::id())
                                        ->where('order_id',$order->id)
                                        ->where('product_id',$orderDetail->product->id)
                                        ->count()<1
                                    )
                                        <button class="btn text-info fill-book-feedback"><i class="fa-regular fa-message-pen"></i> Feedback</button>
                                    @endif
                                </div>
                            </th>
                            <th class="th-price">
                                ${{$orderDetail->product->price}}
                            </th>
                            <th class="th-qty">
                                <span>{{$orderDetail->qty}}</span>
                            </th>
                            <th class="th-total">
                                ${{$orderDetail->qty*$orderDetail->product->price}}
                            </th>
                        </tr>
                        @endforeach


                        <tr class="tr-foot">
                            <th></th>
                            <th></th>
                            <th class="tfoot-qty"></th>
                            <th class="tfoot-total">${{$orderDetail->sum('total')}}</th>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                @endforeach







            </div>
            @if(count($orders)==0)
                <p>No Data</p>
            @endif

        </section>
    </div>

    <div class="wrap-user-feedback">
        <div class="wrap-feedback">
            <div class="wrap-feedback-top">
                <img class="wrap-feedback-img" src="./front/imgs/dacnhantam.jpg" alt="">
            </div>
            <div class="wrap-feedback-content">
                <button class="btn btn-close-m"><i class="fa-light fa-xmark"></i></button>
                <p>Rate</p>
                <form class="form-feedback-book" action="" method="post">
                    @csrf
                    <div class="list-icon-rate">
                        <input class="input_order_id" type="number" name="order_id" hidden>
                        <input class="input_rate" type="number" required id="rate_1" value="5" hidden name="rating">
                        <div>
                            <label class="label_rate" id="label_1" data="1"><i class="fa-solid fa-star-sharp"></i></label>
                            <label class="label_rate" id="label_2" data="2"><i class="fa-solid fa-star-sharp"></i></label>
                            <label class="label_rate" id="label_3" data="3"><i class="fa-solid fa-star-sharp"></i></label>
                            <label class="label_rate" id="label_4" data="4"><i class="fa-solid fa-star-sharp"></i></label>
                            <label class="label_rate" id="label_5" data="5"><i class="fa-solid fa-star-sharp"></i></label>
                        </div>
                    </div>
                    <p class="note mt-3">Very Good!</p>
                    <textarea class="form-control" style="resize: none;" name="messages" id="messages" cols="30" rows="10" placeholder="Feedback"></textarea>
                    <button class="btn btn-submit">Send</button>
                </form>

            </div>
        </div>
    </div>
    @if(session('cancel'))
        <div class="alert-cancel" data="{{session('cancel')}}"></div>
        <script>
            let alertMessage = document.querySelector('.alert-cancel').getAttribute('data')
            alert(alertMessage)
        </script>
    @endif
    <script>
        $('.wrap-user-feedback').click(function (e){
            if(!e.target.closest('.wrap-feedback') || e.target.closest('.btn-close-m')){
                $('.wrap-feedback').animate({
                    top:-250,
                    opacity:0
                },500)
                $(this).fadeOut()
            }
        })
        $('.fill-book-feedback').click(function(e){
            $('.wrap-user-feedback').css('display','flex')
            $('.wrap-feedback').animate({
                opacity : 1,
                top: 0
            },500)
            let src = $(this).parents('.row-product-item').find('img').attr('src')
            let action = $(this).parents('.row-product-item').find('a').attr('href')
            let order = $(this).parents('.row-product-item').attr('order')

            $('.wrap-feedback-img').attr('src',src)
            $('.form-feedback-book').attr('action',action)
            $('.input_order_id').val(order)
        })

        function setRate(e){
            let inputRate = document.querySelector('.input_rate')
            let rate = e.currentTarget.getAttribute('data')-''
            let note = document.querySelector('.note');
            switch (rate){
                case 1:
                    note.textContent = 'The book is bad!'
                    inputRate.value = 1
                    break
                case 2:
                    note.textContent = 'The book is not good!'
                    inputRate.value = 2
                    break
                case 3:
                    note.textContent = 'Fine!'
                    inputRate.value = 3
                    break;
                case 4:
                    note.textContent = 'Good!'
                    inputRate.value = 4
                    break;
                case 5:
                    note.textContent = 'Very Good!'
                    inputRate.value = 5
                    break;
            }
            $('.label_rate').find('i').removeClass('fa-solid')
            $('.label_rate').find('i').addClass('fa-light')

            document.querySelectorAll('.label_rate').forEach(el=>{
                if(el.getAttribute('data')-''<=rate){
                    $(el).find('i').toggleClass('fa-light fa-solid')
                }
            })
        }

        $('.label_rate').hover(function (e){
            setRate(e)
        })



    </script>
@endsection
