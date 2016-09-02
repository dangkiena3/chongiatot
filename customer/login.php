<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
if ( $_POST ) {
	$login_user = ZUser::GetLogin($_POST['emailLogin'], $_POST['passwordLogin']);
	if ( !$login_user ) {
		echo '0';
	} else if (option_yes('emailverify')
			&& $login_user['enable']=='N'
			&& $login_user['secret']
			) {
		Session::Set('unemail', $_POST['email']);
		redirect(WEB_ROOT .'/account/verify.php');
	} else {
		Session::Set('user_id', $login_user['id']);
		if($_POST['chkSavePasswordR']) ZLogin::Remember($login_user);
		else ZLogin::NoRemember($login_user);
		ZUser::SynLogin($login_user['username'], $_POST['password']);
		ZCredit::Login($login_user['id']);
		echo $login_user['email'].'*'.$login_user['name'];
	}
}else echo '0';
