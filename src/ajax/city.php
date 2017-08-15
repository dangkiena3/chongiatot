<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$type = $_GET['type'];
$id = abs(intval($_GET['id']));
if($type=='child'){
	$childs = DB::LimitQuery('vncountry', array(
		'condition' => array('level' => '1', 'parent_id'=>$id),
	));
	$childs = Utility::OptionArray($childs, 'id', 'name');
}
elseif($type=='subchild'){
	$childs = DB::LimitQuery('vncountry', array(
		'condition' => array('level' => '2', 'parent_id'=>$id),
	));
	$childs = Utility::OptionArray($childs, 'id', 'name');
}
include template('manage_city');
?>
