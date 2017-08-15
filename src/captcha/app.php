<?php

//code by mrnhan108@gmail.com

require_once(dirname(__FILE__). '/include/application.php');

//include language
require_once(dirname(__FILE__). '/include/language/admin/vietnamese.php');
require_once(dirname(__FILE__). '/include/language/home/vietnamese.php');

//magic_quota_gpc
$_GET = magic_gpc($_GET);
$_POST = magic_gpc($_POST);
$_COOKIE = magic_gpc($_COOKIE);

//process currefer
$currefer = uencode(strval($_SERVER['REQUEST_URI']));

//session, cache, configure, webroot register
Session::Init();
$INI = ZSystem::GetINI();
//end

//biz logic
$currency = $INI['system']['currency'];
$login_user_id = ZLogin::GetLoginId();
$login_user = Table::Fetch('user', $login_user_id);

//$hotcities = option_hotcategory('city', false, true);
$hotcities = option_category('city', false, true);
$allcities = option_category('city', false, true);
$city = cookie_city(null);

//not allow access app.php
if($_SERVER['SCRIPT_FILENAME']==__FILE__){
	redirect( WEB_ROOT . '/index.php');
}

$AJAX = ('XMLHttpRequest' == @$_SERVER['HTTP_X_REQUESTED_WITH']);
if (false==$AJAX) { 
	header('Content-Type: text/html; charset=UTF-8'); 
	run_cron();
} else {
	header("Cache-Control: no-store, no-cache, must-revalidate");
}

//check license not remove
need_license();

//cart quantity
$total_quantity = 0;
foreach($_SESSION['cart'] as $one) $total_quantity += $one['quantity'];

//total vnd
//get data
if(isset($_SESSION['cart'])) $carts = $_SESSION['cart'];
else $carts = array();
$total_vnd = 0;
foreach($carts as $one){
	$hdOptionValue = $one['deal_info'];
    $info_id = intval(substr($hdOptionValue,-1));
    $deal_id = intval(substr($hdOptionValue,0,-1));
	$teams = Table::Fetch('team', $deal_id);
    $info = 'infop'.$info_id;
    $max_quantity = $teams['max_number'] - $teams['now_number'];
    $quantity = $one['quantity'];
    $price_sum = $quantity * $teams['team_price'];
	$total_vnd += $price_sum;
}
//load location 
$provinces = DB::LimitQuery('vncountry', array('condition' => array('level' => '0'),));
$provinces_ad = DB::LimitQuery('vncountry', array('condition' => array('level' => '0','id' =>'15355'),));
$option_provinces = Utility::OptionArray($provinces, 'id', 'name');

$districts = DB::LimitQuery('vncountry', array('condition' => array('level' => '1'),));
$option_districts = Utility::OptionArray($districts, 'id', 'name');


$tenngan = $INI['system']['tenngan'];

$kwseo = $INI['system']['keywordseo'];

$template_path = "/include/template/{$INI['skin']['template']}/css/images";

//user online
$now_time = time();
$out_time = 60; 
$new_time = $now_time - $out_time;
$onlines = DB::LimitQuery('online');
foreach($onlines as $one){
	if($new_time > $one['tmp']) Table::Delete('online', $one['id']);	
}
$chk = Table::Fetch('online', $_SERVER['REMOTE_ADDR'], 'ip');
if(empty($chk)){
	$value = array('tmp' => $now_time,'ip' => $_SERVER['REMOTE_ADDR'] ,'local' => $_SERVER['PHP_SELF']);
	$table = new Table('online', $value);
	$insert = array('tmp','ip','local');
	$table->insert($insert);
}else{
	Table::UpdateCache('online',$chk['id'], array('local'=>$_SERVER['PHP_SELF']));
}

$u_online = Table::Count('online');