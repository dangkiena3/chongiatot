<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$coupon_code = $_POST['coupon_code'];

$coupons = Table::Fetch('membercoupon',$coupon_code,'code');

if($coupons) $rs = '1**Sử dụng mã Coupon này bạn được trừ <strong style="color:red">'.formatMoney($coupons['cost']).'</strong> đ từ tổng tiền đặt hàng.';
else $rs = '0**Mã coupon không hợp lệ vui lòng nhập lại hoặc để trống khi thanh toán';

echo $rs;