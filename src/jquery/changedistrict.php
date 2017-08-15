<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$provinceID = intval($_POST['DistrictID']);

if($provinceID!=0){
	$districts = DB::LimitQuery('vncountry', array('condition' => array('level' => '2','parent_id'=>$provinceID),));
	$districts = Utility::OptionArray($districts, 'id', 'name');
	if($provinceID == 1) $msg_select = "Chọn Quận huyện";
	else $msg_select = "Chọn Phường Xã";
	echo Utility::Option($districts,'',$msg_select);
} 
else {
	echo "<option selected=\"selected\" value=\"0\">Chọn Phường Xã</option>";
}
