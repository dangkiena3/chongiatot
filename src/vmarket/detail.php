<?php

//code by mrnhan108@gmail.com

require_once(dirname(dirname(__FILE__)). '/app.php');

$id = abs(intval($_GET['id']));
if (!$id || !$vmarket = Table::FetchForce('vmarket', $id) ) {
	redirect( WEB_ROOT . '/vmarket/index.php');
}
//team view count
if($id && $vmarket){
	$time_die = 1*60*60;
	$view_id = 'view_market_'.$id;
	if(cookieget($view_id)==''){
		//increase view
		$views = $vmarket['view'] + 1;
		Table::UpdateCache('vmarket', $id, array('view' => $views));
		//set cookie
		cookieset($view_id, $id, $time_die);
	}
}
/*$vothers = DB::LimitQuery('vmarket', array(
	'condition' => array("id <> '$id'", 'state'=>'confirmed'),
	'order' => 'ORDER BY view DESC, id DESC',
	'size' => $INI['system']['vmarket_other_item'],
));*/

$cmt_cond = array('vmarket_id'=>$id);
$vcmt_total = Table::Count('vmarket_cmt',$cmt_cond);
$vcomments = DB::LimitQuery('vmarket_cmt',array(
	'condition' => $cmt_cond,
	'order' => 'ORDER BY create_time ASC, id ASC',
));


$user = Table::Fetch('user', $vmarket['user_id']);

$users = DB::LimitQuery('user');

$pagetitle = $vmarket['title'].' - Chợ voucher';

$page_type = 'vmarket';

$seo_keyword = $vmarket['seokey'];

include template('vmarket_detail');

