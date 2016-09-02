<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$districtID = intval($_POST['districtID']);
$wght = WeightProduct();
//check in HCM
if($districtID){
$cost = Table::Fetch('vncountry', $districtID);
if($cost['parent_id']==15355){
	echo intval($cost['vat']);
}else{
	$costs = Table::Fetch('vncountry', $cost['parent_id']);
	if($costs['vat']>1){ // >300KM
		echo Gram_km($wght,2);
	}else{
		echo Gram_km($wght,1);
	}

}
}

