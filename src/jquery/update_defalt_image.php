<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

check_login();

//get post
$avatar = $_POST['rdAvataChoice'];

$update = array('avatar'=>'user/default/'.$avatar);
if(ZUser::Modify($login_user['id'], $update))
	echo '1**'.$avatar;
else 
	echo '0';
