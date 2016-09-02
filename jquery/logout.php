<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
//ob_get_clean();
if(isset($_SESSION['user_id'])) {
	unset($_SESSION['user_id']);
	ZLogin::NoRemember();
	ZUser::SynLogout();
	if($_SESSION['access_token']!=''){
	   session_destroy();
	   unset($_SESSION['access_token']);
	   unset($_SESSION['user_id']);
	   unset($_SESSION['status']);
	   unset($_SESSION);
	   unset($_COOKIE['ru']);
	   unset($_COOKIE['_twitter_sess']);
	   unset($_COOKIE['tz_offset_sec']);
	   unset($_COOKIE['guest_id']);
	   unset($_COOKIE['original_referer']);
	   unset($_COOKIE['_rid']);
	}
	echo '1';
}else echo '0';