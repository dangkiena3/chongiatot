<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
$teamid = $_POST['teamid'];
$fullname = $_POST['tbxGopyFullName'];
$email = $_POST['tbxGopyEmail'];
$mobile = $_POST['tbxGopyPhone'];
$addres = $_POST['tbxGopYContent'];
if ($_POST) {
	$table = new Table('redeal', $_POST);
	$table->team_id = abs(intval($teamid));
	$table->create_time = time();
	$table->name = htmlspecialchars($fullname);
	$table->address = htmlspecialchars($addres);
	$table->mobile = htmlspecialchars($mobile);
	$table->email = htmlspecialchars($email);
	$table->Insert(array(
		'team_id', 'name', 'email', 'address','mobile', 'create_time',
	));
	$rs =1;
}
echo $rs;

