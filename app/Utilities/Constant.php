<?php

namespace App\Utilities;

class Constant {
    //Hang so dung chung toan he thong

    //Order
    const order_status_Unconfirmed = 1;
    const order_status_Confirmed = 2;
    const order_status_Paid = 3;
    const order_status_Processing = 4;
    const order_status_Shipping = 5;
    const order_status_Finish = 6;
    const order_status_Cancel = 0;
    public static $order_status = [
        self::order_status_Unconfirmed => 'Chờ xác nhận',
        self::order_status_Confirmed => 'Đã xác nhận',
        self::order_status_Paid => 'Đã thanh toán',
        self::order_status_Processing => 'Đang chuẩn bị',
        self::order_status_Shipping => 'Đang giao',
        self::order_status_Finish => 'Đã giao',
        self::order_status_Cancel => 'Huỷ đơn',
    ];

    //User
    const user_role_host = 0;
    const user_role_admin = 1;
    const user_role_client = 2;
    public static $user_role = [
        self::user_role_host => 'host',
        self::user_role_admin => 'admin',
        self::user_role_client => 'client'
    ];
}