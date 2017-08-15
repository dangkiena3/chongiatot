<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

check_login();

$update = array('avatar'=>NULL);

if(ZUser::Modify($login_user['id'], $update))
	echo '1**no_avatar.png';
else 
	echo '0';
