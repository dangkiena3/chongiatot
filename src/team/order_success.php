<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
//need_login();
$id = $_GET['MaDH'];
$count = 0;
$order = DB::LimitQuery('order', array(
		'condition' => array(
			'order_code' => $id,
		),
		'one' => true,
	));
if ($order['id']<1) { 
	redirect(WEB_ROOT);
}	
$team_orders = DB::LimitQuery('team_order', array(
	'condition' => array('order_id'=>$order['id']),
	'order' => 'ORDER BY id DESC',
));

$page_type = 'order_success';

include template('team_order_success');
