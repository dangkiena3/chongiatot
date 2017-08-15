<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('market');
$CKEditor = new CKEditor();
$CKEditor->returnOutput = true;
$width	=	"100"."%";
$CKEditor->config['width'] = $width;
CKFinder::SetupCKEditor( $CKEditor,'../../include/plugin/ckfinder/' ) ;
$txt ='';
$txtemail	=	$CKEditor->editor("txtcontent", $txt);
if ( $_POST ) {
	$_POST['txtcontent'] =$_POST['txtcontent'];

	$content = $_POST['txtcontent'];
	$emails = $_POST['emails'];
	$subject = $_POST['title'];

	$emails = preg_split('/[\s,]+/', $emails, -1, PREG_SPLIT_NO_EMPTY);
	$emails_array = array();
	foreach($emails AS $one) if(Utility::ValidEmail($one)) $emails_array[]=$one;
	$email_count = count($emails_array);

	$hostprefix = "http://{$_SERVER['HTTP_HOST']}/";

	if ( !$email_count ) {
		Session::Set('error', 'Lỗi, Vui lòng kiểm tra lại');
	} else {
		try {
			mail_custom($emails_array, $subject, $content);
			Session::Set('notice', "Đã gửi xong, số lương: {$email_count} email");
			redirect( WEB_ROOT . '/manage/market/index.php' );
		}catch(Exception $e) {
			Session::Set('error', 'Lỗi:'. $e->getMessage());
		}
	}
}

include template('manage_market_email');
