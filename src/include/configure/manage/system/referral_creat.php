<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();


$id = abs(intval($_POST['id']));
$domain = trim($_POST['name']);
$table = new Table('website', $_POST);
$table->doitac = $id;
$table->name = $domain;
$table->srcweb = srcWeb($domain);
$uarray = array( 'name', 'doitac', 'srcweb'); 

$url = Table::Count('website',array('name'=>$domain));
if (!$_POST['name']) {
	Session::Set('error', 'Vui lòng nhập URL ');
	redirect(null);
}else{
if ($url) {
	Session::Set('error', 'URL này đã tồn tại!');
} else {
	if ( $flag = $table->insert( $uarray ) ) {
		Session::Set('notice', 'Đã thêm mới thành công');
	} else {
		Session::Set('error', 'Không thể tạo mới');
	}
}
}
redirect(null);
