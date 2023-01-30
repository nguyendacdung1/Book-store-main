@extends('front.layout.master')

@section('title','Address')

@section('body')
<div class="container">
    <section class="mycart">
        <div class="mycart-title">
            <h1><span class="title-bold">New</span> <span class="title-border">Address</span></h1>
            <a class="back-link" href="./account/address">Back</a>
        </div>
        <div class="mycart-content new-address">

            <form action="./account/address" id="new-address" method="post">
                @if(session('notification'))
                    <p class="text-danger" style="text-align: center">{{session('notification')}}</p>
                @endif
                @csrf
                @method('POST')
                <div class="row-1">
                    <input type="text" class="fullname info-item" name="full_name" placeholder="Full name" required>
                    <input type="text" class="phone info-item" name="phone" placeholder="Phone number" required>
                </div>
                <input type="email" class="info-item" placeholder="Email" name="email" required>
                <select name="city" id="city" class="info-item">
                    <option value="1">Hà Nội</option>
                    <option value="2">Thái Bình</option>
                </select>
                <select name="district" id="district" class="info-item">
                    <option value="1">Thái Thụy</option>
                    <option value="2">Thái Thủy</option>
                </select>
                <select name="ward" id="region" class="info-item" required>
                    <option value="1">Thụy Dũng</option>
                    <option value="2">Thụy Hồng</option>
                </select>
                <textarea required name="describe" id="address" class="info-item"></textarea>
                <div class="row-2">
                    <input name="default" type="checkbox" id="default-address-new">
                    <label for="default-address-new">Đặt làm địa chỉ mặc định</label>
                </div>

                <button>Save</button>
            </form>



        </div>

    </section>
</div>
@endsection
