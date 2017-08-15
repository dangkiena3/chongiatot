<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$fullname = $_POST['fullName'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$gender = $_POST['gioitinh'];
$birthday = strtotime($_POST['ngaysinh'].'/'.$_POST['thangsinh'].'/'.$_POST['namsinh']);
$province = $_POST['province'];
$district = $_POST['district'];
$ward = $_POST['ward'];
$address = $_POST['Address'];
$mobile = $_POST['Phone'];
if(Table::Fetch('user', $email, 'email')){
	$rs = '3';
}else{
	$user = array(
		'realname' => $fullname,
		'email' => $email,
		'username' => $email,
		'password' => $pass,
		'gender' => $gender,
		'birthday' => $birthday,
		'province_id' => $province,
		'district_id' => $district,
		'ward_id' => $ward,
		'address' => $address,
		'mobile' => $mobile,
	);
	ZSubscribe::Create($email, 0);
	//Verify email or not
	if ( option_yes('emailverify') ) { 
		$user['enable'] = 'N'; 
	}
	if($user_id = ZUser::Create($user)) {
		$rs = '1';
		if (option_yes('emailverify')) {
			mail_sign_id($user_id);
			Session::Set('unemail', $email);
		} else {
			ZLogin::Login($user_id);
		}
	} else {
		$rs = '0';
	}
}

//return
echo $rs;

