<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table{
            border-collapse : unset;
        }
        td,th{
            text-align: left;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-collapse: separate;
            border-spacing: 0px;
        }
    </style>
</head>
<body>
<p>Xác nhận đơn hàng #{{Auth::id().$order->id}} thành công.Cám ơn bạn đã đặt hàng!</p>
<p>Chúng tôi đang chuẩn bị sách và giao cho bạn trong thời gian sớm nhất.</p>
<p>Chi tiết đơn hàng</p>
<table class="table table-striped">
    <tr>
        <th>Name</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Total</th>
    </tr>
    @foreach($order->orderDetails as $orderDetail)
        <tr>
            <td>{{$orderDetail->product->name}}</td>
            <td>{{$orderDetail->qty}}</td>
            <td>${{$orderDetail->product->price}}</td>
            <td>${{$orderDetail->total}}</td>
        </tr>
    @endforeach
    <tr>
        <th colspan="3" class="bold">Total</th>
        <td>${{$order->orderDetails->sum('total')}}</td>
    </tr>

</table>
</body>
</html>
