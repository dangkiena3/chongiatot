<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

if($login_user_id == 0){
	$rs = '-1';
}else{
	$oldpass = strval($_POST['tbxOldPass']);
	$newpass = strval($_POST['tbxNewPass']);
	$renewpass = strval($_POST['tbxReNewPass']);
	$getpass = Table::Fetch('user',$login_user['id']);
	if(ZUser::GenPassword($oldpass)!=$getpass['password']){
		$rs = '0';
	}else{
		$newpassword = ZUser::GenPassword($newpass);
		$flag = Table::UpdateCache('user',$login_user['id'], array('password'=>$newpassword));
		if($flag) $rs = '1'; else $rs = '-2';
	}
}

echo $rs;