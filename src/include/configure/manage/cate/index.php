<?php
/**
 * hoangthikd@gmail.com
 */
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
need_manager();
$type = strval($_GET['type']);
if ( !$type ) {$type = 'root';}
$types = get_types();
if(is_post()){
	if($_POST['type_info']=='root') $_POST['pid_info']=0;
	if($_POST['createnew']){
		if(empty($_POST['name_info'])){
			Session::Set('notice', "Bạn chưa nhập tên danh mục!");
			redirect( WEB_ROOT. "/manage/cate/index.php?type=".$_POST['type_info']);
		}
		$insert	=	array('pid','type','name','sort_order','display','image_cate');
		$table	=	new Table('cate',$_POST);
		$table->pid	        =	$_POST['pid_info'];	
		$table->type	    =	$_POST['type_info'];
		$table->name	    =	$_POST['name_info'];
		$table->sort_order	=	$_POST['sort_info'];
		$table->display	    =	$_POST['display_info'];
		$table->image_cate = upload_image('upload_image_info',null,'cate');
		$newcate	=	$table->insert($insert);
		if(!empty($newcate)) {
			Session::Set('notice', "Thêm danh mục số {$_POST['id']} thành công!");
			header("location: ".WEB_ROOT."/manage/cate/index.php?type=".$_POST['type_info']);
			
		}
	}
	else if ($_POST['edit'] && $_POST['id']){
			$images=upload_image('upload_image_info',null,'cate');
			if(!empty($images)){
				$flag = $flag = Table::UpdateCache('cate', $_POST['id'], array(
					'pid'=>$_POST['pid_info'],
					'name'=>$_POST['name_info'],
					'sort_order'=>$_POST['sort_info'],
					'display'=>$_POST['display_info'],
					'image_cate'=>$images
				));
				if($flag){
					Session::Set('notice', "Sửa thông tin danh mục số {$_POST['id']} thành công!");
					redirect( WEB_ROOT. "/manage/cate/index.php?type=".$_POST['type_info']);
				}
				else Session::Set('notice', "Lỗi khi sửa thông tin danh mục số {$_POST['id']}");
			}else{
				$flag = Table::UpdateCache('cate', $_POST['id'], array(
					'pid'=>$_POST['pid_info'],
					'name'=>$_POST['name_info'],
					'sort_order'=>$_POST['sort_info'],
					'display'=>$_POST['display_info']
				));
				if($flag){
					Session::Set('notice', "Sửa thông tin danh mục số {$_POST['id']} thành công!");
					redirect( WEB_ROOT. "/manage/cate/index.php?type=".$_POST['type_info']);
				}
				else Session::Set('notice', "Lỗi khi sửa thông tin danh mục số {$_POST['id']}");
			}
		}
	}
$condition = array('type'=>$type);
$count = Table::Count('cate', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);
$cates = DB::LimitQuery('cate', array(
	'condition' => $condition,
	'order' => 'ORDER BY sort_order ASC, id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));
if(isset($_GET['action']) && $_GET['action']=='edit'){
	$id = strval($_GET['id']);
	$getcate = Table::Fetch('cate', $id);
}

$roots = DB::LimitQuery('cate', array('condition' => array( 'type' => 'root', ),));
$roots = Utility::OptionArray($roots, 'id', 'name');

$childs = DB::LimitQuery('cate', array('condition' => array( 'type' => 'child', ),));
$childs = Utility::OptionArray($childs, 'id', 'name');

$subchilds = DB::LimitQuery('cate', array('condition' => array( 'type' => 'subchild', ),));
$subchilds = Utility::OptionArray($subchilds, 'id', 'name');


include template('manage_cate_index');
