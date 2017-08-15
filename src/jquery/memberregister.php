<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
//code by mrnhan108@gmail.com
$fullname = $_POST['FullName_s'];
$email = $_POST['Email_s'];
$pass = $_POST['Password_s'];
$repass = $_POST['RePassword_s'];
$gender = $_POST['Gender_b'];
$birthday = strtotime($_POST['ddlRegistBirthday'].'/'.$_POST['ddlRegistBirthMonth'].'/'.$_POST['ddlRegistBirthYear']);
$province = $_POST['Province'];
$district = $_POST['DistrictID_s'];
$ward = $_POST['WardID_s'];
$address = $_POST['Address_s'];
$mobile = $_POST['Mobile_s'];
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
	if ( $user_id = ZUser::Create($user) ) {
		$rs = '1';
		if ( option_yes('emailverify') ) {
			mail_sign_id($user_id);
			Session::Set('unemail', $email);
		} else {
			ZLogin::Login($user_id);
		}
	} 
	else {
		$rs = '0';
	}
}

//return
echo $rs;

