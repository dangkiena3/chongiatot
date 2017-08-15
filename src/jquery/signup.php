<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
if(!empty($_SESSION['user_id'])) redirect((WEB_ROOT . '/account/settings.php'));
if ( $_POST ) {
	if (empty($_SESSION['captcha']) || trim(strtolower($_POST['captcha'])) != $_SESSION['captcha']) {
		Session::Set('error', 'Đăng ký không thành công, Mã xác nhận không chính xác!');
    } else {
		if($_POST['address']==""){
			$_POST['address'] = $_POST['home_number'].' '.$_POST['street_info'].', '.get_name_local(abs(intval($_POST['ward']))).', '.get_name_local(abs(intval($_POST['district']))).', '.get_name_local(abs(intval($_POST['province'])));}
		$u = array();
		$u['username'] = strval($_POST['email']);
		$u['password'] = strval($_POST['password']);
		$u['email'] = strval($_POST['email']);
		$u['realname']	=	strval($_POST['realname']);
		$u['mobile']	=	strval($_POST['mobile']);
		$u['address'] =  strval($_POST['address']);
		$u['gender'] = strval($_POST['gender']); 
		$u['ym'] = strval($_POST['ym']); 
		$u['city_id'] = isset($_POST['city_id']) ? abs(intval($_POST['city_id'])) : abs(intval($city['id']));
		$u['province_id'] = abs(intval($_POST['province']));
		$u['district_id'] = abs(intval($_POST['district']));
		$u['ward_id'] = abs(intval($_POST['ward']));

		//$u['mobile'] = strval($_POST['mobile']);
	
		if ( $_POST['subscribe'] ) { 
			ZSubscribe::Create($u['email'], abs(intval($u['city_id']))); 
		}
		if ( ! Utility::ValidEmail($u['email'], true) ) {
			Session::Set('error', 'Email không hợp lệ.');
			redirect( WEB_ROOT . '/account/signup.php');
		}
		if ($_POST['password2']==$_POST['password'] && $_POST['password']) {
			if ( option_yes('emailverify') ) { 
				$u['enable'] = 'N'; 
			}
			if ( $user_id = ZUser::Create($u) ) {
				if ( option_yes('emailverify') ) {
					mail_sign_id($user_id);
					Session::Set('unemail', $_POST['email']);
					redirect( WEB_ROOT . '/account/signuped.php');
				} else {
					ZLogin::Login($user_id);
					redirect(get_loginpage(WEB_ROOT . '/index.php'));
				}
			} else {
				$au = Table::Fetch('user', $_POST['email'], 'email');
				if ( $au ) {
					Session::Set('error', 'Email này đã được sử dụng, vui lòng chọn email khác.');
				} else {
					Session::Set('error', 'Đăng ký không thành công, tên đăng nhập không hợp lệ');
				}
			}
		} else {
			Session::Set('error', 'Đăng ký không thành công, mật khẩu không chính xác!');
		}
    }

}

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

$pagetitle = 'Đăng ký tài khoản';
include template('account_signup');
