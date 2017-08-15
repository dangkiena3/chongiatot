<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
$id = intval($_GET['id']);
$teamr_id = 'DealID_'.$id;
$content = 'txtSubComment_'.$id;
if ( $_POST ) {
	$table = new Table('ask', $_POST);
	$table->user_id = $login_user_id;
	$table->ask_id = $_POST[$teamr_id];
	$table->team_id = $_POST['hdfDealID'];
	$table->content = $_POST[$content];
	$table->type = 'transfer';
	$table->create_time = strtotime('now');
	$insert = array('user_id','team_id','ask_id','type','content','create_time');
	$flag = $table->insert($insert);
	if($flag){
		$vcomment = Table::Fetch('ask',$flag);
	}
}

