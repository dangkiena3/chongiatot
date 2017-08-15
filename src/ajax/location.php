<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$location = $_GET['location'];
$id = abs(intval($_GET['id']));
if($location=='ward'){
	$wards = DB::LimitQuery('location', array(
		'condition' => array('local' => 'ward','pid'=>$id),
	));
	$wards = Utility::OptionArray($wards, 'id', 'name');
}
elseif($location=='district'){
	$districts = DB::LimitQuery('vncountry', array(
		'condition' => array('level' => '1','parent_id'=>$id),
	));
	$districts = Utility::OptionArray($districts, 'id', 'name');
}
elseif($location=='province'){
	$provinces = DB::LimitQuery('location', array(
		'condition' => array('local' => 'province'),
	));
	$provinces = Utility::OptionArray($provinces, 'id', 'name');
}
include template('manage_ajax_location');
?>
