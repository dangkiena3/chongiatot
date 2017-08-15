<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$email = $_POST['emailsub'];
if($email){
	ZSubscribe::Create($email, 1);
	echo "1*".$email;
}
else 
	echo "0*".$email;
