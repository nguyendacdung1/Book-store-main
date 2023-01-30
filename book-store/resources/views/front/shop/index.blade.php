@extends('front.layout.master')

@section('title',request()->segment(2)??'Shop')

@section('body')
    <div class="container">
        <div class="category-product">
            <div class="list-category">
                <ul>
                    <li>
                            <a href="./shop">All product</a>
                    </li>
                    @for($i=0;$i<8;$i++)
                        <li>
                            <a href="./shop/{{$categories[$i]->name}}">{{$categories[$i]->name}}</a>
                        </li>
                    @endfor

                </ul>
            </div>
            <div  class="category-product-bottom" style="margin-left: 40px;margin-bottom: 40px;overflow: hidden;">
                <div class="list-product-title">
                    @if(request()->segment(2)=='')
                        <h1>All Product</h1>
                    @else
                        <h1>{{request()->segment(2)}}</h1>
                    @endif
                    <div class="filter-right">
                        <div class="list-filter">
                            <div class="wrap-list-filter">
                                @if(request('author')!=null && request('author')!=0)
                                    <span>{{$author->name}}</span>
                                @endif

                                <span>${{request('price_min') ?? 1}}-${{request('price_max')??100}}</span>
                            </div>
                        </div>
                        <form action="">
                            <div class="list-product-filter">
                                <div class="toggle-filter">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                        <path id="Icon_awesome-filter" data-name="Icon awesome-filter" d="M19.062,0H.939A.938.938,0,0,0,.276,1.6L7.5,8.826v8.049a.938.938,0,0,0,.4.768l3.125,2.187a.938.938,0,0,0,1.475-.768V8.826L19.724,1.6A.938.938,0,0,0,19.062,0Z" fill="#187498"/>
                                    </svg>
                                </div>
                                <div class="filter-item filer-price">
                                    <div class="filter-wrap"></div>
                                    Price
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="5.207" viewBox="0 0 9.414 5.207">
                                        <path id="Icon_feather-chevron-down" data-name="Icon feather-chevron-down" d="M3,4.5l4,4,4-4" transform="translate(-2.293 -3.793)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                                    </svg>
                                    <div class="change-filter">

                                            <p>Chọn khoảng giá</p>
                                            <div class="d-flex-center">
                                                $<input class="price-from" type="number"  value="{{request('price_min') ?? 1}}" name="price_min" min="0">
                                                -
                                                $<input class="price-to" type="number" value="{{request('price_max') ?? 100}}" name="price_max" max="100" min="0">
                                            </div>
                                            <input type="submit" value="Filter" style="margin-top: 12px;margin-left: 10px">


                                    </div>
                                </div>

                                <div class="filter-item filer-author">
                                    <div class="filter-wrap"></div>
                                    Author
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="5.207" viewBox="0 0 9.414 5.207">
                                        <path id="Icon_feather-chevron-down" data-name="Icon feather-chevron-down" d="M3,4.5l4,4,4-4" transform="translate(-2.293 -3.793)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                                    </svg>
                                    <div class="change-filter">
                                        <p>Chọn tác giả</p>
                                        <select name="author" class="select-author" style="width:100%" onchange="this.form.submit()">
                                            <option value="0">All</option>
                                            @foreach($authors as $author)
                                                <option value="{{$author->id}}" {{ request('author') == $author->id ? 'selected' : '' }}>{{$author->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </form>

                    </div>


                </div>

                <div class="list-product">
                    @if(count($products)>0)
                        @foreach($products as $product)
                            @include('front.components.product_component',compact('product'))
                        @endforeach
                    @else
                        <p>No results found</p>
                    @endif
                </div>
                <div style="margin-top: 40px">
                    {!! $products->links() !!}
                </div>



            </div>

        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('.select-author').select2();

        })
    </script>
@endsection
