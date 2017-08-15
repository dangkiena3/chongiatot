<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

if (is_post()) {
	$user = Table::Fetch('user', strval($_POST['email']), 'email');
	if ( $user ) {
		$user['recode'] = $user['recode'] ? $user['recode'] : md5(json_encode($user));
		Table::UpdateCache('user', $user['id'], array(
			'recode' => $user['recode'],
		));
		mail_repass($user);
		Session::Set('reemail', $user['email']);
		redirect( WEB_ROOT .'/user/quen-mat-khau.html?action=ok');
	}
	Session::Set('error', 'Bạn chưa nhập hoặc địa chỉ này không tồn tại trong hệ thống.');
	redirect( WEB_ROOT . '/user/quen-mat-khau.html');
}

$action = strval($_GET['action']);
if ( $action == 'ok') {
	die(include template('account_repass_ok'));
}
$pagetitle = 'Quên mật khẩu?';
include template('account_repass');
