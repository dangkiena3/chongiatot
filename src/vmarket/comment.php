<?php

//code by mrnhan108@gmail.com

require_once(dirname(dirname(__FILE__)). '/app.php');

if(!$login_user_id){
	Session::Set('thongbao','Bạn chưa đăng nhập xin đăng nhập bằng form bên trên');
	redirect( WEB_ROOT. "/Cho-Voucher");
}

if(is_post()){
	$insert = array('user_id','vmarket_id','pid','type','content','create_time');
	$table = new Table('vmarket_cmt', $_POST);
	$table->user_id = $login_user_id;
	$table->create_time = strtotime('now');
	$flag = $table->insert($insert);
	if($flag){
		redirect(WEB_ROOT.rewrite_vmarket_id($_POST['vmarket_id']));
	}
}

