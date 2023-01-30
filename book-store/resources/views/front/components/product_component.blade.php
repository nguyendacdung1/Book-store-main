<div class="product">
    <div class="product-img">
        <div class="view-full">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                <path id="Icon_material-zoom-out-map" data-name="Icon material-zoom-out-map" d="M25.833,4.5l4.089,4.089-5.138,5.1,2.524,2.524,5.1-5.138L36.5,15.167V4.5ZM4.5,15.167l4.089-4.089,5.1,5.138,2.524-2.524-5.138-5.1L15.167,4.5H4.5ZM15.167,36.5l-4.089-4.089,5.138-5.1-2.524-2.524-5.1,5.138L4.5,25.833V36.5ZM36.5,25.833l-4.089,4.089-5.1-5.138-2.524,2.524,5.138,5.1L25.833,36.5H36.5Z" transform="translate(-4.5 -4.5)"/>
            </svg>
        </div>
        <img class="img" src="./front/imgs/products/{{$product->productImages[0]->path}}" alt="">
        <div class="wrap-book">
            <div class="book">
                <div class="flipbook">
                    <div class="hard" >
                        <img  src="./front/imgs/products/{{$product->productImages[0]->path}}" width="100%" alt="">
                    </div>
                    <div class="hard" style="background: url('./front/imgs/products/{{$product->productImages[1]->path}}'); background-size: cover;"></div>
                    <div>
                        <img src="./front/imgs/products/{{$product->productImages[2]->path}}" alt="">
                    </div>
                    <div>
                        <img src="./front/imgs/products/{{$product->productImages[3]->path}}" alt="">
                    </div>
                    <div>
                        <img src="./front/imgs/products/{{$product->productImages[4]->path}}" alt="">
                    </div>
                    <div>
                        <img src="./front/imgs/products/{{$product->productImages[5]->path}}" alt="">
                    </div>
                    <div class="hard" style="background: #fff; background-size: cover;"></div>
                    <div class="hard" style="background: #fff; background-size: cover;"></div>
                </div>
            </div>

        </div>
    </div>
    <div class="product-content">
        <a href="./shop/product/{{$product->id}}">
            <span class="product-content-title">{{$product->name}}</span>
            <span class="product-content-price">${{$product->price}}</span>
        </a>
        <button class="add-product" product="{{$product->id}}" price="{{$product->price}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="21.588" height="20.663" viewBox="0 0 21.588 20.663">
                <g id="Group_560" data-name="Group 560" transform="translate(-5.8 -12.168)">
                    <g id="Icon_feather-shopping-cart" data-name="Icon feather-shopping-cart" transform="translate(6.425 12.793)">
                        <path id="Path_5" data-name="Path 5" d="M6.25,13.125a.625.625,0,1,1-.625-.625A.625.625,0,0,1,6.25,13.125Z" transform="translate(1.681 5.663)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25"/>
                        <path id="Path_6" data-name="Path 6" d="M13.125,13.125A.625.625,0,1,1,12.5,12.5.625.625,0,0,1,13.125,13.125Z" transform="translate(5.963 5.663)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25"/>
                        <path id="Path_7" data-name="Path 7" d="M.625.625h3.7L6.8,14.607a1.916,1.916,0,0,0,1.849,1.681h8.986a1.916,1.916,0,0,0,1.849-1.681l1.479-8.761H5.247" transform="translate(-0.625 -0.625)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25"/>
                    </g>
                    <line id="Line_4" data-name="Line 4" x2="4" transform="translate(17 22.7)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="1"/>
                    <line id="Line_5" data-name="Line 5" y2="4" transform="translate(19 20.7)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="1"/>
                </g>
            </svg>
        </button>


    </div>
</div>
