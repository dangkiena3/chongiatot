<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
need_manager();
if(is_post()){
	if($_POST['createnew']){
	$insert	=	array('name', 'url','image','order_sort','pos_ads', 'display');
	$table	=	new Table('adsense',$_POST);
	$table->name	=	$_POST['name_info'];
	$table->image = upload_image('upload_image',null,'adsense');
	$table->url	=	$_POST['url_info'];
	$table->order_sort	=	$_POST['sort_info'];
	$table->pos_ads	=	$_POST['pos_info'];
	$table->display	=	$_POST['display_info'];
		$newadsense	=	$table->insert($insert);
		if(!empty($newadsense)) {
			header("location: ".$_SERVER['PHP_SELF']."?result=successfull");
		}
	}
	else if ($_POST['edit'] && $_POST['id']){
			$images=upload_image('upload_image',null,'adsense');
			if(!empty($images)){
				$flag=Table::UpdateCache('adsense', $_POST['id'], array(
					'image'=>$images,
					'name'=>$_POST['name_info'],
					'url'=>$_POST['url_info'],
					'order_sort'=>$_POST['sort_info'],
					'pos_ads'=>$_POST['pos_info'],
					'display'=>$_POST['display_info'],
				));
				if($flag){
					Session::Set('notice', "Đã sửa thông tin quảng cáo số {$_POST['id']}");
					redirect( WEB_ROOT. "/manage/adsense/position.php");
				}
				else Session::Set('notice', "Lỗi khi sửa thông tin quảng cáo số {$_POST['id']}");
			}
			else{
			 	$flag=Table::UpdateCache('adsense', $_POST['id'], array(
					'name'=>$_POST['name_info'],
					'url'=>$_POST['url_info'],
					'order_sort'=>$_POST['sort_info'],
					'pos_ads'=>$_POST['pos_info'],
					'display'=>$_POST['display_info'],
				));
				if($flag){
					Session::Set('notice', "Đã sửa thông tin quảng cáo số {$_POST['id']}");
					redirect( WEB_ROOT. "/manage/adsense/position.php");
				}
				else Session::Set('notice', "Lỗi khi sửa thông tin quảng cáo số {$_POST['id']}");
			}
		}
	}
$condition = array();
$count = Table::Count('adsense', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);
$adsenses = DB::LimitQuery('adsense', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));
if(isset($_GET['action']) && $_GET['action']=='edit'){
	$id = strval($_GET['id']);
	$getadsense = Table::Fetch('adsense', $id);
}
include template('manage_adsense_position');
