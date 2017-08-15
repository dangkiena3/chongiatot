<?php

require_once(dirname(dirname(__FILE__)) . '/app.php');

$daytime = strtotime(date('Y-m-d H:s:i'));

$page = intval($_POST['npage']);

$group_id = intval($_POST['frdost2id']);

$count_timer_recent = 3000;

$condition = array(

	"begin_time <= '{$daytime}'",

	"end_time > '{$daytime}'",
);

if($group_id){

	if(get_type_cate($group_id)=='root') $condition['group_pid'] = $group_id;
	
	else $condition['group_id'] = $group_id;
	
}

$pagesize = $INI['system']['recentteam'];

$count = Table::Count('team', $condition);

$maxpage = intval($count/$pagesize) + 1;

$offset = $pagesize*$page;

$getteams = DB::LimitQuery('team', array(

	'condition' => $condition,

	'order' => 'ORDER BY begin_time DESC, sort_order DESC, id DESC',

	'size' => $pagesize,
	
	'offset' => $offset,

));

include template('get_recent');

