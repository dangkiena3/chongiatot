<?php

require_once(dirname(dirname(__FILE__)) . '/app.php');

$carts = $_SESSION['cart'];
//get POST
$fullname = $_POST['FullName'];
$mobile = $_POST['tbxPhone'];
$address = $_POST['tbxAddressDelivery'];
$province_id = $_POST['Province'];
$district_id = $_POST['District'];
$ward_id = $_POST['Ward'];
$web_id = getSession();
$note = $_POST['tbxNote'];
$captcha = $_POST['tbxCaptchaOrder'];
$paynote = $_POST['PaymentNote'];
$total_price = abs(intval($_POST['hdTotalPrice']));
$ship_cost = abs(intval($_POST['hdpaymentCost']));
$quantity = $_POST['hdTotalQuantity'];
$usemoney = abs(intval($_POST['cbUseCmoney']));
$method_id = $_POST['PayMenthod'];
$couponcode = $_POST['tbccoupon_code'];
$order_code = rand_order_code('MB',2,3);
//use coupon
if($couponcode){
	$coupons = Table::Fetch('membercoupon',$couponcode,'code');
	$card = abs(intval($coupons['cost']));
}else{
	$card = 0;
}
$all_price = $total_price + $ship_cost - $card;
$paystate = 'unpay';
//use money
if($usemoney>=$all_price){
	$money = $all_price;
	$r_money = $usemoney - $all_price;
	$paystate = 'pay';
	
}else{
	$money = $usemoney;
	$r_money = 0;	
}
//update money for user
Table::UpdateCache('user', $login_user_id, array('money'=>$r_money,));

$t_order = array();
$t_order['method_id'] = $method_id;
$t_order['user_id'] = $login_user_id;
$t_order['order_code'] = $order_code;
$t_order['state'] = $paystate;
$t_order['quantity'] = $quantity;
$t_order['fullname'] = $fullname;
$t_order['mobile'] = $mobile;
$t_order['province_id'] = $province_id;
$t_order['district_id'] = $district_id;
$t_order['ward_id'] = $ward_id;
$t_order['web_id'] = $web_id;
$t_order['address'] = $address;
$t_order['total_price'] = $total_price;
$t_order['paymoney'] = $money;
$t_order['card'] = $card;
$t_order['fare'] = $ship_cost;
$t_order['remark'] = $note;
$t_order['create_time'] = strtotime('now');

//insert row
$table = new Table('order', $t_order);

$insert = array(
	'method_id', 'user_id', 'order_code', 'state', 'quantity', 'mobile', 'province_id', 
	'district_id','ward_id', 'address', 'paymoney', 'total_price', 'card', 'fare', 'remark', 'create_time','fullname','web_id',
);
$flag = $table->Insert($insert);
if($flag){
	foreach($carts as $one){
		$o_team = array();
		$o_team['team_id'] = intval(substr($one['deal_info'],0,-1));
		$o_team['info_id'] = intval(substr($one['deal_info'],-1));
		$orders = Table::Fetch('order',$order_code,'order_code');
		$order_id = $orders['id'];
		$order_code = $orders['order_code'];
		$o_team['order_id'] = $order_id;
		$o_team['quantity'] = $one['quantity'];
		$ins = array('team_id', 'order_id', 'quantity','info_id');
		$table1 = new Table('team_order',$o_team);
		$table1->Insert($ins);
		//increase quantity team
		$team = Table::Fetch('team',$o_team['team_id']);
		$now_number = $team['now_number'] + $one['quantity'];
		Table::UpdateCache('team', $team['id'], array('now_number'=>$now_number,));
	}
	$_SESSION['cart'] = array();
	mail_dathang($order_id);
	redirect(WEB_ROOT."/DonHang?MaDH={$order_code}");
}else{
	$_SESSION['cart'] = array();
	redirect(WEB_ROOT."/");
}
