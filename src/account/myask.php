<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

need_login();

$pagetitle = "My asks";

$condition['user_id'] = $login_user_id;

$count = Table::Count('ask', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 10);
$asks = DB::LimitQuery('ask', array(
			'condition' => $condition,
			'order' => 'ORDER BY id DESC',
			'size' => $pagesize,
			'offset' => $offset,
			));

include template('account_myask');




















