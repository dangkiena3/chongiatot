<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('order');
$daytime = strtotime(date('Y-m-d'));

$team_count = Table::Count('team');
$order_count = Table::Count('team_order');
$user_count = Table::Count('user');
$subscribe_count = Table::Count('subscribe');

$order_today_count = Table::Count('team_order', array(
	"order_id IN (SELECT id FROM `order` WHERE create_time > {$daytime})",
));
$moidat = Table::Count('team_order', array(
	"track=0 AND order_id IN (SELECT id FROM `order` WHERE create_time > {$daytime})",
));
$xacnhan = Table::Count('team_order', array(
	"track=1 AND order_id IN (SELECT id FROM `order` WHERE create_time > {$daytime})",
));
$dangiao = Table::Count('team_order', array(
	"track=2 AND order_id IN (SELECT id FROM `order` WHERE create_time > {$daytime})",
));
$dagiao = Table::Count('team_order', array(
	"track=3 AND order_id IN (SELECT id FROM `order` WHERE create_time > {$daytime})",
));
$huy = Table::Count('team_order', array(
	"track=4 AND order_id IN (SELECT id FROM `order` WHERE create_time > {$daytime})",
));
$order_num_today = Table::Count('order', array(
	"create_time > {$daytime}",
),'quantity');
$order_today_pay_count = Table::Count('order', array(
	"create_time > {$daytime}",
	'state' => 'pay',
));
$order_today_unpay_count = $order_today_count - $order_today_unpay_count;

$user_today_count = Table::Count('user', array(
	"create_time > {$daytime}",
));

$income_pay = Table::Count('order', array(
	"create_time > {$daytime}",
	'state' => 'pay',
), 'money');

$income_charge = Table::Count('flow', array(
	"create_time > {$daytime}",
	'action' => 'charge',
), 'money');

$income_store= Table::Count('flow', array(
	"create_time > {$daytime}",
	'action' => 'store',
), 'money');

$income_withdraw = Table::Count('flow', array(
	"create_time > {$daytime}",
	'action' => 'withdraw',
), 'money');

include template('manage_misc_index');
