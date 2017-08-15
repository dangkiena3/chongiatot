<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
need_manager();
if(is_post()){
	if($_POST['createnew']){
		if(empty($_POST['name_info'])){
			Session::Set('notice', "Bạn chưa nhập tên phương thức giao hàng!");
			redirect( WEB_ROOT. "/manage/system/shippingmethod.php");
		}
		$insert	=	array('name','desc');
		$table	=	new Table('shipping_method',$_POST);
		$table->name	=	$_POST['name_info'];	
		$table->desc    =	$_POST['desc_info'];
		$table->linkimg =	$_POST['linkimg_info'];
		$table->display =    $_POST['display_info'];
		$table->order_sort = $_POST['sort_info'];
		$newmethod	  =	$table->insert($insert);
		if(!empty($newmethod)) {
			Session::Set('notice', "Thêm phương thức giao hàng thành công!");
			header("location: ".WEB_ROOT."/manage/system/shippingmethod.php");
		}
	}
	else if ($_POST['edit'] && $_POST['id']){
			$flag=Table::UpdateCache('shipping_method', $_POST['id'], array(
				'name'	=> $_POST['name_info'],
				'desc'	=> $_POST['desc_info'],
				'linkimg'=> $_POST['linkimg_info'],
				'display' => $_POST['display_info'],
				'order_sort' => $_POST['sort_info'],
			));
			if($flag){
				Session::Set('notice', "Sửa thông tin phương thức giao hàng thành công!");
				redirect( WEB_ROOT. "/manage/system/shippingmethod.php");
			}
			else Session::Set('notice', "Lỗi khi sửa thông tin phương thức giao hàng");
		}
	}
$count = Table::Count('shipping_method');
list($pagesize, $offset, $pagestring) = pagestring($count, 20);
$methods = DB::LimitQuery('shipping_method', array(
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));
if(isset($_GET['action']) && $_GET['action']=='edit'){
	$id = strval($_GET['id']);
	$getmethods = Table::Fetch('shipping_method', $id);
}

include template('manage_shipping_method');
