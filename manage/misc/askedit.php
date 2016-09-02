<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('help');

$id = abs(intval($_GET['id']));
$ask = Table::Fetch('ask', $id);
if (!$ask) {
	redirect( WEB_ROOT . '/manage/misc/ask.php');
}

if ($_POST && $id == $_POST['id'] ) {
	$table = new Table('ask', $_POST);
	$table->user_id = $login_user_id;
	$table->type = 'transfer';
	$table->display = 'Y';
	$table->create_time = strtotime('now');
	$table->content = $_POST['comment'];
	if ($ask['type'] == 'transfer') {
		$table->ask_id = $ask['ask_id'];
		$table->team_id = $ask['team_id'];
	}else{
		$table->ask_id = $id;
		$table->team_id = $ask['team_id'];
	}
	$insert = array('user_id','team_id','ask_id','type','display','content','create_time');
	$flag = $table->insert($insert);
	redirect(udecode($_GET['r']));
}

$team = Table::Fetch('team', $ask['team_id']);
$user = Table::Fetch('user', $ask['user_id']);
include template('manage_misc_askedit');
