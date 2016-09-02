<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
need_login();
$orderID	=	abs(intval($_GET['orderID']));
$order = Table::Fetch('order', $orderID);
if($_SESSION['user_id']==$order['user_id'] && $order['state']=='unpay'){
	if(Table::Delete('order', $orderID)){
		Session::Set('notice', "Đã hủy đơn hàng số {$order['id']}");
		json(null, 'refresh');		
	}
	else {
		Session::Set('notice', "Đơn hàng số {$order['id']} đã được thanh toán nên không thể hủy.<br>Vui lòng đến công ty");
		json(null, 'refresh');	
	}
}
?>