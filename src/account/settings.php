<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

need_login();
if ( $_POST ) {
	if($_POST['ward']!="" && $_POST['district']!="" && $_POST['province']!=""){
		$_POST['address'] = $_POST['home_number'].' '.$_POST['street_info'].', '.get_name_local(abs(intval($_POST['ward']))).', '.get_name_local(abs(intval($_POST['district']))).', '.get_name_local(abs(intval($_POST['province'])));
	}
	$update = array(
		'email' => $_POST['email'],
		'username' => $_POST['email'],
		'realname' => $_POST['realname'], 
		'zipcode' => $_POST['zipcode'],
		'mobile' => $_POST['mobile'], 
		'gender' => $_POST['gender'], 
		'address' => $_POST['address'],
		'city_id' => abs(intval($_POST['city_id'])),
		'province_id' => abs(intval($_POST['province'])),
		'district_id' => abs(intval($_POST['district'])),
		'ward_id' => abs(intval($_POST['ward'])),
		'home_num' => $_POST['home_number'],
		'street_info' => $_POST['street_info'],
		'ym' => $_POST['ym'],
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
		Session::Set('notice', 'Cập nhật thành công!');
		redirect( WEB_ROOT . '/account/settings.php ');
	} else {
		Session::Set('error', 'Có lỗi, vui lòng kiểm tra lại thông tin.');
	}
}

$readonly['email'] = defined('UC_API') ? '' : 'readonly';
$readonly['username'] = defined('UC_API') ? 'readonly' : '';

$provinces = DB::LimitQuery('location', array(
		'condition' => array('local' => 'province'),
	));
$provinces = Utility::OptionArray($provinces, 'id', 'name');

$districts = DB::LimitQuery('location', array(
		'condition' => array('local' => 'district','pid'=>$login_user['province_id']),
	));
$districts = Utility::OptionArray($districts, 'id', 'name');

$wards = DB::LimitQuery('location', array(
		'condition' => array('local' => 'ward','pid'=>$login_user['district_id']),
	));
$wards = Utility::OptionArray($wards, 'id', 'name');

$pagetitle = 'Cài đặt tài khoản';
include template('account_settings');
