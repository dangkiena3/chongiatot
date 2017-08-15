<?php
function mail_custom($emails=array(), $subject, $message) {
	global $INI;
	$encoding = $INI['mail']['encoding'] ? $INI['mail']['encoding'] : 'UTF-8';
	settype($emails, 'array');

	$options = array(
		'contentType' => 'text/html',
		'encoding' => $encoding,
	);

	$from = $INI['mail']['from'];
	$to = array_shift($emails);
	if ($INI['mail']['mail']=='mail') {
		Mailer::SendMail($from, $to, $subject, $message, $options, $emails);
	} else {
		Mailer::SmtpMail($from, $to, $subject, $message, $options, $emails);
	}
}

function mail_sign($user) {
	global $INI;
	$encoding = $INI['mail']['encoding'] ? $INI['mail']['encoding'] : 'UTF-8';
	if ( empty($user) ) return true;
	$from = $INI['mail']['from'];
	$to = $user['email'];

	$vars = array( 'user' => $user,);
	$message = render('mail_sign_verify', $vars);
	$subject = 'Cám ơn bạn đã đăng ký tài khoản tại '.$INI['system']['sitename'].'， vui lòng xác nhận email';

	$options = array(
		'contentType' => 'text/html',
		'encoding' => $encoding,
	);
	if ($INI['mail']['mail']=='mail') {
		Mailer::SendMail($from, $to, $subject, $message, $options);
	} else {
		Mailer::SmtpMail($from, $to, $subject, $message, $options);
	}
}

//add mail order success!

function mail_order($order){
	global $INI;
	$user = Table::Fetch('user', $order['user_id']);
	$team = Table::Fetch('team', $order['team_id']);
	$encoding = $INI['mail']['encoding'] ? $INI['mail']['encoding'] : 'UTF-8';
	if ( empty($order) ) return true;
	$from = $INI['mail']['from'];
	$to = $user['email'];

	$vars = array( 'order' => $order,);
	$message = render('mail_order', $vars);
	$subject = 'Đặt hàng thành công '.$team['product'].' tại '.$INI['system']['sitename'];

	$options = array(
		'contentType' => 'text/html',
		'encoding' => $encoding,
	);
	if ($INI['mail']['mail']=='mail') {
		Mailer::SendMail($from, $to, $subject, $message, $options);
	} else {
		Mailer::SmtpMail($from, $to, $subject, $message, $options);
	}
}
function mail_dathang($order_id){
	global $INI;
	$order = Table::Fetch('order', $order_id);
	$user = Table::Fetch('user', $order['user_id']);
	//$methods = DB::LimitQuery('shipping_method', array());
    $team_orders = DB::LimitQuery('team_order', array(
    	'condition' => array('order_id'=>$order_id),
        'order' => 'ORDER BY id DESC',
    ));
	$encoding = $INI['mail']['encoding'] ? $INI['mail']['encoding'] : 'UTF-8';
	if ( empty($order) ) return true;
	$from = $INI['mail']['from'];
	$to = $user['email'];

	$vars = array('order' => $order,'user'=>$user,/*'methods'=>$methods,*/'team_orders'=>$team_orders);
	$message = render('mail_dathang', $vars);
	$subject = 'Đặt hàng thành công tại '.$INI['system']['sitename'];

	$options = array(
		'contentType' => 'text/html',
		'encoding' => $encoding,
	);
	if ($INI['mail']['mail']=='mail') {
		Mailer::SendMail($from, $to, $subject, $message, $options);
	} else {
		Mailer::SmtpMail($from, $to, $subject, $message, $options);
	}
}

//end add

function mail_sign_id($id) {
	$user = Table::Fetch('user', $id);
	mail_sign($user);
}

function mail_sign_email($email) {
	$user = Table::Fetch('user', $email, 'email');
	mail_sign($user);
}


function mail_repass($user) {
	global $INI;
	$encoding = $INI['mail']['encoding'] ? $INI['mail']['encoding'] : 'UTF-8';
	if ( empty($user) ) return true;
	$from = $INI['mail']['from'];
	$to = $user['email'];

	$vars = array( 'user' => $user,);
	$message = render('mail_repass', $vars);
	$subject = $INI['system']['sitename'] . ' reset mật khẩu';

	$options = array(
		'contentType' => 'text/html',
		'encoding' => $encoding,
	);
	if ($INI['mail']['mail']=='mail') {
		Mailer::SendMail($from, $to, $subject, $message, $options);
	} else {
		Mailer::SmtpMail($from, $to, $subject, $message, $options);
	}
}

function mail_subscribe($city, $team, $partner, $subscribe) 
{
	global $INI;
	$encoding = $INI['mail']['encoding'] ? $INI['mail']['encoding'] : 'UTF-8';
	$week = array('Day','1','2','3','4','5','6');
	$today = date('Y Years n Months j Days Weeks') . $week[date('w')];
	$vars = array(
		'today' => $today,
		'team' => $team,
		'city' => $city,
		'subscribe' => $subscribe,
		'partner' => $partner,
		'help_email' => $INI['mail']['helpemail'],
		'help_mobile' => $INI['mail']['helpphone'],
		'notice_email' => $INI['mail']['reply'],
	);
	$message = render('mail_subscribe_team', $vars);
	$options = array(
		'contentType' => 'text/html',
		'encoding' => $encoding,
	);
	$from = $INI['mail']['from'];
	$to = $subscribe['email'];
	$subject = "Giảm giá mới nhất từ ". $INI['system']['sitename'] .":" . " {$team['title']}";

	if ($INI['mail']['mail']=='mail') {
		Mailer::SendMail($from, $to, $subject, $message, $options);
	} else {
		Mailer::SmtpMail($from, $to, $subject, $message, $options);
	}
}


function mail_invitation($emails, $content, $name) {
	global $INI;
	if(empty($emails)) return;

	$emails = preg_split('/[\s,]+/', $emails, -1, PREG_SPLIT_NO_EMPTY);
	$subject = "[{$name}] đã mời bạn đăng ký tài khoản tại {$INI['system']['sitename']}";
	$vars = array( 
			'name' => $name,
			'content' => $content,
			);
	$message = render('mail_invite', $vars);

	$step = ceil(count($emails)/20);
	for($i=0; $i<$step; $i++) {
		$offset = $i * 20;
		$tos = array_slice($emails, $offset, 20);
		mail_custom($tos, $subject, $message);
	}
	return true;
}
