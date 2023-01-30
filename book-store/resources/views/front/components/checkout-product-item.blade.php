<tr>
    <td class="td-img">
        <img src="./front/imgs/products/{{$cartProduct->product->productImages[0]->path}}" alt="">
    </td>
    <td class="td-title">
        {{$cartProduct->product->name}}
    </td>
    <td class="td-qty">
        <span>{{$cartProduct->qty}}</span>
    </td>
    <td class="td-total">
        ${{$cartProduct->qty*$cartProduct->price}}
    </td>
</tr>
