<?php

//code by mrnhan108@gmail.com

require_once(dirname(dirname(__FILE__)). '/app.php');

$type = $_GET['type'];
$condition = array('state' => 'confirmed');
if($type) $condition['vtype'] = $type;
$count = Table::Count('vmarket', $condition);

$pagesize = $INI['system']['vmarketiteam'];

list($pagesize, $offset, $pagestring) = pagestring($count, $pagesize);

$vms = DB::LimitQuery('vmarket', array(
	'condition' => $condition,
	'order' => 'ORDER BY create_time DESC, id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

$pagetitle = 'Chợ Voucher';

$page_type = 'vmarket';

include template('vmarket_index');

