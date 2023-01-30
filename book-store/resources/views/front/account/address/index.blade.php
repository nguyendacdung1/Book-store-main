@extends('front.layout.master')

@section('title','Address')

@section('body')
<div class="container">
    <section class="mycart">
        <div class="mycart-title">
            <h1><span class="title-bold">Address</span> <span class="title-border">List</span></h1>
            <a href="./account/history">
                <svg xmlns="http://www.w3.org/2000/svg" width="17.5" height="21.5" viewBox="0 0 17.5 21.5">
                    <g id="Icon_feather-file-text" data-name="Icon feather-file-text" transform="translate(-3.25 -1.25)">
                        <path id="Path_515" data-name="Path 515" d="M14,2H6A2,2,0,0,0,4,4V20a2,2,0,0,0,2,2H18a2,2,0,0,0,2-2V8Z" fill="none" stroke="#187498" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                        <path id="Path_516" data-name="Path 516" d="M14,2V8h6" fill="none" stroke="#187498" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                        <path id="Path_517" data-name="Path 517" d="M16,13H8" fill="none" stroke="#187498" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                        <path id="Path_518" data-name="Path 518" d="M16,17H8" fill="none" stroke="#187498" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                        <path id="Path_519" data-name="Path 519" d="M10,9H8" fill="none" stroke="#187498" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                    </g>
                </svg>
            </a>
        </div>
        <div class="mycart-content list-address row">
            @foreach($addresses as $address)
                @include('front.components.address-item',compact('address'))
            @endforeach
            <div class="add-address" style="padding: 12px">
                <a href="./account/address/create" class="add-address-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <g id="Group_562" data-name="Group 562" transform="translate(-214.5 -589.5)">
                            <path id="Path_507" data-name="Path 507" d="M0,0V16" transform="translate(222.5 589.5)" fill="none" stroke="#187498" stroke-width="3"/>
                            <line id="Line_58" data-name="Line 58" x2="16" transform="translate(214.5 597.5)" fill="none" stroke="#187498" stroke-width="3"/>
                        </g>
                    </svg>
                </a>
            </div>
        </div>



    </section>
</div>
@endsection
