<?php

require_once(dirname(dirname(__FILE__)) . '/app.php');

$daytime = strtotime(date('Y-m-d H:s:i'));

$condition = array(

	"begin_time <= '{$daytime}'",

	"end_time > '{$daytime}'",

);

$sk = strval($_GET['sk']);
if($sk=='--Nhập từ khóa--') $sk = '';
$spf = abs(intval($_GET['spf']));
$spt = abs(intval($_GET['spt']));
$sg = strval($_GET['sg']);
$sc = abs(intval($_GET['sc']));

if($spf>$spt){
	$t = $spf;
	$spf = $spt;
	$spt = $t;
}
$spf = $spf==$spt?0:$spf;

if ($sk) {
	$condition[] = "title LIKE '%".mysql_escape_string($sk)."%'"." OR product LIKE '%".mysql_escape_string($sk)."%'";
}
if ($spf>0) $condition[] = "team_price >= '{$spf}'";
if ($spt>0) $condition[] = "team_price <= '{$spt}'";
if(!empty($sg)) $condition['gender'] = $sg;

$count = Table::Count('team', $condition);

$page_size = $INI['system']['searchitem']?$INI['system']['searchitem']:24;

$display_page = $count>$page_size?true:false;

list($pagesize, $offset, $pagestring) = pagestring($count, $page_size);

$searchs = DB::LimitQuery('team', array(

	'condition' => $condition,

	'order' => 'ORDER BY begin_time DESC, sort_order DESC, id DESC',

	'size' => $pagesize,

	'offset' => $offset,

));

$category = Table::Fetch('category', $group_id);

$pagetitle = 'Kết quả tìm kiếm';

$page_type = 'search';

include template('team_search');
