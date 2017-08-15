<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
/**
 * kiem tra neu da dang nhap roi thi chuyen den settings.php
 */
$refer=$_GET['refer'];
echo $refer;
if(!empty($_SESSION['user_id'])) redirect((WEB_ROOT . '/account/settings.php'));
if ( $_POST ) {
	$login_user = ZUser::GetLogin($_POST['email'], $_POST['password']);
	if ( !$login_user ) {
		Session::Set('error', 'Thông tin đăng nhập không hợp lệ: vui lòng kiểm tra lại Email hoặc mật khẩu');
		redirect(WEB_ROOT . '/user/dang-nhap.html');
	} else if (option_yes('emailverify')
			&& $login_user['enable']=='N'
			&& $login_user['secret']
			) {
		Session::Set('unemail', $_POST['email']);
		redirect(WEB_ROOT .'/account/verify.php');
	} else {
		Session::Set('user_id', $login_user['id']);
		ZLogin::Remember($login_user);
		ZUser::SynLogin($login_user['username'], $_POST['password']);
		ZCredit::Login($login_user['id']);
		if(!$login_user['realname'] || !$login_user['mobile'] || !$login_user['address'])
			redirect((WEB_ROOT . '/account/settings.php#contact'));
		else // login ok
		redirect(get_loginpage(WEB_ROOT . $refer));
	}
}
$currefer = strval($_GET['r']);
if ($currefer) { Session::Set('loginpage', udecode($currefer)); }
$pagetitle = 'Đăng nhập';
include template('account_login');
