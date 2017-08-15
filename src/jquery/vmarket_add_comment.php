<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
if ( $_POST ) {
	$insert = array('user_id','vmarket_id','pid','type','content','create_time');
	$table = new Table('vmarket_cmt', $_POST);
	$table->user_id = $login_user_id;
	$table->create_time = strtotime('now');
	$flag = $table->insert($insert);
	if($flag){
		$vcomment = Table::Fetch('vmarket_cmt',$flag);
	}
}

include template('jquery_add_comment');
