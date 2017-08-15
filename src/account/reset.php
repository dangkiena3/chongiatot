<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$code = $_GET['code'];

if(isset($_SESSION['user_id'])) {
	unset($_SESSION['user_id']);
	ZLogin::NoRemember();
	$login_user = $login_user_id = $login_manager = $login_leader = null;
}

/*$code = strval($_GET['code']);
if ( $code == 'ok' && is_get()) {
	die(include template('account_reset_ok'));
}*/

$user = Table::Fetch('user', $code, 'recode');

if (!$user) redirect( WEB_ROOT . '/');
else $email = $user['email'];

$pagetitle = 'Reset pasword';

$page_type = 'updatepass';

include template('account_reset');
