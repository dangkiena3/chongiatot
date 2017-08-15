<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

//get post
$newpass = $_POST['tbxNewPass'];
$renewpass = $_POST['tbxReNewPass'];
$code = $_POST['tbxForGotCode'];
$email = $_POST['tbxEmail'];

$user = Table::Fetch('user', $code, 'recode');
if (!$user) $rs = '0';
else{
	if ($newpass == $renewpass) {
		ZUser::Modify($user['id'], array(
			'password' => $newpass,
			'recode' => '',
		));
		ZUser::Login($user['id']);
		$rs = '1';
	}else $rs = '0';
}

//return 
echo $rs;

