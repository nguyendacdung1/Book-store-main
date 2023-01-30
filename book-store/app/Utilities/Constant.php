<?php

namespace App\Utilities;

class Constant
{
    const order_status_All = 4;
    const order_status_Cancelled = 3;//Đã hủy
    const order_status_Successful = 2;//Hoàn thành
    const order_status_Delivery = 1;//Đang giao
    const order_status_Prepare = 0;//Chuẩn bị giao hàng

    public static $order_status = [
        self::order_status_All => 'All',
        self::order_status_Cancelled => 'Cancelled',
        self::order_status_Successful=>'Successful',
        self::order_status_Delivery=>'Delivery',
        self::order_status_Prepare=>'Prepare'
    ];

    const user_level_client = 2;
    const user_level_admin = 1;

    public static $user_level = [
        self::user_level_admin => 'Admin',
        self::user_level_client => 'Client'
    ];
}
