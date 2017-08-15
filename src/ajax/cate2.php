<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$type = $_GET['type'];
$id = abs(intval($_GET['id']));
if($type=='child'){
	$childs = DB::LimitQuery('cate', array(
		'condition' => array('type' => 'child', 'pid'=>$id),
	));
	$childs = Utility::OptionArray($childs, 'id', 'name');
}
elseif($type=='subchild'){
	$childs = DB::LimitQuery('cate', array(
		'condition' => array('type' => 'subchild', 'pid'=>$id),
	));
	$childs = Utility::OptionArray($childs, 'id', 'name');
}
elseif($type=='root'){
	$roots = DB::LimitQuery('cate', array(
		'condition' => array('type' => 'root'),
	));
	$roots = Utility::OptionArray($roots, 'id', 'name');
}
include template('manage_cate2');
?>
