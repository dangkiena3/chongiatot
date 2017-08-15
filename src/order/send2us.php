<?php
/**
 * thông báo đến webmaster thông tin đã chuyển khoản
 */
require_once(dirname(dirname(__FILE__)) . '/app.php');
$pagetitle = 'Thông báo chuyển khoản';
$x	=	rand(1111,9999);
setcookie('x', $x, time() + (86400 * 0.7));
$showbank = DB::LimitQuery('bank', array(
	'order' => 'ORDER BY id ASC',
));
if(is_post()){
	if($_POST['x']==$_COOKIE['x']){
		$insert	=	array('code','bank_number','bank_id','sender','comment','tel','create_time','flag');
		$send2us	=	new Table('payment',$_POST);
		$send2us->code	=	$_POST['madh']; 
		$send2us->bank_number	=	$_POST['sotk'];
		$send2us->bank_id		=	$_POST['bank_id'];
		$send2us->sender		=	$_POST['sender'];
		$send2us->comment		=	$_POST['comment'];
		$send2us->tel		=	$_POST['tel'];
		$send2us->create_time	=	time();
		$send2us->flag	=	1; // chua xu ly		
		$send	=	$send2us->Insert($insert);
			if(!empty($send)) {
				header("location: ".$_SERVER['PHP_SELF']."?result=successfull");
			}
	}
}
include template('order_send2us');
?>