<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
need_login();
$orderID = abs(intval($_GET['order_id']));
$teamID = abs(intval($_GET['team_id']));
$httt = $_GET['tt'];
$bankID = abs(intval($_GET['bank']));

if($orderID){
	$donhang = Table::Fetch('order',$orderID);
	if($donhang['id']){
		if($donhang['state']!='unpay'){
			$teamID = $donhang['team_id'];
			$httt = $donhang['service'];
			if ($httt=='ck') { $bankID = $donhang['bankID']; }
		}
		$sanpham = Table::Fetch('team', $donhang['team_id']);
		if($sanpham['delivery']=='express'){
			if($sanpham['fare']>0 && $donhang['quantity']<$sanpham['farefree']){
				// thu phí vận chuyển
				$tongtien	=	formatMoney($sanpham['fare'] + $donhang['price']*$donhang['quantity'],0) ;
			}
		else $tongtien	=	formatMoney($donhang['price']*$donhang['quantity'],0) ;
		}
		$express = ($sanpham['delivery']=='express');
		if ( $express ) { $option_express = Utility::OptionArray(Table::Fetch('category', array('express'), 'zone'), 'id', 'name'); }
		if($bankID){
			$nganhang = Table::Fetch('bank',$bankID);
		}
		switch ($httt) {
			case "ct": $desc_payment	=	"tại công ty";break;
			case "ck": $desc_payment	=	"chuyển khoản";break;
			case "tn": $desc_payment	=	"thu tiền tại nhà";break;
			case "cash": $desc_payment	=	"Bạn chưa chọn cách thanh toán cho đơn hàng này";break;
		}
		if($httt=='cash' && $donhang['state']=='pay') { $desc_payment=NULL; }
		
		
	}
}
include template('order_success');