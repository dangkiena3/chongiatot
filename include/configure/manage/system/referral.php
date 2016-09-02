<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
need_manager();

$count = Table::Count('website');
list($pagesize, $offset, $pagestring) = pagestring($count, 20);
$methods = DB::LimitQuery('website', array(
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

include template('manage_system_referral');
