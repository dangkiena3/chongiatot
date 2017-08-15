<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$id = intval($_GET['id']);

//check favourite
if($login_user_id==0)
	$rs = '-1';
else{
	if(Table::Delete('favourite', $id, 'team_id')) 
		$rs = '1';
	else
		$rs = '0';
}

//return
echo $rs;