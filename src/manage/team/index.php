<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('team');

$now = time();
$condition = array(
	'system' => 'Y',
);

/* filter start */
$ptitle = strval($_GET['ptitle']);
$id = strval($_GET['id']);
if ($id ) {
	$condition['id'] = $id;
}
if ($ptitle ) {
	$condition[] = "title LIKE '%".mysql_escape_string($ptitle)."%'";
}
$team_cate = intval($_GET['teamcate']);
if ($team_cate) {$condition['group_pid'] = $team_cate;}
$acti = strval($_GET['active']);
if ($acti!='') {$condition['active'] = $acti;}
/* filter end */

$count = Table::Count('team', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$teams = DB::LimitQuery('team', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));
$cities = Table::Fetch('category', Utility::GetColumn($teams, 'city_id'));
$groups = Table::Fetch('category', Utility::GetColumn($teams, 'group_id'));

$cates = DB::LimitQuery('cate', array(
		'condition' => array('type' => 'root'),
	));
$cates = Utility::OptionArray($cates, 'id', 'name');

$selector = 'index';
include template('manage_team_index');
