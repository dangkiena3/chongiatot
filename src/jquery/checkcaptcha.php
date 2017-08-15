<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$captcha = $_POST['text'];

if($_SESSION['captcha']==$captcha)
	echo '1';
else 
	echo '0';
