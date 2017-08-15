<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
need_manager();
if(is_post()){
	if($_POST['createnew']){
		$flag = Table::UpdateCache('vncountry', $_POST['district'], array(
				'vat' => $_POST['cost_info'],
				));
		if($flag){
			Session::Set('notice', "Thêm phí giao hàng thành công!");
			header("location: ".WEB_ROOT."/manage/system/shipping_cost.php");
		}else Session::Set('error', "Lỗi khi sửa thông tin phí giao hàng");
	}
	else if ($_POST['edit'] && $_POST['id']){
			$flag = Table::UpdateCache('vncountry', $_POST['district'], array(
				'vat' => $_POST['cost_info'],
				));
			if($flag){
				Session::Set('notice', "Sửa thông tin phí giao hàng thành công!");
				redirect( WEB_ROOT. "/manage/system/shipping_cost.php");
			}
			else Session::Set('notice', "Lỗi khi sửa thông tin phí giao hàng");
		}
	}
$vats = 3;	
$condition = array(
		'parent_id' =>'15355',
		"vat > '$vats'",
	);
$count = Table::Count('shipping_cost');
list($pagesize, $offset, $pagestring) = pagestring($count, 20);
$shipping_costs = DB::LimitQuery('vncountry', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

if(isset($_GET['action']) && $_GET['action']=='edit'){
	$id = strval($_GET['id']);
	$get_shipping_costs = Table::Fetch('vncountry', $id);
	$province_id = $get_shipping_costs['parent_id'];
	$district_id = $get_shipping_costs['id'];
	$districtss = DB::LimitQuery('vncountry', array('condition' => array('level' => '1','parent_id'=>$province_id),));
	$districtss = Utility::OptionArray($districtss, 'id', 'name');
}

$methods = DB::LimitQuery('shipping_method', array('order' => 'ORDER BY id DESC',));

include template('manage_shipping_cost');
