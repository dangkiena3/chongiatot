<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

check_login();

//get post

$avatars = upload_image('fileAvata',NULL,'user');

if($avatars){
	$update = array('avatar'=>$avatars);
	if(ZUser::Modify($login_user['id'], $update)) 
		$rs = '1**'.$avatars; 
	else 
		$rs = '0**Tải ảnh lên không thành công vui lòng thử lại';
}else{
	$rs = '0**Tải ảnh lên không thành công vui lòng kiểm tra lại file tải lên';
}
//return
echo $rs;

