<?php

//code by mrnhan108@gmail.com

require_once(dirname(dirname(__FILE__)) . '/app.php');
if($_POST){
	$dealOptionIdUpdate = abs(intval($_POST['dealOptionIdUpdate']));
	$quantity = abs(intval($_POST['quantity']));
	$_SESSION['cart'][$dealOptionIdUpdate]['quantity'] = $quantity;
}

