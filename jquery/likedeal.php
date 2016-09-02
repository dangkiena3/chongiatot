<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$id = intval($_GET['id']);

//check favourite
if($login_user_id==0)
	$rs = '-1';
else{
	$favs = DB::LimitQuery('favourite', array('condition'=>array('team_id'=>$id,'user_id'=>$login_user_id)));
	if($favs) 
		$rs = '2';
	else{
		//add favourite
		$insert = array('user_id','team_id');
		$table = new Table('favourite',$_POST);
		$table->user_id = $login_user_id;
		$table->team_id = $id;
		$newfav = $table->insert($insert);
		if($newfav) $rs = '1';
	}
}

//return
echo $rs;