<?php

//Đăng ký thông tin tên miền cho mã code
//code by mrnhan108@gmail.com

require_once(dirname(__FILE__). '/app4ls.php');
$license_reg = Table::Fetch('license', '1');
if(!empty($license_reg)&&$_SERVER['SERVER_NAME']=='localhost') redirect( WEB_ROOT . '/register_success.php' );
if(is_post()){
	if($_POST['register']){
		if(empty($_POST['name_info']) || empty($_POST['serial_info'])){
			Session::Set('notice', "Bạn chưa nhập đầy đủ thông tin!");
			redirect( WEB_ROOT. "/register.php");
		}
		$insert	=	array('name','domain','time_create','key_license','pass_code');
		$table	=	new Table('license',$_POST);
		$table->time_create	=	strtotime('now');	
		$table->name	    =	$_POST['name_info'];
		$key_license        = $_POST['serial_info'];
		$table->key_license = $key_license;
		$table->domain	    =	md5($_SERVER['SERVER_NAME']);
		for ($i = 1; $i < LICENSE_LOOP; $i++) {$pass_code = md5($pass_code);}
		$table->pass_code = $pass_code;
		$newlicense	=	$table->insert($insert);
		if(!empty($newlicense)) {
			Session::Set('notice', "Đăng ký thành công!");
			header("location: /register_success.php");
			
		}
	}
}
include template('manage_license_register');