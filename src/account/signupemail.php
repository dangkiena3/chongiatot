<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
if ( $_POST ) {
$user_details = array();
	$user_details = $_SESSION['FB_USER_LOGIN'];
	unset($_SESSION['FB_USER_LOGIN']);
	if ( ! Utility::ValidEmail($_POST['email'], true) ) {
		Session::Set('error', 'Địa chỉ email không hợp lệ');
		Utility::Redirect( WEB_ROOT . '/account/signupemail.php');
	}

	if($user_details) {
		$user_details['email'] = $_POST['email'];
		$user_details['username'] = $_POST['username'];
		$user_details['password'] = $_POST['password'];
		if($user_id = ZUser::Create($user_details)) {
			ZLogin::Login($user_id);
			Utility::Redirect( WEB_ROOT . '/index.php');
		}
	}	
}

include template('signupemail');

?>

