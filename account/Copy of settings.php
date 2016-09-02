<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

need_login();
if ( $_POST ) {
	$update = array(
		'email' => $_POST['email'],
		'username' => $_POST['username'],
		'realname' => $_POST['realname'], 
		'zipcode' => $_POST['zipcode'],
		'address' => $_POST['address'],
		'mobile' => $_POST['mobile'], 
		'gender' => $_POST['gender'], 
		'city_id' => abs(intval($_POST['city_id'])),
		'qq' => $_POST['qq'],
		'dist' => $_POST['dist_id']."-".$_POST['ward_id'],
		'address'=> $_POST['street_name'],
		'birthday'=> $_POST['dob_d']."-".$_POST['dob_m']."-".$_POST['dob_y'],
		'house_no'=> $_POST['house_number'],
		'room'=> $_POST['note_address'],
	);
	$avatar = upload_image('upload_image',$login_user['avatar'],'user');
	$update['avatar'] = $avatar;

	if ( $_POST['password'] == $_POST['password2']
			&& $_POST['password'] 
			&& strtolower(md5($email)) != 'f7e0dcf82fd5d444b11cb42db2a8da3e' ) 
	{
		$update['password'] = $_POST['password'];
	}

	if ( ZUser::Modify($login_user['id'], $update) ) {
		Session::Set('notice', 'Cập nhật thông tin thành công');
		redirect( WEB_ROOT . '/account/settings.php ');
	} else {
		Session::Set('error', 'Có lỗi, vui lòng kiểm tra lại');
	}
}

$readonly['email'] = defined('UC_API') ? '' : 'readonly';
$readonly['username'] = defined('UC_API') ? 'readonly' : '';

$pagetitle = 'Thiết lập tài khoản';
include template('account_settings');
