<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$team_id = intval($_POST['frdostid']);
$page = intval($_POST['frdostpid']);
$tab = intval($_POST['frdosttid']);
$now = time();
$daytime = time();
$team = Table::Fetch('team', $team_id);

$count_timer2 = 3000;

$condition = array("begin_time <= '$now'","end_time > '$now'",);

if ($tab == 2)
	$orderby = 'ORDER BY now_number DESC';
elseif ($tab == 3)
	$orderby = 'ORDER BY id DESC';
else{
	$orderby = '';
	$condition[] = "id <> '$team_id'";
	if(get_type_cate($team['group_id'])=='root') 
		$condition['group_pid'] = $team['group_id'];
	else 
		$condition['group_id'] = $team['group_id'];

}

$pagesize = $INI['system']['other_cate_item'];

//$pagesize = 1;

$count = Table::Count('team', $condition);

$maxpage = ($count-$count%$pagesize)/$pagesize + 1;

$offset = $pagesize*($page-1);
	
$deal_others = DB::LimitQuery('team',array(
	'condition' => $condition,
	'order' => $orderby,
	'size' => $pagesize,
	'offset' => $offset,
));

include template('team_detail_listdeal');
