<?php
/**
 * quản lý thông tin ngân hàng.
 */
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
need_manager();
if(is_post()){
	if($_POST['createnew']){
	$insert	=	array('bankname_short','bankcode','bankacc','image','first_element','bankname_long');
	$table	=	new Table('bank',$_POST);
	$table->bankname_short	=	$_POST['shortname'];
	$table->bankcode	=	$_POST['accnumber'];
	$table->bankacc	=	$_POST['accname'];
	$table->image = upload_image('upload_logo',null,'bank',true);
	$table->first_element	=	$_POST['code'];
	$table->bankname_long	=	$_POST['longname'];
		$newbank	=	$table->insert($insert);
		if(!empty($newbank)) {
			header("location: ".$_SERVER['PHP_SELF']."?result=successfull");
		}
	}
	else if ($_POST['edit'] && $_POST['id']){
			$images=upload_image('upload_logo',null,'bank');
			if(!empty($images)){
				$flag=Table::UpdateCache('bank', $_POST['id'], array('image'=>$images,'bankname_short'=>$_POST['shortname'],'bankcode'=>$_POST['accnumber'],'bankacc'=>$_POST['accname'],'first_element'=>$_POST['code'],'bankname_long'=>$_POST['longname']));
				if($flag){
					Session::Set('notice', "Đã sửa thông tin ngân hàng số {$_POST['id']}");
					redirect( WEB_ROOT. "/manage/system/bank.php");
				}
				else Session::Set('notice', "Lỗi khi sửa thông tin ngân hàng số {$_POST['id']}");
			}
			else{
			 	$flag=Table::UpdateCache('bank', $_POST['id'], array('bankname_short'=>$_POST['shortname'],'bankcode'=>$_POST['accnumber'],'bankacc'=>$_POST['accname'],'first_element'=>$_POST['code'],'bankname_long'=>$_POST['longname']));
				if($flag){
					Session::Set('notice', "Đã sửa thông tin ngân hàng số {$_POST['id']}");
					redirect( WEB_ROOT. "/manage/system/bank.php");
				}
				else Session::Set('notice', "Lỗi khi sửa thông tin ngân hàng số {$_POST['id']}");
			}
		}
	}
$condition = array();
$count = Table::Count('bank', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);
$banks = DB::LimitQuery('bank', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));
if(isset($_GET['action']) && $_GET['action']=='edit'){
	$id = strval($_GET['id']);
	$getbank = Table::Fetch('bank', $id);
}
include template('manage_system_bank');
