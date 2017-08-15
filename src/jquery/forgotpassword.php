<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$email = strval($_POST['tbxForGotEmail']);
$captcha = strval($_POST['tbxForGotCaptcha']);
if($_SESSION['captcha']!=$captcha)
	$rs = '0';
else{
	$user = Table::Fetch('user', $email, 'email');
	if ($user) {
		$user['recode'] = $user['recode'] ? $user['recode'] : md5(json_encode($user));
		Table::UpdateCache('user', $user['id'], array('recode' => $user['recode']));
		mail_repass($user);
		Session::Set('reemail', $user['email']);
		$rs = '1';
	}else $rs = '0';
}

//return	
echo $rs;