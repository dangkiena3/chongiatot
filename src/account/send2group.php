<?php
/*
 * send deal to group with address book from google, yahoo ...etc
 */
require_once(dirname(dirname(__FILE__)) . '/app.php');


require '../include/plugin/abimporter/abi.php';
require '../include/plugin/abimporter/recaptchalib.php';
require_once '../include/configure/sendMailtempl.php';

$id = abs(intval($_GET['id']));
$team = $eteam = Table::Fetch('team', $id);
if(empty($id) || empty($team['id'])) redirect( WEB_ROOT . '/index.php' );

$action = $_REQUEST['action'];
if(!isset($action)) $action=NULL;
@set_time_limit (90);
$email  = isset($_POST['email']) ? $email=$_POST['email'] : '';
$pass = isset($_POST['password']) ? $pass=$_POST['password'] : '';
$contactlist = null;
$errmsg = '';

if (!isset($email)) $email='';
if (!isset($pass)) $pass='';

else if (isset($_POST)) {
 	////////////////////////////////////////////////////////
 	//THIS IS THE SECTION TO IMPORT CONTACTS
 	////////////////////////////////////////////////////////
	$validCaptcha = true;
	if (function_exists('recaptcha_check_answer') && isset($privatekey)) {
		if ($_POST["recaptcha_response_field"]) {
			$resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"],
											$_POST["recaptcha_challenge_field"],
											$_POST["recaptcha_response_field"]);
			$validCaptcha = $resp->is_valid;
		}
		else {
			$validCaptcha = false;
		}
	}
	
	if ($validCaptcha) {
		$res = abi_fetch_contacts($email,$pass);
	
		if ($res==_ABI_AUTHENTICATION_FAILED) {
			$errmsg='Sai tên đăng nhập hoặc mật khẩu';
		}
		else if ($res==_ABI_FAILED) {
			$errmsg='Server lỗi';
		}
		else if ($res==_ABI_UNSUPPORTED) {
			$errmsg='Hệ thống không hỗ trợ cho máy chủ Email này';
		}
		else if ($res==_ABI_CAPTCHA_RAISED) {
			$errmsg='Lỗi, thử lại lần nữa nhe';
		}
		else if ($res==_ABI_USER_INPUT_REQUIRED) {
		    //echo 'Need to answer some questions in the webmail service';
		    echo "Lỗi, thử lại lần nữa nhé";
		}
		else if (is_array($res)) {
			$contactlist = $res;
			$contactlist = abi_dedupe_contacts_by_email($contactlist);
			$contactlist = abi_sort_contacts_by_name($contactlist);
		}
		else {
			$errmsg='Lỗi không xác định';
		}
	} else {
		//set the error code so that we can display it
		//$errmsg="Please enter a valid answer to the captcha challenge";
		$errmsg='Lỗi, thử lại lần nữa nhé';
	}
 	
 	////////////////////////////////////////////////////////
}

if (function_exists('recaptcha_check_answer') && isset($privatekey) && isset($privatekey)) {
	$captchaHtml = recaptcha_get_html($publickey);
}
else {
	$captchaHtml = '';
}
if($_POST){
	if(isset($action)){
		$emails = $_REQUEST['check'];
		foreach ($emails as $to) {
			list($to,$name) = split(':::',$to,2);
			// send here ....
			$sForm=$INI['system']['email'];
			$sHeader="From:$sForm \n Reply-To:$sForm \nContent-Type:text/html; charset:utf-8\nContent-Transfer-Encoding: 7bit";	
			$title="Bạn nhận được tin nhắn từ " .  $_POST['sender'];
 			$sMessage = SEND_WHATE_HEAD ."<h1 style='color: #a72f3a'><a href='http://".$_SERVER['HTTP_HOST']."/team.php?id=".$team['id']."'>". $team['title'] ."</a></h1>". SEND_WHATE_DETAIL; 
			mail($to, $title, $sMessage, $sHeader);
			redirect("send2group_success.php?id=".$team['id']."");
		}
	}
}
include template('account_send2group');