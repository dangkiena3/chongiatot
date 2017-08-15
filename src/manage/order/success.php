<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('order');

$t_con = array(
	'begin_time < '.time(),
	'end_time > '.time(),
);
$teams = DB::LimitQuery('team', array(
	'condition' => $t_con,
	'order' => 'ORDER BY id DESC',
));
$option_team = Utility::OptionArray($teams, 'id', 'product');
$track = 3;
$titleorder = "ĐH thành công";
$condition = array(
	'track' => $track,
	
);
$current = 'success';
//Start filter
$team_id = abs(intval($_GET['team_id']));
if ($team_id) $condition['team_id'] = $team_id;

$order_id = abs(intval($_GET['order_id']));
if ($order_id) $condition['id'] = $order_id;

$email = strval($_GET['email']);
if ($email) {
	$fuser = Table::Fetch('user', $email, 'email');
	$forder = Table::Fetch('order', $fuser['id'],'user_id');
	$condition[] ="order_id IN(select id from `order` where user_id=$fuser[id])";
}
$mobile = strval($_GET['mobile']);
if ($mobile) {
	$condition[] ="order_id IN(select id from `order` where mobile='$mobile')";
}
$order_code = strval($_GET['order_code']);
if($order_code){
	$condition[] ="order_id IN(select id from `order` where order_code='$order_code')";
}

//End fiter
//tracking
$value = abs(intval($_GET['value']));
$idd = abs(intval($_GET['idd']));
$action = abs(intval($_GET['act']));
if($action=='tracking' && $idd){
	Table::UpdateCache('team_order', $idd, array( 'track' => $value,));
	Session::Set('notice', 'Trạng thái đơn hàng đã được thay đổi');
}
//Edit order
if(is_post()){
	$id = abs(intval($_POST['id']));
	$oid = abs(intval($_POST['order_id']));
	$teamorder = Table::Fetch('team_order', $id);
	$fullname	=	strval($_POST['txtName']);
	$mobile	   =	strval($_POST['txtPhone']);
	$address   =  strval($_POST['txtAddress']);
	$remark   =  strval($_POST['remark']);
	$quantity = abs(intval($_POST['quantity']));
	$province = abs(intval($_POST['thanhpho']));
	$district = abs(intval($_POST['quan']));
	$ward = abs(intval($_POST['phuong']));	
	Table::UpdateCache('team_order', $oid, array(
	'quantity' => $quantity,
	));
	$hdOptionValue = array();
	if(is_array($_POST['clrOpt'])) $hdOptionValue = $_POST['clrOpt'];
	foreach($hdOptionValue as $OptionValue){
	$OptionValue = intval($OptionValue);
	if($OptionValue>0){
			$temp = $OptionValue;
			Table::UpdateCache('team_order', $oid, array(
			'info_id' => $temp,
			));	
	}
	}
	$flag = Table::UpdateCache('order', $id, array(
	'fullname' => $fullname,
	'mobile' => $mobile,
	'remark' => $remark,
	'address' => $address,
	'province_id' => $province,
	'district_id' => $district,
	'ward_id' => $ward,
	));
	if($flag){
	Session::Set('notice', "Đã chỉnh sửa hoàn tất đơn hàng");
	redirect( WEB_ROOT. "/manage/order/index.php");
	}
	else
	Session::Set('error', "Có lỗi không thể cập nhật");
}
$count = Table::Count('team_order', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);
$team_orders = DB::LimitQuery('team_order', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',	
	'size' => $pagesize,
	'offset' => $offset,
));
include template('manage_order_action');