<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
check_login();
$idd = intval($_GET['id']);
	Table::UpdateCache('team_order', $idd, array( 'track' => 4,));
	$rs = '0';
echo $rs;