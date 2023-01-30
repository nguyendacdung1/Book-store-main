<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&family=Readex+Pro:wght@500&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.rawgit.com/mfd/09b70eb47474836f25a21660282ce0fd/raw/e06a670afcb2b861ed2ac4a1ef752d062ef6b46b/Gilroy.css">
    <link rel="stylesheet" href="./front/css/fontawesome-pro-6.1.0-web/css/all.css">
    <link rel="stylesheet" href="./front/css/style.css">
    <link rel="stylesheet" href="./front/css/keyframe.css">
    <link rel="stylesheet" href="./front/css/check-out.css">
    <link rel="stylesheet" href="./front/css/responsives.css">
    <!-- Swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>


</head>
<body>
<div class="container">
    <header class="header-checkout">
        <a href="#"><img src="./front/imgs/shradha.svg" alt=""></a>
    </header>
    <div class="check-out-title">
        <span class="bold">Check Out</span>
    </div>
    <section class="checkout">

        <div class="col">

            <div class="check-address">
                <div class="check-address-title">
                    <h3>Shipping address</h3>
                    <a href="./account/address"><i class="fa-light fa-pen-to-square"></i></a>
                </div>
                <div class="check-address-content" city="{{$user_address->city}}" district="{{$user_address->district}}" region="{{$user_address->ward}}">
                    <p class="p-info-user">
                        <span>{{$user_address->full_name}}</span>
                        <i class="fa-light fa-grip-lines-vertical"></i>
                        <span>{{$user_address->phone}}</span>
                    </p>
                    <p>{{$user_address->email}}</p>
                    <p class="p-address">
                        Hà Nội,quận Cầu Giấy, phường Mai Dịch, phố Doãn Kế Thiện
                    </p>
                    <p class="p-address-detail">
                        {{$user_address->describe}}
                    </p>
                </div>
            </div>
            <div class="shipping-method">
                <div class="shipping-method-title">
                    <h3>Pay method</h3>
                </div>
                <form action="./checkout" id="form-payment-method" method="post">
                    @csrf
                    <div class="shipping-method-item">
                        <input type="radio" name="payment-method" id="pay_later" checked value="pay_later">
                        <label for="pay_later">
                            <div class="method-name">
                                <p>Payment on delivery</p>
                            </div>
                            <div class="method-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="60" height="32.542" viewBox="0 0 60 32.542">
                                    <defs>
                                        <clipPath id="clip-path">
                                            <rect id="Rectangle_624" data-name="Rectangle 624" width="60" height="32.542" transform="translate(537 549.417)" fill="#fff" stroke="#707070" stroke-width="1"/>
                                        </clipPath>
                                    </defs>
                                    <g id="Mask_Group_2" data-name="Mask Group 2" transform="translate(-537 -549.417)" clip-path="url(#clip-path)">
                                        <g id="icon-payment-method-cod" transform="translate(541.347 549.047)">
                                            <g id="Group_452" data-name="Group 452" transform="translate(0 0)">
                                                <g id="Group_451" data-name="Group 451">
                                                    <g id="Group_449" data-name="Group 449">
                                                        <path id="Path_465" data-name="Path 465" d="M3.529,0A2.566,2.566,0,0,1,6.094,2.566l0,.481H18.88c1.755,0,2.6.5,3.925,2.169l.238.308L25.649,9.14H48.983A2.841,2.841,0,0,1,51.8,12.009V30.647a2.841,2.841,0,0,1-2.813,2.868H18.048a2.839,2.839,0,0,1-2.812-2.868l0-8.5H13a5.983,5.983,0,0,1-3.8-1.607c-.269-.227-.52-.461-.753-.7l-.4-.439-.1-.113h-1.9a2.566,2.566,0,0,1-2.511,2.039H2.566A2.566,2.566,0,0,1,0,18.762V2.566A2.566,2.566,0,0,1,2.566,0ZM48.876,10.664H19.694l4.815,4.383c1.274,1.159.542,2.7-1.091,3.488a4.742,4.742,0,0,1-4.542-.149L18.6,18.2l-1.848-1.682v14.05a1.411,1.411,0,0,0,1.4,1.421H48.876a1.41,1.41,0,0,0,1.4-1.423V12.085a1.41,1.41,0,0,0-1.4-1.421Zm-42.784,7.1h2.6l.278.377.163.2.113.129a9.308,9.308,0,0,0,.927.906,4.859,4.859,0,0,0,2.548,1.237l.275.013h2.235V16.371H14.22a4.135,4.135,0,0,1-3.592-1.585l-.146-.222a4.006,4.006,0,0,1-.573-1.918L9.9,12.374h1.522a2.658,2.658,0,0,0,.363,1.4,2.407,2.407,0,0,0,2.124,1.063l.308.008H17.18l2.386,2.175a3.191,3.191,0,0,0,3.189.141c.809-.393.984-.761.73-.991l-5.212-4.743.006-1.861V9.14l5.578,0L21.9,6.428C20.71,4.869,20.233,4.555,18.88,4.555H6.093v13.21ZM3.529,1.284H2.566A1.282,1.282,0,0,0,1.293,2.405l-.01.162V18.76a1.284,1.284,0,0,0,1.122,1.274l.162.01h.961A1.282,1.282,0,0,0,4.8,18.922l.01-.162V2.566A1.282,1.282,0,0,0,3.689,1.293l-.162-.01Z" fill="#242424"/>
                                                        <g id="Group_448" data-name="Group 448" transform="translate(25.898 13.71)">
                                                            <circle id="Ellipse_14" data-name="Ellipse 14" cx="7.617" cy="7.617" r="7.617" transform="translate(0 0)" fill="#0d5cb6"/>
                                                        </g>
                                                    </g>
                                                    <g id="Group_450" data-name="Group 450" transform="translate(30.467 16.758)">
                                                        <path id="Path_466" data-name="Path 466" d="M4.483,4.322l-2.5-.6a.765.765,0,0,1-.631-.7.808.808,0,0,1,.868-.732H3.782a1.828,1.828,0,0,1,.957.262.376.376,0,0,0,.418-.042L5.639,2.1A.263.263,0,0,0,5.6,1.661a3.34,3.34,0,0,0-1.814-.518h-.06V.285A.316.316,0,0,0,3.383,0H2.706a.316.316,0,0,0-.338.285v.858H2.219A2.032,2.032,0,0,0,.008,3.2,2.1,2.1,0,0,0,1.72,4.846l2.387.575a.767.767,0,0,1,.631.7.809.809,0,0,1-.868.732H2.309a1.837,1.837,0,0,1-.958-.261.373.373,0,0,0-.416.04l-.482.408a.263.263,0,0,0,.04.437A3.336,3.336,0,0,0,2.309,8h.058v.858a.316.316,0,0,0,.34.285h.677a.316.316,0,0,0,.338-.285V8h.057A2.315,2.315,0,0,0,5.968,6.742a1.844,1.844,0,0,0-1.486-2.42Z" transform="translate(0.002)" fill="#fff"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </label>
                    </div>
                    <div class="shipping-method-item disabled">
                        <input type="radio" name="payment-method" id="momo" value="momo" disabled>
                        <label for="momo">
                            <div class="method-name">
                                <p>Payment with MoMo</p>
                            </div>
                            <div class="method-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36.762" height="37.334" viewBox="0 0 36.762 37.334">
                                    <g id="Group_562" data-name="Group 562" transform="translate(-3 -3.667)">
                                        <path id="Path_507" data-name="Path 507" d="M13.876,3.667H28.887c3.782,0,5.153.4,6.535,1.151a7.769,7.769,0,0,1,3.207,3.257c.739,1.4,1.133,2.8,1.133,6.637V29.956c0,3.841-.394,5.233-1.133,6.637a7.769,7.769,0,0,1-3.207,3.257C34.04,40.6,32.668,41,28.887,41H13.876c-3.782,0-5.153-.4-6.536-1.151a7.769,7.769,0,0,1-3.207-3.257C3.394,35.189,3,33.8,3,29.956V14.711c0-3.841.394-5.233,1.133-6.637A7.77,7.77,0,0,1,7.34,4.817C8.723,4.066,10.094,3.667,13.876,3.667Z" fill="#a50064"/>
                                        <path id="Path_508" data-name="Path 508" d="M29.63,8.667a6.166,6.166,0,1,0,6.132,6.166A6.149,6.149,0,0,0,29.63,8.667Zm0,8.8a2.618,2.618,0,1,1,2.6-2.618,2.613,2.613,0,0,1-2.6,2.618Zm-7.9,3.548H18.2V13.259a1.039,1.039,0,1,0-2.078,0v7.753H12.594V13.259a1.039,1.039,0,1,0-2.078,0v7.753H7V13.3a4.623,4.623,0,0,1,4.606-4.631,4.558,4.558,0,0,1,2.758.929,4.764,4.764,0,0,1,2.758-.929A4.623,4.623,0,0,1,21.728,13.3Zm7.9,2.657a6.166,6.166,0,1,0,6.132,6.166,6.149,6.149,0,0,0-6.132-6.166Zm-12.508-.014a4.623,4.623,0,0,1,4.606,4.631V36H18.2V28.247a1.039,1.039,0,1,0-2.078,0V36H12.594V28.247a1.039,1.039,0,1,0-2.078,0V36H7V28.285a4.623,4.623,0,0,1,4.606-4.631,4.559,4.559,0,0,1,2.758.929A4.764,4.764,0,0,1,17.122,23.654ZM29.63,27.229a2.619,2.619,0,1,1-2.6,2.619A2.613,2.613,0,0,1,29.63,27.229Z" fill="#fff"/>
                                    </g>
                                </svg>
                            </div>
                        </label>
                    </div>
                    <div class="shipping-method-item disabled">
                        <input type="radio" name="payment-method" id="zalopay" value="zalopay" disabled>
                        <label for="zalopay">
                            <div class="method-name">
                                <p>Payment with Zalopay</p>
                            </div>
                            <div class="method-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="37.333" height="37.334" viewBox="0 0 37.333 37.334">
                                    <g id="Group_563" data-name="Group 563" transform="translate(-3 -3.667)">
                                        <path id="Path_509" data-name="Path 509" d="M9.958,9.791l27.369-4a8.674,8.674,0,0,0-5.7-2.124H11.7a8.7,8.7,0,0,0-8.7,8.7V32.28a8.706,8.706,0,0,0,7.276,8.587L6.653,14.223A3.935,3.935,0,0,1,9.958,9.791Z" fill="#0068ff"/>
                                        <path id="Path_510" data-name="Path 510" d="M36.227,5.146l-27.369,4a3.938,3.938,0,0,0-3.294,4.442L9.176,40.233a9.335,9.335,0,0,0,1.426.123H30.531a8.7,8.7,0,0,0,8.7-8.7V11.712A8.664,8.664,0,0,0,36.227,5.146Z" transform="translate(1.1 0.645)" fill="#fff"/>
                                        <path id="Path_511" data-name="Path 511" d="M35.124,5.146l-.092.021a8.8,8.8,0,0,1,3.007,6.556V31.615A8.653,8.653,0,0,1,29.4,40.253H9.489a9.822,9.822,0,0,1-1.437-.123l.01.1a8.351,8.351,0,0,0,1.416.123H29.367a8.749,8.749,0,0,0,8.743-8.741v-19.9A8.573,8.573,0,0,0,35.124,5.146Z" transform="translate(2.202 0.645)" fill="#b3b3b3"/>
                                        <path id="Path_512" data-name="Path 512" d="M20.936,12.4a.851.851,0,0,0-.647-.267.833.833,0,0,0-.811.544,1.881,1.881,0,0,0-1.529-.646,2.619,2.619,0,0,0-1.97.882,3.118,3.118,0,0,0-.78,2.175,3.211,3.211,0,0,0,.78,2.175,2.483,2.483,0,0,0,1.97.882,1.894,1.894,0,0,0,1.529-.646.842.842,0,0,0,.811.544.907.907,0,0,0,.647-.267.815.815,0,0,0,.236-.646V12.957A.742.742,0,0,0,20.936,12.4Zm-1.847,3.765a1.073,1.073,0,0,1-.883.41,1.045,1.045,0,0,1-.883-.41,1.69,1.69,0,0,1-.339-1.057,1.467,1.467,0,0,1,.339-1.016,1.073,1.073,0,0,1,.883-.41,1.045,1.045,0,0,1,.883.41,1.655,1.655,0,0,1,.339,1.016A1.958,1.958,0,0,1,19.089,16.168Z" transform="translate(5.318 3.647)" fill="#0068ff"/>
                                        <path id="Path_513" data-name="Path 513" d="M21.231,18.811a.85.85,0,0,1-.646.267.907.907,0,0,1-.647-.267.829.829,0,0,1-.236-.646V10.7a.988.988,0,0,1,.236-.646.851.851,0,0,1,.647-.267.907.907,0,0,1,.646.267.829.829,0,0,1,.236.646v7.469A.782.782,0,0,1,21.231,18.811Z" transform="translate(7.28 2.666)" fill="#0068ff"/>
                                        <path id="Path_514" data-name="Path 514" d="M26.434,12.937a2.805,2.805,0,0,0-2.176-.882,2.972,2.972,0,0,0-2.176.882,3.128,3.128,0,0,0-.852,2.206,3.024,3.024,0,0,0,.852,2.206,2.906,2.906,0,0,0,2.176.882,2.972,2.972,0,0,0,2.176-.882,3.074,3.074,0,0,0,.811-2.175A2.755,2.755,0,0,0,26.434,12.937Zm-1.252,3.221a1.073,1.073,0,0,1-.883.41,1.045,1.045,0,0,1-.883-.41,1.69,1.69,0,0,1-.339-1.057,1.467,1.467,0,0,1,.339-1.016,1.073,1.073,0,0,1,.883-.41,1.045,1.045,0,0,1,.883.41A1.655,1.655,0,0,1,25.52,15.1,1.958,1.958,0,0,1,25.182,16.159Z" transform="translate(7.947 3.657)" fill="#0068ff"/>
                                        <path id="Path_515" data-name="Path 515" d="M16.27,12.992a4.177,4.177,0,0,0,.954-1.631c0-.646-.411-.985-1.221-.985h-4.31a1.093,1.093,0,0,0-.78.236.831.831,0,0,0-.267.616.787.787,0,0,0,.267.616,1.063,1.063,0,0,0,.78.236h2.956l-3.8,4.883a1.539,1.539,0,0,0-.369.852c0,.708.472,1.057,1.426,1.057h4.444c.708,0,1.057-.308,1.057-.882,0-.616-.339-.882-1.057-.882H13.089Z" transform="translate(3.262 2.925)" fill="#0068ff"/>
                                        <path id="Path_516" data-name="Path 516" d="M13.381,19.557H12.262v2.309h1.119a.992.992,0,0,0,.811-.339,1.158,1.158,0,0,0,.308-.811,1.075,1.075,0,0,0-.308-.811A.957.957,0,0,0,13.381,19.557Z" transform="translate(4.037 6.927)" fill="#39b54a"/>
                                        <path id="Path_517" data-name="Path 517" d="M17.24,21.036a1.015,1.015,0,0,0-.811.369,1.5,1.5,0,0,0-.308.954,1.46,1.46,0,0,0,.308.954.943.943,0,0,0,.811.369,1.015,1.015,0,0,0,.811-.369,1.5,1.5,0,0,0,.308-.954,1.48,1.48,0,0,0-.308-.954A1.061,1.061,0,0,0,17.24,21.036Z" transform="translate(5.719 7.571)" fill="#39b54a"/>
                                        <path id="Path_518" data-name="Path 518" d="M27.517,17.263H11.446a.985.985,0,0,0-.985.985v9.4a.985.985,0,0,0,.985.985H24.11a.6.6,0,0,1-.205-.441,1.13,1.13,0,0,1,.1-.441l.616-1.323L22.96,22.28a1.312,1.312,0,0,1-.072-.369.5.5,0,0,1,.236-.441.68.68,0,0,1,.472-.205.734.734,0,0,1,.749.544l1.016,2.821,1.088-2.821a.761.761,0,0,1,.749-.544.663.663,0,0,1,.472.205.634.634,0,0,1,.236.441,1.028,1.028,0,0,1-.072.369l-2.442,5.94a1.2,1.2,0,0,1-.236.41H27.5a.985.985,0,0,0,.985-.985v-9.4A.956.956,0,0,0,27.517,17.263Zm-11.34,6.309a2.683,2.683,0,0,1-1.9.677H13.057v1.765a.768.768,0,0,1-.236.616.821.821,0,0,1-.575.236.709.709,0,0,1-.575-.236.905.905,0,0,1-.236-.616v-6.1a.744.744,0,0,1,.852-.852h1.939a2.91,2.91,0,0,1,2,.708,2.46,2.46,0,0,1,.78,1.867A2.53,2.53,0,0,1,16.177,23.573Zm6.27,2.411a.751.751,0,0,1-.236.575.731.731,0,0,1-.575.236.837.837,0,0,1-.78-.513,1.742,1.742,0,0,1-1.426.616,2.3,2.3,0,0,1-1.8-.811,3.017,3.017,0,0,1-.749-2.031,2.88,2.88,0,0,1,.749-2.031,2.294,2.294,0,0,1,1.8-.81,1.784,1.784,0,0,1,1.426.615.818.818,0,0,1,.78-.513.709.709,0,0,1,.575.236.731.731,0,0,1,.236.575Z" transform="translate(3.252 5.927)" fill="#39b54a"/>
                                    </g>
                                </svg>

                            </div>
                        </label>
                    </div>
                    <div class="shipping-method-item disabled">
                        <input type="radio" name="payment-method" id="vnpay" value="vnpay" disabled>
                        <label for="vnpay">
                            <div class="method-name">
                                <p>Payment with Vnpay</p>
                            </div>
                            <div class="method-icon">
                                <img width="36" src="https://play-lh.googleusercontent.com/DvCn_h3AdLNNDcv3ftqTqP83gw6h65GMEPg3x6u788wB3F3ENNFcHgrHcWJNOPy4epg" alt="">
                            </div>
                        </label>
                    </div>
                </form>

            </div>
        </div>
        <div class="col">
            <div class="checkout-container">
                <div class="view-products">
                    <table class="check-products">
                        @foreach($cartProducts as $cartProduct)
                            @include('front.components.checkout-product-item',compact('cartProduct'))
                        @endforeach
                    </table>
                </div>

                <hr>

                <div class="sub-total">
                    <p>Subtotal <span class="bold">${{$totalCart}}</span></p>
                </div>
                <div class="action-step">
                    <button class="next-step">Continue</button>
                    <a class="prev-step" href="./cart">Back</a>
                </div>
            </div>


        </div>



    </section>
</div>
<script>
    document.querySelector('.next-step').addEventListener('click',function (){
        document.querySelector('#form-payment-method').submit()
    })
    fetch('https://raw.githubusercontent.com/madnh/hanhchinhvn/master/dist/tree.json')
        .then((response) => response.json())
        .then((data) => {
            let el = document.querySelector('.check-address-content')
            let cityID = el.getAttribute('city')
            let districtID = el.getAttribute('district')
            let regionID = el.getAttribute('region')
            let city = data[cityID]['name']
            let district = data[cityID]['quan-huyen'][districtID]['name_with_type']
            let region = data[cityID]['quan-huyen'][districtID]['xa-phuong'][regionID]['name_with_type']
            let content = city+','+district+','+region
            $(el).find('.p-address').text(content)
        })
</script>
</body>
</html>
