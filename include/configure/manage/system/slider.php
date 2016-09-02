<?php
/**
 * quản lý thông tin ngân hàng.
 */
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
need_manager();
if(is_post()){
	if($_POST['createnew']){
	$insert	=	array('product','image','link','sortimg');
	$table	=	new Table('slider',$_POST);
	$table->product	=	$_POST['product_info'];
	$table->image = upload_image('upload_image_info',null,'slider');
	$table->link	=	$_POST['link_info'];
	$table->sortimg	=	$_POST['sortimg_info'];
		$newslider	=	$table->insert($insert);
		if(!empty($newslider)) {
			header("location: ".$_SERVER['PHP_SELF']."?result=successfull");
		}
	}
	else if ($_POST['edit'] && $_POST['id']){
			$images=upload_image('upload_image_info',null,'slider');
			if(!empty($images)){
				$flag=Table::UpdateCache('slider', $_POST['id'], array('image'=>$images,'product'=>$_POST['product_info'],'link'=>$_POST['link_info'],'sortimg'=>$_POST['sortimg_info']));
				if($flag){
					Session::Set('notice', "Đã sửa thông tin trình ảnh số {$_POST['id']}");
					redirect( WEB_ROOT. "/manage/system/slider.php");
				}
				else Session::Set('notice', "Lỗi khi sửa thông tin trình ảnh số {$_POST['id']}");
			}
			else{
			 	$flag=Table::UpdateCache('slider', $_POST['id'], array('product'=>$_POST['product_info'],'link'=>$_POST['link_info'],'sortimg'=>$_POST['sortimg_info']));
				if($flag){
					Session::Set('notice', "Đã sửa thông tin trình ảnh số {$_POST['id']}");
					redirect( WEB_ROOT. "/manage/system/slider.php");
				}
				else Session::Set('notice', "Lỗi khi sửa thông tin trình ảnh số {$_POST['id']}");
			}
		}
	}
$condition = array();
$count = Table::Count('slider', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);
$sliders = DB::LimitQuery('slider', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));
if(isset($_GET['action']) && $_GET['action']=='edit'){
	$id = strval($_GET['id']);
	$getslider = Table::Fetch('slider', $id);
}
include template('manage_system_slider');
