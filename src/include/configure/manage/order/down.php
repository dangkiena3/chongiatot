<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('order');
//fetch deal current
$daytime = strtotime(date('Y-m-d H:s:i'));//gets current day

//Filter date
if ( $_POST ) {
	$begin_time = strtotime($_POST['begintime']);
	$end_time = strtotime($_POST['endtime']);
	$beginid = intval($_POST['beginid']);
	$endid = intval($_POST['endid']);
	$pay_state = $_POST['pay_state'];
	$order_state = $_POST['order_state'];
	//$city_id = intval($_POST['city_id']);
	if($_POST['type']=='chkid'){
		if (!$beginid || !$endid){
		Session::Set('error', 'Thông tin bạn nhập chưa đầy đủ xin điền lại!');
		redirect( WEB_ROOT . '/manage/order/down.php' );
		}
		$condition = array();
		$condition[] = "id IN (SELECT order_id FROM team_order WHERE id BETWEEN '{$beginid}' AND '{$endid}')";
	}else{
	if (!$begin_time || !$end_time){
		//die('-ERR ERR_CHECK');
		Session::Set('error', 'Thông tin bạn nhập chưa đầy đủ xin điền lại!');
		redirect( WEB_ROOT . '/manage/order/down.php' );
	}

	
	//Condition gets current deal 
	$condition = array(
		"create_time >= '{$begin_time}'",
		"create_time <= '{$end_time}'",
	);
	}
	$orders = DB::LimitQuery('order', array(
		'condition' => $condition,
		'order' => 'ORDER BY id DESC, create_time ASC',
	));
	
	if (!$orders){
		//die('-ERR ERR_NO_DATA');
		Session::Set('error', 'Không có dữ liệu để xuất, xin điền lại chính xác!');
		redirect( WEB_ROOT . '/manage/order/down.php' );
	}

	$name = 'order_'.date('d.m.Y',$begin_time).'_'.date('d.m.Y',$end_time);
	$kn = array(
			'order_code' => 'Mã ĐH',
			'title' => 'Tên SP',	
			'price' => 'Giá bán',
			'quantity' => 'Số lượng',
		//	'fare' => 'Phí Ship',
			'total' => 'Thành tiền',
			'time_order' => 'Đặt hàng lúc',
			'state' => 'Trạng thái',
			'username' => 'Họ tên',
			'address'   => 'Địa chỉ',
			'quan'      =>'Quận',
			'thanhpho'  =>'TP',
			'usermobile' => 'Điện thoại',
			'remark' => 'Ghi chú',	
		);

	$eorders = array();
	foreach( $orders AS $one ) {
		$team_ids = DB::LimitQuery('team_order', array(
			'condition' => array('order_id' => $one['id']),
			'order' => 'ORDER BY team_id DESC',
		));
		foreach($team_ids as $stt =>$one1){
			$team = Table::Fetch('team', $one1['team_id']);
			$info = 'infop'.$one1['info_id'];
            $opt =  $team[$info]?$team[$info]:''; 
			
			$one1['order_code'] = $one['order_code'];
			if($one['order_code']==$one1['order_code'])
			$zero = 0;
			$one1['title'] = $zero.'-'.$team['product'].' '.$opt;
			$one1['username'] = $one['fullname'];
			$one1['usermobile'] = $one['mobile'];
			$one1['thanhpho'] = get_name_local($one['province_id']);
			$one1['quan'] = get_name_local($one['district_id']);
			$one1['address'] = $one['address'].', '.get_name_local($one['ward_id']);;
			$one1['price'] = $team['team_price'];
			$one1['fare'] = 0;
			$one1['total'] = ($team['team_price']*$one1['quantity']) + $one1['fare'];
			$one1['be_pay'] = $one['credit']+$one['card'];
			
			$one1['time_order'] = date('Y-m-d H:i',$one['create_time']);
			$one1['remark'] = $one['remark'];
			$one1['state'] = $tracking[$one1['track']];
			$one1['order_state'] = $option_order_state[$one['order_state']];
			$one1['method'] = get_name_method($one['method_id']);
			$eorders[] = $one1;
		}
	}
	down_xls($eorders, $kn, $name);
}

include template('manage_order_down');
