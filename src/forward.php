<?php
/**
 * chuyen tiep den trang dich vu cung cap openID cua nguoi dung
 * Kiểm tra đăng nhập và lưu vào data những thông tin của khách hàng: email và họ tên
 */
include 'include/classes/ZForward.class.php';
require_once((dirname(__FILE__)) . '/app.php');
$objopenID = new ZForward();
if(!$objopenID->mode){
	$objopenID->foward($_REQUEST['openID']);
}
else if($objopenID->mode=='cancel')
	echo "nguoi dung huy chung thuc";
else if($objopenID->validate())
{
	$customerinfo = $objopenID->getAttributes();
	$user['username']	=	$customerinfo['contact/email'];
	$user['email']		=	$customerinfo['contact/email'];
	$user['realname']	=	$customerinfo['namePerson'];
	$user['password']	=	md5(md5(rand(1000000, 99999999)));
	$login_user	=	ZUser::Create($user); // return user id
	// neu them thanh cong - email chua duoc dang ky
	if($login_user['id']) {
		$id	= ZUser::GetUser($login_user['id']);
		if($id) {
			Session::Set('user_id', $id['id']);
			ZLogin::Remember($id);
			ZUser::SynLogin($id['username'], $_POST['password']);
			ZCredit::Login($id['id']);
			if(!$id['realname'] || !$id['mobile'] || !$id['address'])
			redirect((WEB_ROOT . '/account/settings.php#contact'));
		}
	}
	else {
		$login_user	=	ZUser::GetUserID($user['email']);
		Session::Set('user_id', $login_user['id']);
		ZLogin::Remember($login_user);
		ZUser::SynLogin($login_user['username'], $_POST['password']);
		ZCredit::Login($login_user['id']);
		if(!$login_user['realname'] || !$login_user['mobile'] || !$login_user['address'])
			redirect((WEB_ROOT . '/account/settings.php#contact'));
		else redirect((WEB_ROOT . '/index.php'));
	}

}
?>