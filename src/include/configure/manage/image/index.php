<?php
/**
 * quản lý thông tin ngân hàng.
 */
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
need_manager();
$local = strval($_GET['local']);
if ( !$local ) {$local = 'province';}
$cates = get_locals();
if(is_post()){
	if($_POST['local_info']=='province') $_POST['pid_info']=0;
	if($_POST['local_info']=='ward'&&$_POST['pid_info']==0) $_POST['pid_info'] = $_POST['district'];
	if($_POST['createnew']){
		if(empty($_POST['name_info'])){
			Session::Set('notice', "Name location can not empty!");
			redirect( WEB_ROOT. "/manage/location/index.php?local=".$_POST['local_info']);
		}
		$insert	=	array('pid','local','name','sort_order','display');
		$table	=	new Table('location',$_POST);
		$table->pid	        =	$_POST['pid_info'];	
		$table->local	    =	$_POST['local_info'];
		$table->name	    =	$_POST['name_info'];
		$table->sort_order	=	$_POST['sort_info'];
		$table->display	    =	$_POST['display_info'];
		$newlocation	=	$table->insert($insert);
		if(!empty($newlocation)) {
			Session::Set('notice', "Add location number {$_POST['id']} successful!");
			header("location: ".WEB_ROOT."/manage/location/index.php?local=".$_POST['local_info']);
			
		}
	}
	else if ($_POST['edit'] && $_POST['id']){
			$flag=Table::UpdateCache('location', $_POST['id'], array('pid'=>$_POST['pid_info'],'name'=>$_POST['name_info'],'sort_order'=>$_POST['sort_info'],'display'=>$_POST['display_info']));
			if($flag){
				Session::Set('notice', "Edited information location number {$_POST['id']} successful!");
				redirect( WEB_ROOT. "/manage/location/index.php?local=".$_POST['local_info']);
			}
			else Session::Set('notice', "Error edit information location number {$_POST['id']}");
		}
	}
$condition = array('local'=>$local);
$count = Table::Count('location', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);
$locations = DB::LimitQuery('location', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));
if(isset($_GET['action']) && $_GET['action']=='edit'){
	$id = strval($_GET['id']);
	$getlocation = Table::Fetch('location', $id);
}

$provinces = DB::LimitQuery('location', array(

			'condition' => array( 'local' => 'province', ),

			));

$provinces = Utility::OptionArray($provinces, 'id', 'name');

$districts = DB::LimitQuery('location', array(

			'condition' => array( 'local' => 'district', ),

			));

$districts = Utility::OptionArray($districts, 'id', 'name');

include template('manage_location_index');
