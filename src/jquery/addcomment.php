<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
if ( $_POST ) {
	
	$table = new Table('ask', $_POST);
	$table->user_id = $login_user_id;
	$table->team_id = $_POST['hdfDealID'];
	$table->content = $_POST['txtCommentContent'];
	$table->create_time = strtotime('now');
	$insert = array('user_id','team_id','type','content','create_time');
	$flag = $table->insert($insert);
	if($flag){
		$vcomment = Table::Fetch('ask',$flag);
	}
}

