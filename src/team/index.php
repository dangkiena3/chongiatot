<?php

require_once(dirname(dirname(__FILE__)) . '/app.php');

$daytime = strtotime(date('Y-m-d H:s:i'));

$count_timer = 1000;

$page = $_POST['npage'];

$condition = array(

	'city_id' => array(0, abs(intval($city['id']))),

	"begin_time <= '{$daytime}'",

	"end_time > '{$daytime}'",
);

$group_id = abs(intval($_GET['gid']));

$type = strval($_GET['type']);

if($type) $condition['team_type'] = $type;

if($group_id){

	if(get_type_cate($group_id)=='root') $condition['group_pid'] = $group_id;
	
	else $condition['group_id'] = $group_id;
	
	$title_cate = 'Deal '.get_name_cate($group_id);
	
	$page_type = 'category';
	
	$is_slide = true;	
	
}else{
	
	if($type) $title_cate = $option_teamtype[$type]=='normal'?'Deal giá tốt gần đây':$option_teamtype[$type];
	
	else $title_cate = 'Deal giá tốt gần đây';
	
	$page_type = 'recent';
	
	$is_slide = false;
	
}

$pagetitle = $title_cate;

$count = Table::Count('team', $condition);

$pagesize = $INI['system']['recentteam'];

list($pagesize, $offset, $pagestring) = pagestring($count, $pagesize);

$teams = DB::LimitQuery('team', array(

	'condition' => $condition,

	'order' => 'ORDER BY begin_time DESC, sort_order DESC, id DESC',

	'size' => $pagesize,

	'offset' => $offset,

));


$category = Table::Fetch('category', $group_id);

include template('team_index');

