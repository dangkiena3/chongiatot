<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

check_login();

//load local
$provinces = DB::LimitQuery('vncountry', array('condition' => array('level' => '0'),));
$provinces = Utility::OptionArray($provinces, 'id', 'name');

$districts = DB::LimitQuery('vncountry', array('condition' => array('level' => '1','parent_id'=>$login_user['province_id']),));
$districts = Utility::OptionArray($districts, 'id', 'name');

$ward2s = DB::LimitQuery('vncountry', array('condition' => array('level' => '2','parent_id'=>$login_user['district_id']),));
$ward2s = Utility::OptionArray($ward2s, 'id', 'name');

$page_type = 'profile';
$pagetitle = 'Thông tin cá nhân';
include template('account_index');
