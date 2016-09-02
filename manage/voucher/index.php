<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
/**
 * show voucher serial
 */
need_manager();
$action = $_GET['action'];
$user_id	=	abs(intval($_GET['user_id']));
$team_id	=	abs(intval($_GET['team_id']));

$condition = array();
$status = abs(intval($_GET['status']));
$get_oder_code = abs(intval($_GET['ordercode']));
$get_serial_number = $_GET['serial'];
$fromday = strval($_GET['pbday']);
$today	 = strval($_GET['peday']);

if($status==4) { $condition['istatus'] = 2; } // canced
if($status==3) { $condition['iused'] = 1; $condition['istatus']=1;} // not used
if($status==2) { $condition['iused'] = 2; $condition['istatus']!=2;} // used

if($get_oder_code){
	$filter = array('code'=>$get_oder_code);
	$orders = DB::LimitQuery('order', array('condition'=>$filter));
	$orderIDs = Utility::GetColumn($orders, 'id');
	$condition['order_id'] = $orderIDs;
}

if($get_serial_number) { $condition['serial'] = $get_serial_number; }

if ($fromday) { 
	$fromDays = strtotime($fromday);
	$condition[] = "create_date >= '{$fromDays}'";
}
if ($today) { 
	$toDays = strtotime($today);
	$condition[] = "create_date <= '{$toDays}'";
}




if(!empty($user_id)){ $condition['user_id'] = $user_id; }
if(!empty($team_id)){ $condition['team_id'] = $team_id; }
$count = Table::Count('voucher', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 100);
$voucher = DB::LimitQuery('voucher', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

$order_codes = Utility::GetColumn($voucher, 'order_id');
$order_code = Table::Fetch('order', $order_codes);
foreach($order_code AS $order_code_array=>$one){
	$order_code[$order_code_array] = $one;
}

$user_ids	=	Utility::GetColumn($voucher, 'user_id');
$user = Table::Fetch('user', $user_ids);
foreach ($user as  $user_array=>$one){
	$user[$user_array]=$one;
}
//---------------- download fie -----------------
if($action=='download'){
	$xlsCols = array(
		'user_id'=>'Customer/Mobile',
		'code'=>'Order Code',
		'serial'=>'Serial',
		'create_date'=>'Date',
		'istatus'=>'Status'
	);
	$evoucher = array();
	foreach ($voucher as $one){
		$oneVoucher = $teams[$one['team_id']];
		$oneOrderCode = $order_code[$one['order_id']];
		$one['team_id']=$oneVoucher['title'];
		$one['user_id']=$user[$one['user_id']]['realname'] ."/". $user[$one['user_id']]['mobile'];
		$one['create_date'] = date('d-m-Y',$one['create_date']);
		$one['code'] = $oneOrderCode['code'];
		if($one[istatus]==2) { $one['istatus']="Đã hủy"; }
		if($one[istatus]==1 & $one['iused']==1) { $one['istatus']="Chưa sử dụng"; }
		if($one['iused']==2) { $one['istatus']="Đã sử dụng"; }
		$evoucher[] = $one;
	}
	
	down_xls($evoucher, $xlsCols, '13');
}
//-------------------end download----------------
include template('manage_voucher_index');
?>