<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$fullname = $_POST['txtNotLoginFullName'];
$email = $_POST['txtNotLogInEmail'];
$pass = $email.'123456';
$gender = $_POST['slNotLogInGender'];
//$birthday = strtotime($_POST['ngaysinh'].'/'.$_POST['thangsinh'].'/'.$_POST['namsinh']);
//$province = $_POST['province'];
//$district = $_POST['district'];
//$address = $_POST['Address'];
$mobile = $_POST['txtNotLogInPhone'];
if(Table::Fetch('user', $email, 'email')){
	$rs = '2';
}else{
	$user = array(
		'realname' => $fullname,
		'email' => $email,
		'username' => $email,
		'password' => $pass,
		'gender' => $gender,
		//'birthday' => $birthday,
		//'province_id' => $province,
		//'district_id' => $district,
		//'address' => $address,
		'mobile' => $mobile,
	);
	ZSubscribe::Create($email, 0);
	//Verify email or not
	if ( option_yes('emailverify') ) { 
		$user['enable'] = 'N'; 
	}
	if($user_id = ZUser::Create($user)) {
		$rs = '1*'.$email;
		//if (option_yes('emailverify')) {
			//mail_sign_id($user_id);
			//Session::Set('unemail', $email);
		//} else {
			ZLogin::Login($user_id);
		}
	} else {
		$rs = '0*'.$email;
	}
}

//return
echo $rs;

