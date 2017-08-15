<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

need_manager();

$action = strval($_GET['action']);
$id = abs(intval($_GET['id']));

if ('thanhtoan' == $action) {
	need_auth('order');
	$order = Table::Fetch('order', $id);
	Table::UpdateCache('order',$id, array('state'=>'pay','order_state'=>'confirmed'));
	$user = Table::Fetch('user', $order['user_id']);
	$team = Table::Fetch('team', $order['team_id']);
	$team_orders = DB::LimitQuery('team_order', array(
		'condition' => array('order_id'=>$id),
	));
	foreach($team_orders as $one){
		accept_pay($one['order_id'], $one['team_id']);
	}
	//create voucher serial random
	$voucher = array();
	$voucher['order_id']=	$id;
	$voucher['user_id']	=	$user['id'];
	$voucher['team_id']	=	$team['id'];
	$voucher['create_date']	=	time();
	$voucher['iused']	=	1;
	$quantity	=	abs(intval($_GET['quantity']));
	for($i=1; $i<=$quantity; $i++){
		$voucher['serial']	=	($i. rand(1000000, 9999999). $id);
		$insert = array('order_id','user_id','team_id','serial','create_date','iused');
		$table = new  Table('voucher', $voucher);
		$table->Insert($insert);
	}
	// thông báo đến khách hàng tình trạng hóa đơn đã thanh toán
	//mail_dathang($id);
	Session::Set('notice', "Thanh toán thành công, đã gửi email đến địa chỉ {$user['email']}");
	json(null, 'refresh');
}
elseif ('giaohang' == $action) {
	need_auth('order');
	$order = Table::Fetch('order', $id);
	if($order['state']=='unpay'){
		$team_orders = DB::LimitQuery('team_order', array(
			'condition' => array('order_id'=>$id),
		));
		foreach($team_orders as $one){
			accept_pay($one['order_id'], $one['team_id']);
		}
	}
	$rs = Table::UpdateCache('order',$id, array('state'=>'pay','order_state'=>'success','ship_state'=>'Y'));
	if ($rs){
		Session::Set('notice', "Đơn hàng đã chuyển sang trang thái thành công, đã giao hàng, đã thanh toán");
		//mail_dathang($id);
		json(null, 'refresh');
	}
}

elseif ('xacnhan' == $action) {
	need_auth('order');
	$rs = Table::UpdateCache('order',$id, array('order_state'=>'confirmed'));
	if ($rs){
		Session::Set('notice', "Bạn đã xác nhận đơn hàng số {$id} thành công");
		//mail_dathang($id);
		json(null, 'refresh');
	}
}
elseif ('huy' == $action) {
	need_auth('order');
	$rs = Table::UpdateCache('order',$id, array('order_state'=>'cancel'));
	if ($rs){
		Session::Set('notice', "Bạn đã hủy đơn hàng số {$id} thành công");
		json(null, 'refresh');
	}
}

elseif ('xacnhan_vmarket' == $action) {
	//need_auth('order');
	$rs = Table::UpdateCache('vmarket',$id, array('state'=>'confirmed'));
	if ($rs){
		Session::Set('notice', "Bạn đã xác nhận tin rao số {$id} thành công");
		json(null, 'refresh');
	}
}
elseif ('huy_vmarket' == $action) {
	//need_auth('order');
	$rs = Table::UpdateCache('vmarket',$id, array('state'=>'cancel'));
	if ($rs){
		Session::Set('notice', "Bạn đã xác nhận tin rao số {$id} thành công");
		json(null, 'refresh');
	}
}


