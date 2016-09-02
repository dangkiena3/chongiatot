<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('admin');

$condition = array();
//Start filter
$ftitle = strval($_GET['vtitle']);
if($ftitle) $condition[] = "title LIKE '%".mysql_escape_string($ftitle)."%'";

$femail = strval($_GET['vemail']);
if($femail){
	$vuser = Table::Fetch('vmarket', $femail, 'email');
	if($vuser)
		$condition['user_id'] = $vuser['id'];
	else
		$femail = NULL;
}

$ftype = strval($_GET['vtype']);
if($ftype) $condition['vtype'] = $ftype;

$fstate = strval($_GET['state']);
if($fstate) $condition['state'] = $fstate;

//End filter
$count = Table::Count('vmarket', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);
$vms = DB::LimitQuery('vmarket', array(
	'condition' => $condition,
	'order' => 'ORDER BY create_time DESC, id DESC',
	'size' => $pagesize,
	'offset' => $offset
));

$user_ids = Utility::GetColumn($vms, 'user_id');
$users = Table::Fetch('user', $user_ids);
include template('manage_misc_vmarket');
