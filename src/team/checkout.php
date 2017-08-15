<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
$carts = $_SESSION['cart'];
//check login
//if(empty($login_user_id)||empty($carts)) redirect(WEB_ROOT . '/gio-hang');

if($login_user_id){
	$users = Table::Fetch('user', $login_user_id);
	$methods = DB::LimitQuery('shipping_method',array(
		'condition' => array('display'=>'Y'),
	));
}
$districts = DB::LimitQuery('vncountry', array('condition' => array('level' => '1','parent_id'=>$users['province_id']),));
$opt_districts = Utility::OptionArray($districts, 'id', 'name');

$wards = DB::LimitQuery('vncountry', array('condition' => array('level' => '2','parent_id'=>$users['district_id']),));
$opt_wards = Utility::OptionArray($wards, 'id', 'name');
$page_type = 'checkout';

include template('team_checkout');
