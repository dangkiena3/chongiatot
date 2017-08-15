<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

check_login();

$cond_o = array('state'=>'pay', 'order_state'=>'success', 'ship_state'=>'Y', 'user_id'=>$login_user_id);
$orders = DB::LimitQuery('order', array('condition' => $cond_o));
$pay_deal_total = 0;
$save_money_total = 0;
$cmoney_total = 0;
foreach($orders as $order){
	$pay_deal_total+=($order['total_price']+$order['fare']);
	$team_orders = DB::LimitQuery('team_order', array('condition'=>array('order_id'=>$order['id'])));
	foreach($team_orders as $team_order){
		$team = Table::Fetch('team', $team_order['team_id']);
		$save_money_total += ($team['market_price']-$team['team_price'])*$team_order['quantity'];
		$cmoney_total += $team['bonus'];
	}
}

$pagetitle = 'Tài sản của tôi';

$page_type = 'mymoney';

include template('account_money');
