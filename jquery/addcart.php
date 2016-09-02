<?php

require_once(dirname(dirname(__FILE__)) . '/app.php');

//get post
if($_POST){
	$hdOptionValue = array();
	if(is_array($_POST['hdOptionValue'])) $hdOptionValue = $_POST['hdOptionValue'];
	foreach($hdOptionValue as $OptionValue){
	//check cart
	$OptionValue = intval($OptionValue);
	if($OptionValue>0){
		if(empty($_SESSION['cart'][$OptionValue])){
			//add cart
			$temp_arr = array();
			$temp_arr['deal_info'] = $OptionValue;
			$temp_arr['quantity'] = 1;
			$_SESSION['cart'][$OptionValue] = $temp_arr;
		}else{
			$_SESSION['cart'][$OptionValue]['quantity']++; 
			$_SESSION['cart'][$OptionValue]['deal_info'] = $OptionValue;
		}
	}
	}
	$rs = '1';
}else{
	$str_return = '-1';
}
//return
echo $str_return;
