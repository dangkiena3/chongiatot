<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
//code by mrnhan108@gmail.com
$hoten = htmlspecialchars($_POST['FullName']);
$email = htmlspecialchars($_POST['Email']);
$dienthoai = htmlspecialchars($_POST['Mobile']);
$chucvu = htmlspecialchars($_POST['Position']);
$tendn = htmlspecialchars($_POST['CompanyName']);
$web = htmlspecialchars($_POST['Website']);
$diachi = htmlspecialchars($_POST['Address']);
$thanhpho = htmlspecialchars($_POST['CityId']);
$hoptac = htmlspecialchars($_POST['BusinessType']);
$dexuat = htmlspecialchars($_POST['Description']);

if ($_POST) {
	$table = new Table('feedback', $_POST);
	$table->title = '<b>Họ tên:</b> '.$hoten.'<br/><b>Chức vụ:</b> '.$chucvu.'<br/><b>Điện thoại</b>: '.$dienthoai.'<br/><b>Email</b> :'.$email;
	$table->contact2 = '<strong>Tên DN:</strong> '.$tendn.'<br/> <strong>Địa chỉ:</strong> '.$diachi.' / '.$thanhpho.'<br/><strong>Web</strong> :'.$web;
	$table->content = '<b>Hợp tác:</b> '.$hoptac.'<br/><b>Đề xuất</b> :'.$dexuat;
	$table->create_time = time();
	$table->Insert(array(
		'title', 'contact2', 'content', 'create_time',
	));
	$rs ='1';
} else $rs='0';

//return
echo $rs;

