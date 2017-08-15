<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('market');

$action = strval($_GET['action']);
$id = abs(intval($_GET['id']));

$r = udecode($_GET['r']);
$cate = strval($_GET['cate']);
$like = strval($_GET['like']);

if ( $action == 'r' ) {
	Table::Delete('redeal', $id);
	redirect($r);
} else if ( $action == 'm' ) {
	Table::UpdateCache('redeal',$id,array('user_id'=>$login_user_id));
	redirect($r);
}

$condition = array();
if ($cate) { $condition['category'] = $cate; }
if ($like) { 
	$condition[] = "content like '%".mysql_escape_string($like)."%'";
}

$count = Table::Count('redeal', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$asks = DB::LimitQuery('redeal', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

$user_ids = Utility::GetColumn($asks, 'user_id');
$users = Table::Fetch('user', $user_ids);

$feedcate = array('suggest'=>'Chuyển khoản', 'seller'=>'Hợp tác');
include template('manage_order_redeal');
