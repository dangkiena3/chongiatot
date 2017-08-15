<?php
require_once(dirname(__FILE__) . '/app.php');
$condition = array();
$condition[]="zone='city'";
$category = DB::LimitQuery('category', array(
	'condition' => $condition,
	'order' => 'ORDER BY id ASC',
));
$pagetitle = 'Nhận thông tin sản phẩm mỗi ngày.';
include template('steps');
