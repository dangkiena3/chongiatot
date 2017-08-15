<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
check_login();
	$id = abs(intval($_POST['idd']));
	$oid = abs(intval($_POST['myorder_id']));
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
	$rs = 0;
	}
	else
	$rs = 1;
echo $rs;