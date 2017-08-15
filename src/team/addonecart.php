<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

//get data
if($_GET){
	$OptionValue = $_GET['option'];
	$OptQuantity = $_GET['quantity'];
	//check cart
	if(empty($_SESSION['cart'][$OptionValue])){
		//add cart
		$_SESSION['cart'][$OptionValue]['deal_info'] = $OptionValue;
		$_SESSION['cart'][$OptionValue]['quantity'] = $OptQuantity;
	}else{
		//$cart = $_SESSION['cart'][$OptionValue];
		$cart['quantity'] += $OptQuantity;
		$_SESSION['cart'][$OptionValue]['quantity'] = $_SESSION['cart'][$OptionValue]['quantity'] + $OptQuantity; 
		$_SESSION['cart'][$OptionValue]['deal_info'] = $OptionValue;
	}
	redirect( WEB_ROOT. '/gio-hang');
}else{
	redirect( WEB_ROOT. '/');
}
