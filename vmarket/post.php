<?php

//code by mrnhan108@gmail.com

require_once(dirname(dirname(__FILE__)). '/app.php');
if(!$login_user_id){
	Session::Set('thongbao','Bạn chưa đăng nhập xin đăng nhập bằng form bên trên');
	redirect( WEB_ROOT. "/Cho-Voucher");
}
	
if(is_post()){
	$insert = array('title','desc','user_id','content','vtype','create_time','state','view','seokey');
	$table = new Table('vmarket', $_POST);
	$table->title = $_POST['name_info'];
	$table->desc = $_POST['desc_info'];
	$table->content = $_POST['content_info'];
	$table->vtype = $_POST['type_info'];
	$table->user_id = $login_user_id;
	$table->create_time = strtotime('now');
	$table->state = 'pending';
	$table->view = 0;
	$table->seokey = $_POST['seokey_info'];
	$flag = $table->insert($insert);
	if($flag){
		Session::Set('thongbao','Tin đã đăng thành công và đang chờ duyệt từ ban quản trị');
		redirect( WEB_ROOT. "/Cho-Voucher");
	}
}
$pagetitle = 'Đăng mua bán voucher';

$page_type = 'vmarket';

include template('vmarket_post');

