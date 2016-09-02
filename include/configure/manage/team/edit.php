<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');


need_manager();

need_auth('team');

$id = abs(intval($_GET['id']));

$team = $eteam = Table::Fetch('team', $id);



$CKEditor = new CKEditor();

// Do not print the code directly to the browser, return it instead.

$CKEditor->returnOutput = true;

$width	=	"100"."%";

$CKEditor->config['width'] = $width;



CKFinder::SetupCKEditor( $CKEditor,'../../include/plugin/ckfinder/' ) ;

// The initial value to be displayed in the editor.


$notice_content	=	$team['notice'];

$detail_content = $team['detail'];

$systemreview_content	=	$team['systemreview'];

$express_content	=	$team['express'];

$notice = $CKEditor->editor("notice", $notice_content);

$detail = $CKEditor->editor("detail", $detail_content);

$systemreview	=	$CKEditor->editor("systemreview", $systemreview_content);

$express = $CKEditor->editor("express", $express_content);



// end

if ( is_get() && empty($team) ) {

	$team = array();

	$team['id'] = 0;

	$team['user_id'] = $login_user_id;

	$team['begin_time'] = strtotime('+0 days');

	$team['end_time'] = strtotime('+1 months'); 

	$team['expire_time'] = strtotime('+2 months +1 days');

	$team['min_number'] = 10;
	
	$team['max_number'] = 100;
	
	$team['view'] = 0;
	
	$team['pre_view'] = 0;

	$team['per_number'] = 0;
	
	$team['view_unit'] = 1;
	
	$team['view_timeout'] = 60;
	
	$team['delivery_type'] = 'product';

	$team['market_price'] = 100000;

	$team['team_price'] = 50000;

	$team['delivery'] = 'express';

	$team['address'] = $profile['address'];

	$team['mobile'] = $profile['mobile'];

	$team['fare'] = 0;

	$team['farefree'] = 0;

	$team['bonus'] = abs(intval($INI['system']['invitecredit']));
	
	$team['save_money'] = 0;

	$team['conduser'] = $INI['system']['conduser'] ? 'N' : 'Y';

	$team['buyonce'] = 'N';
	
	$team['slide'] = 'N';
	
	$team['percent'] = 0;

}

else if ( is_post() ) {

	$team = $_POST;

	$insert = array(

		'title', 'market_price', 'team_price', 'input_price',  

		'summary', 'notice','detail',

		 'per_number', 'product', 'slide', 'gender',

		'image', 'image1', 'image2', 'flv', 'now_number',

		'conduser', 'buyonce', 'bonus', 'save_money', 'percent', 'sort_order',

		'delivery', 'mobile', 'address', 'fare', 'pre_view', 'view_unit', 'view_timeout',

		'express', 'credit', 'farefree', 'pre_number', 'delivery_type',

		'user_id', 'city_id', 'group_ppid', 'group_pid', 'group_id', 'partner_id',

		'team_type', 'sort_order', 'farefree', 'state',
		
		'seo_title','seo_keyword','seo_description',

		'condbuy','image3','image4','image5','image6','image7','image8','image9',
		
		'image10','image11','image12','image13','image14','image15','image16',
		
		'infop1','infop2','infop3','infop4','infop5','infop6','infop7','infop8','infop9','infop10','tag','hot','weight',

		);



	$team['user_id'] = $login_user_id;

	$team['state'] = 'none';

	$team['begin_time'] = strtotime($team['begin_time']);

	$team['city_id'] = abs(intval($team['city_id']));
	
	if($team['group_id']){
		$team['group_id'] = abs(intval($team['group_id']));
	}
	else{
		if($team['group_pid']){
			$team['group_id'] = abs(intval($team['group_pid']));
		}else{
			$team['group_id'] = abs(intval($team['group_ppid']));
			$team['group_pid'] = abs(intval($team['group_ppid']));
		}
	}

	$team['partner_id'] = abs(intval($team['partner_id']));

	$team['sort_order'] = abs(intval($team['sort_order']));

	$team['fare'] = abs(intval($team['fare']));
	
	$team['pre_view'] = abs(intval($team['pre_view']));
	
	$team['view'] = $team['pre_view'];

	$team['farefree'] = abs(intval($team['farefree']));

	$team['pre_number'] = abs(intval($team['pre_number']));

	$team['end_time'] = strtotime($team['end_time']);

	$team['expire_time'] = strtotime($team['expire_time']);
	
	if($team['percent']==0) $team['percent'] = ($team['market_price']-$team['team_price'])/$team['market_price']*100;

	$team['image'] = upload_image('upload_image',$eteam['image'],'team');

	$team['image1'] = upload_image('upload_image1',$eteam['image1'],'team');

	$team['image2'] = upload_image('upload_image2',$eteam['image2'],'team');

	$team['image3'] = upload_image('upload_image3',$eteam['image3'],'team');

	$team['image4'] = upload_image('upload_image4',$eteam['image4'],'team');	

	$team['image5'] = upload_image('voucher_1',$eteam['image5'],'team');

	$team['image6'] = upload_image('voucher_2',$eteam['image6'],'team');
	
	$team['image7'] = upload_image('upload_image7',$eteam['image7'],'team');
		
	$team['image8'] = upload_image('upload_image8',$eteam['image8'],'team');
		
	$team['image9'] = upload_image('upload_image9',$eteam['image9'],'team');	
	
	$team['image10'] = upload_image('upload_image10',$eteam['image10'],'team');
	
	$team['image11'] = upload_image('upload_image11',$eteam['image11'],'team');	
	
	$team['image12'] = upload_image('upload_image12',$eteam['image12'],'team');	
	
	$team['image13'] = upload_image('upload_image13',$eteam['image13'],'team');	
	
	$team['image14'] = upload_image('upload_image14',$eteam['image14'],'team');	
	
	$team['image15'] = upload_image('upload_image15',$eteam['image15'],'team');	

	$team['image16'] = upload_image('upload_image16',$eteam['image16'],'team');	
	$team['picture'] = upload_image('upload_picture',$eteam['picture'],'team');	
	//team_type == goods
	
	$team['hot'] = $team['hot']? 1:0;

	if($team['team_type'] == 'goods'){ 

		$team['min_number'] = 1; 

		$tean['conduser'] = 'N';

	}

	if ( !$id ) {

		$team['now_number'] = $team['pre_number'];

	} else {

		$field = strtoupper($table->conduser)=='Y' ? null : 'quantity';

		$now_number = Table::Count('order', array(

					'team_id' => $id,

					'state' => 'pay',

					), $field);

		$team['now_number'] = ($now_number + $team['pre_number']);



		/* Increased the total number of state is not sold out */

		if ( $team['max_number'] > $team['now_number'] ) {

			$team['close_time'] = 0;

			$insert[] = 'close_time';

		}

	}



	$insert = array_unique($insert);

	$table = new Table('team', $team);

	$table->SetStrip('summary', 'detail', 'systemreview', 'notice');

	



	if ( $team['id'] && $team['id'] == $id ) {

		$table->SetPk('id', $id);

		$table->update($insert);
	//	print_r($insert); die();
		Session::Set('notice', 'Đã lưu dữ liệu!');

		redirect( WEB_ROOT . "/manage/team/index.php");

	} 

	else if ( $team['id'] ) {

		Session::Set('error', 'Lỗi khi sửa deal');

		redirect( WEB_ROOT . "/manage/team/index.php");

	}

	if ( $table->insert($insert) ) {

		Session::Set('notice', 'Thêm deal thành công!');
		
		redirect( WEB_ROOT . "/manage/team/index.php");
	}

	else {

		Session::Set('error', 'Có lỗi khi sữa dữ liệu');

		redirect(null);

	}

}


$partners = DB::LimitQuery('partner', array(

			'order' => 'ORDER BY id DESC',

			));

$partners = Utility::OptionArray($partners, 'id', 'title');

//Fetch cate 

$roots = DB::LimitQuery('cate', array('condition' => array( 'type' => 'root', ),));
$roots = Utility::OptionArray($roots, 'id', 'name');

$childs = DB::LimitQuery('cate', array('condition' => array( 'type' => 'child', ),));
$childs = Utility::OptionArray($childs, 'id', 'name');

$subchilds = DB::LimitQuery('cate', array('condition' => array( 'type' => 'subchild', ),));
$subchilds = Utility::OptionArray($subchilds, 'id', 'name');


$selector = $team['id'] ? 'edit' : 'create';

include template('manage_team_edit');

