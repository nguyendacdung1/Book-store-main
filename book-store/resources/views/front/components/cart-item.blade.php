<tr class="tr-product">
    <th>
        <div class="row-product-item">
            <a style="display: flex;align-items: center" href="#">
                <img src="./front/imgs/products/{{$cart_product->product->productImages[0]->path}}" alt="">
                <span class="d-none d-lg-block">{{$cart_product->product->name}}</span>
            </a>
        </div>
    </th>
    <th class="th-price">
        ${{$cart_product->product->price}}
    </th>
    <th>
        <div class="control-qty">
            <button class="btn-control control-reduce">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="2" viewBox="0 0 10 2">
                    <line id="Line_11" data-name="Line 11" x2="10" transform="translate(0 1)" fill="none" stroke="#000" stroke-width="2"/>
                </svg>
            </button>
            <span>{{$cart_product->qty}}</span>
            <form action="./cart/update" method="post" class="d-none">
                @csrf
                @method('PUT')
                <input type="number" name="id" value="{{$cart_product->id}}" hidden>
                <input class="save-qty" type="number" name="qty" min="0" value="{{$cart_product->qty}}" hidden>
            </form>

            <button class="btn-control control-increase">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                    <g id="Group_157" data-name="Group 157" transform="translate(-1085.5 -442)">
                        <line id="Line_12" data-name="Line 12" x2="10" transform="translate(1085.5 447)" fill="none" stroke="#000" stroke-width="2"/>
                        <line id="Line_13" data-name="Line 13" y2="10" transform="translate(1090.5 442)" fill="none" stroke="#000" stroke-width="2"/>
                    </g>
                </svg>
            </button>
            <button class="btn-control control-remove" product="{{$cart_product->id}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16.71" height="20.566" viewBox="0 0 16.71 20.566">
                    <path id="Icon_metro-bin" data-name="Icon metro-bin" d="M4.285,7.712V20.566A1.289,1.289,0,0,0,5.57,21.851H17.138a1.289,1.289,0,0,0,1.285-1.285V7.712H4.285ZM8.141,19.28H6.855v-9H8.141Zm2.571,0H9.426v-9h1.285Zm2.571,0H12v-9h1.285Zm2.571,0H14.567v-9h1.285ZM18.745,3.856H14.567V2.249a.967.967,0,0,0-.964-.964H9.1a.967.967,0,0,0-.964.964V3.856H3.963A.967.967,0,0,0,3,4.82V6.427h16.71V4.82a.967.967,0,0,0-.964-.964Zm-5.463,0H9.426V2.587h3.856V3.856Z" transform="translate(-2.999 -1.285)" fill="#9acbd0"/>
                </svg>
            </button>
        </div>
    </th>
    <th class="th-total th-total-item">
        ${{$cart_product->qty*$cart_product->product->price}}
    </th>
</tr>
