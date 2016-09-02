<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

need_partner();

$action = strval($_GET['action']);
$id = abs(intval($_GET['id']));

if ( 'orderrefund' == $action) {
	need_auth('admin');
	$order = Table::Fetch('order', $id);
	$rid = strtolower(strval($_GET['rid']));
	if ( $rid == 'credit' ) {
		ZFlow::CreateFromRefund($order);
	} else {
		Table::UpdateCache('order', $id, array(
					'service' => 'cash',
					'state' => 'unpay'
			));
	}
	/* team -- */
	$team = Table::Fetch('team', $order['team_id']);
	team_state($team);
	if ( $team['state'] != 'failure' ) {
		$minus = $team['conduser'] == 'Y' ? 1 : $order['quantity'];
		Table::UpdateCache('team', $team['id'], array(
					'now_number' => array( "now_number - {$minus}", ),
		));
	}
	/* card refund */
	if ( $order['card_id'] ) {
		Table::UpdateCache('card', $order['card_id'], array(
			'consume' => 'N',
			'team_id' => 0,
			'order_id' => 0,
		));
	}
	/* coupons */
	if ( in_array($team['delivery'], array('coupon', 'pickup') )) {
		$coupons = Table::Fetch('coupon', array($order['id']), 'order_id');
		foreach($coupons AS $one) Table::Delete('coupon', $one['id']);
	}

	/* order update */
	Table::UpdateCache('order', $id, array(
				'card' => 0, 
				'card_id' => '',
				'express_id' => 0,
				'express_no' => '',
				));
	//================= update voucher istatus = 2 ====================
	$filter = array('order_id'=>$id,'user_id'=>$_GET['user_id']);
	$vouchers = DB::LimitQuery('voucher', array('condition'=>$filter));
	foreach ($vouchers as $v=>$o){
		Table::UpdateCache('voucher', $o['id'], array('istatus'=>2));
	}
	//==========================end====================================
	Session::Set('notice', 'Refunded');
	json(null, 'refresh');
}
elseif ( 'orderremove' == $action) {
	need_auth('order');
	$order = Table::Fetch('order', $id);
	if ( $order['state'] != 'unpay' ) {
		json('Đơn hàng chưa thanh toán nên không thể xóa', 'alert');
	}
	/* card refund */
	if ( $order['card_id'] ) {
		Table::UpdateCache('card', $order['card_id'], array(
			'consume' => 'N',
			'team_id' => 0,
			'order_id' => 0,
		));
	}
	Table::Delete('order', $order['id']);
	Session::Set('notice', "Delete Order {$order['id']} Success");
	json(null, 'refresh');
}
/**
 * cài đặt khách hàng đã thanh toán và email thông báo
 * tạo dãy voucher random cho đơn hàng này.
 */
else if ( 'ordercash' == $action ) {
	need_auth('order');
	$order = Table::Fetch('order', $id);
	ZOrder::CashIt($order);
	$user = Table::Fetch('user', $order['user_id']);
	$team = Table::Fetch('team', $order['team_id']);
	/*
	 * create voucher serial random
	 */
	$voucher = array();
	$voucher['order_id']=	$id;
	$voucher['user_id']	=	$user['id'];
	$voucher['team_id']	=	$team['id'];
	$voucher['create_date']	=	time();
	$voucher['iused']	=	1;
	$quantity	=	abs(intval($_GET['quantity']));
	for($i=1; $i<=$quantity; $i++){
		$voucher['serial']	=	($i. rand(1000000, 9999999). $id);
		$insert = array('order_id','user_id','team_id','serial','create_date','iused');
		$table = new  Table('voucher', $voucher);
		$table->Insert($insert);
	}
	// thông báo đến khách hàng tình trạng hóa đơn đã thanh toán
	mail_order($order);
	Session::Set('notice', "Thanh toán thành công, đã gửi email đến địa chỉ {$user['email']}");
	json(null, 'refresh');
}
else if ( 'teamdetail' == $action) {
	$team = Table::Fetch('team', $id);
	$partner = Table::Fetch('partner', $team['partner_id']);

	$paycount = Table::Count('order', array(
		'state' => 'pay',
		'team_id' => $id,
	));
	$buycount = Table::Count('order', array(
		'state' => 'pay',
		'team_id' => $id,
	), 'quantity');
	$onlinepay = Table::Count('order', array(
		'state' => 'pay',
		'team_id' => $id,
	), 'money');
	$creditpay = Table::Count('order', array(
		'state' => 'pay',
		'team_id' => $id,
	), 'credit');
	$cardpay = Table::Count('order', array(
		'state' => 'pay',
		'team_id' => $id,
	), 'card');
	$couponcount = Table::Count('coupon', array(
		'team_id' => $id,
	));
	$team['state'] = team_state($team);
	$city_id = abs(intval($team['city_id']));
	$subcond = array(); if($city_id) $subcond['city_id'] = $city_id;
	$subcount = Table::Count('subscribe', $subcond);
	$subcond['enable'] = 'Y';
	$smssubcount = Table::Count('smssubscribe', $subcond);

	/* send team subscribe mail */	
	$team['noticesubscribe'] = ($team['close_time']==0&&is_manager());
	$team['noticesmssubscribe'] = ($team['close_time']==0&&is_manager());
	/* send success coupon */
	$team['noticesms'] = ($team['delivery']!='express')&&(in_array($team['state'], array('success', 'soldout')))&&is_manager();
	/* teamcoupon */
	$team['teamcoupon'] = ($team['noticesms']&&$buycount>$couponcount);
	$team['needline'] = ($team['noticesms']||$team['noticesubscribe']||$team['teamcoupon']);

	$html = render('manage_ajax_dialog_teamdetail');
	json($html, 'dialog');
}
// remove bank
else if ('bankremove'== $action){
	$id = strval($_GET['id']);
	if(Table::Delete('bank', $id)){
		Session::Set('notice', "Đã xóa thông tin ngân hàng số {$id}");
		json(null, 'refresh');
	}
}
else if ('vmarketcmtremove'== $action){
	$id = strval($_GET['id']);
	if(Table::Delete('vmarket_cmt', $id)){
		Session::Set('notice', "Đã xóa bàn luận này không?");
		json(null, 'refresh');
	}
}
else if ('adsremove'== $action){
	$id = strval($_GET['id']);
	if(Table::Delete('adsense', $id)){
		Session::Set('notice', "Đã xóa thông thông tin quảng cáo số {$id}");
		json(null, 'refresh');
	}
}
else if ('methodremove'== $action){
	$id = strval($_GET['id']);
	if(Table::Delete('shipping_method', $id)){
		Session::Set('notice', "Đã xóa thông tin phương thức số {$id}");
		json(null, 'refresh');
	}
}
else if ('costremove'== $action){
	$id = strval($_GET['id']);
	if(Table::Delete('shipping_cost', $id)){
		Session::Set('notice', "Đã xóa thông tin phí giao hàng số {$id}");
		json(null, 'refresh');
	}
}
else if ('sliderremove'== $action){
	$id = strval($_GET['id']);
	if(Table::Delete('slider', $id)){
		Session::Set('notice', "Đã xóa thông tin trình ảnh số {$id}");
		json(null, 'refresh');
	}
}
else if ('newsremove'== $action){
	$id = strval($_GET['id']);
	if(Table::Delete('news', $id)){
		Session::Set('notice', "Đã xóa thông tin tin tức số {$id}");
		json(null, 'refresh');
	}
}
else if ('locationremove'== $action){
	$id = strval($_GET['id']);
	if(Table::Delete('location', $id)){
		Session::Set('notice', "Đã xóa thông tin khu vực số {$id}!");
		json(null, 'refresh');
	}
}
else if ('cateremove'== $action){
	$id = strval($_GET['id']);
	$child_count = Table::Count('cate',array('pid'=>$id));
	if($child_count>0) json('Hãy xóa danh mục con của nó trước','alert');
	else
		if(Table::Delete('cate', $id)){
			Session::Set('notice', "Đã xóa danh mục số {$id}!");
			json(null, 'refresh');
		}
}
else if ( 'teamremove' == $action) {
	need_auth('team');
	$team = Table::Fetch('team', $id);
	$order_count = Table::Count('order', array(
		'team_id' => $id,
		'state' => 'pay',
	));
	if ( $order_count > 0 ) {
		json('Deal chứa đơn hàng nên không thể xóa', 'alert');
	}
	ZTeam::DeleteTeam($id);

	/* remove coupon */
	$coupons = Table::Fetch('coupon', array($id), 'team_id');
	foreach($coupons AS $one) Table::Delete('coupon', $one['id']);
	/* remove order */
	$orders = Table::Fetch('order', array($id), 'team_id');
	foreach($orders AS $one) Table::Delete('order', $one['id']);
	/* end */

	Session::Set('notice', "Customers {$id} Deleted successfully");
	json(null, 'refresh');
}
else if ( 'cardremove' == $action) {
	need_auth('market');
	$id = strval($_GET['id']);
	$card = Table::Fetch('card', $id);
	if (!$card) json('No relevant vouchers', 'alert');
	if ($card['consume']=='Y') { json('Vouchers have been used You can Not Delete', 'alert'); }
	Table::Delete('card', $id);
	Session::Set('notice', "Vouchers {$id} Deleted successfully");
	json(null, 'refresh');
}
else if ( 'userview' == $action) {
	$user = Table::Fetch('user', $id);
	$user['costcount'] = Table::Count('order', array(
		'state' => 'pay',
		'user_id' => $id,
	));
	$user['cost'] = Table::Count('flow', array(
		'direction' => 'expense',
		'user_id' => $id,
	), 'money');
	$html = render('manage_ajax_dialog_user');
	json($html, 'dialog');
}
else if ( 'usermoney' == $action) {
	need_auth('admin');
	$user = Table::Fetch('user', $id);
	$money = moneyit($_GET['money']);
	if ( $money < 0 && $user['money'] + $money < 0) {
		json('Failed to mention is - insufficient funds', 'alert');
	}
	if ( ZFlow::CreateFromStore($id, $money) ) {
		$action = ($money>0) ? 'Top-Line' : 'Users are provided';
		$money = abs($money);
		json(array(
					array('data' => "{$action}{$money}Per successful", 'type'=>'alert'),
					array('data' => null, 'type'=>'refresh'),
				  ), 'mix');
	}
	json('Recharge fail', 'alert'); 
}
else if ( 'orderexpress' == $action ) {
	need_auth('order');
	$express_id = abs(intval($_GET['eid']));
	$express_no = strval($_GET['nid']);
	if (!$express_id) $express_no = null;
	Table::UpdateCache('order', $id, array(
		'express_id' => $express_id,
		'express_no' => $express_no,
	));
	json(array(
				array('data' => "Successful delivery of information to modify", 'type'=>'alert'),
				array('data' => null, 'type'=>'refresh'),
			  ), 'mix');
}
// xem chi tiết thông báo chuyển khoản
else if ('detailbankalert'==$action){
	$id = abs(intval($_GET['id']));
	$payment	=	Table::Fetch('payment',$id);
	$banks = Table::Fetch('bank', $payment['bank_id']);
	$html = render('manage_ajax_dialog_paymentview');
	json($html, 'dialog');
}
// set đã duyệt bản tin này
else if ('setokbankalert'==$action){
	$id = abs(intval($_GET['id']));
	$flag	=	$_GET['flag'];
	if(!empty($id) && !empty($flag)){
		if($flag=='yes') { // set ok
			$setok	=	Table::UpdateCache('payment',$id, array('flag'=>2));
			if($setok){
				Session::Set('notice', 'Đã cập nhật thông tin số  ' . $id);
				json(null, 'refresh');
			}
		}
		else { // set not ok
			$setok	=	Table::UpdateCache('payment',$id, array('flag'=>1));
			if($setok){
				Session::Set('notice', 'Đã cập nhật thông tin số  ' . $id);
				json(null, 'refresh');
			}
		}
	}
}
else if ('deletebankalert'==$action){
	$id = abs(intval($_GET['id']));
	$payment	=	Table::Fetch('payment',$id);
	if(!empty($id)){
		if($payment['flag']==2){
			Session::Set('notice', 'Không xóa được thông tin này '. $id . ' - Hãy set Not OK rồi xóa!');
			json(null, 'refresh');	
		}
		else{
			$delete	=	Table::Delete('payment', $id);
			if($delete){
				Session::Set('notice', 'Đã xóa thông tin số  ' . $id);
				json(null, 'refresh');
			}
		}
	}
}
else if ( 'orderview' == $action) {
	$order = Table::Fetch('order', $id);
	$user = Table::Fetch('user', $order['user_id']);
	$team = Table::Fetch('team', $order['team_id']);
	if ($team['delivery'] == 'express') {
		$option_express = option_category('express');
	}
	$payservice = array(
		'alipay' => 'Alipay',
		'tenpay' => 'tenpay',
		'chinabank' => 'chinabank',
		'credit' => 'credit',
		'cash' => 'cash',
	);
	$paystate = array(
		'unpay' => '<font color="green">Unpaid</font>',
		'pay' => '<font color="red">Paid</font>',
	);
	$option_refund = array(
		'credit' => 'Refund to the account balance',
		'online' => 'Other means have been refunded',
	);
	$html = render('manage_ajax_dialog_orderview');
	json($html, 'dialog');
}
else if ( 'orderdetail' == $action) {
	$order = Table::Fetch('order', $id);
	$user = Table::Fetch('user', $order['user_id']);
	$team_orders = DB::LimitQuery('team_order', array('condition'=>array('order_id'=>$id)));
	$team = Table::Fetch('team', $order['team_id']);
	if ($team['delivery'] == 'express') {
		$option_express = option_category('express');
	}
	$paystate = array(
		'unpay' => '<font color="green">Chưa thanh toán</font>',
		'pay' => '<font color="red">Đã thanh toán</font>',
	);
	$option_delivery = array(
		'Y' => 'Đã giao hàng',
		'N' => 'Chưa giao hàng',
	);
	$html = render('manage_ajax_dialog_orderdetail');
	json($html, 'dialog');
}
else if ( 'inviteok' == $action ) {
	need_auth('admin');
	$express_id = abs(intval($_GET['eid']));
	$invite = Table::Fetch('invite', $id);
	if (!$invite || $invite['pay']!='N') {
		json('Illegal Operation', 'alert');
	}
	if(!$invite['team_id']) {
		json('No Purchaseï¼ŒRebate can not be performed', 'alert');
	}
	$team = Table::Fetch('team', $invite['team_id']);
	$team_state = team_state($team);
	if (!in_array($team_state, array('success', 'soldout'))) {
		json('Customers can only execute successfully invited rebates', 'alert');
	}
	Table::UpdateCache('invite', $id, array(
				'pay' => 'Y', 
				'admin_id'=>$login_user_id,
				));
	$invite = Table::FetchForce('invite', $id);
	ZFlow::CreateFromInvite($invite);
	Session::Set('notice', 'Operating successfully invited rebate');
	json(null, 'refresh');
}
else if ( 'inviteremove' == $action ) {
	need_auth('admin');
	Table::UpdateCache('invite', $id, array(
		'pay' => 'C',
		'admin_id' => $login_user_id,
	));
	Session::Set('notice', 'Cancel the invitation to record a successful unlawfully');
	json(null, 'refresh');
}
else if ( 'subscriberemove' == $action ) {
	need_auth('admin');
	$subscribe = Table::Fetch('subscribe', $id);
	if ($subscribe) {
		ZSubscribe::Unsubscribe($subscribe);
		Session::Set('notice', "Xóa địa chỉ email ['email']} trong danh sách thành công!");
	}
	json(null, 'refresh');
}
else if ( 'smssubscriberemove' == $action ) {
	need_auth('admin');
	$subscribe = Table::Fetch('smssubscribe', $id);
	if ($subscribe) {
		ZSMSSubscribe::Unsubscribe($subscribe['mobile']);
		Session::Set('notice', "Phone number {$subscribe['mobile']}Unsubscribe successful");
	}
	json(null, 'refresh');
}
else if ( 'partnerremove' == $action ) {
	need_auth('market');
	$partner = Table::Fetch('partner', $id);
	$count = Table::Count('team', array('partner_id' => $id) );
	if ($partner && $count==0) {
		Table::Delete('partner', $id);
		Session::Set('notice', "Businessï¼š{$id} Deleted successfully");
		json(null, 'refresh');
	}
	if ( $count > 0 ) {
		json('Business has Itemsï¼ŒDelete Failed', 'alert'); 
	}
	json('Business Delete failed', 'alert'); 
}
else if ( 'noticesms' == $action ) {
	need_auth('team');
	$nid = abs(intval($_GET['nid']));
	$now = time();
	$team = Table::Fetch('team', $id);
	$condition = array( 'team_id' => $id, );
	$coups = DB::LimitQuery('coupon', array(
				'condition' => $condition,
				'order' => 'ORDER BY id ASC',
				'offset' => $nid,
				'size' => 1,
				));
	if ( $coups ) {
		foreach($coups AS $one) {
			$nid++;
			sms_coupon($one);
		}
		json("X.misc.noticesms({$id},{$nid});", 'eval');
	} else {
		json($INI['system']['couponname'].'Send completed', 'alert');
	}
}
else if ( 'noticesmssubscribe' == $action ) {
	need_auth('team');
	$nid = abs(intval($_GET['nid']));
	$team = Table::Fetch('team', $id);
	$condition = array( 'enable' => 'Y' );
	if(abs(intval($team['city_id']))) {
		$condition['city_id'] = abs(intval($team['city_id']));
	}
	$subs = DB::LimitQuery('smssubscribe', array(
				'condition' => $condition,
				'order' => 'ORDER BY id ASC',
				'offset' => $nid,
				'size' => 10,
				));
	$content = render('manage_tpl_smssubscribe');
	if ( $subs ) {
		$mobiles = Utility::GetColumn($subs, 'mobile');
		$nid += count($mobiles);
		$mobiles = implode(',', $mobiles);
		$smsr = sms_send($mobiles, $content);
		if ( true === $smsr ) {
			usleep(500000);
			json("X.misc.noticenextsms({$id},{$nid});", 'eval');
		} else {
			json("Send failed, error codeï¼š{$smsr}", 'alert');
		}
	} else {
		json('Subscribe to SMS Send completed', 'alert');
	}
}
else if ( 'noticesubscribe' == $action ) {
	need_auth('team');
	$nid = abs(intval($_GET['nid']));
	$now = time();
	$interval = abs(intval($INI['mail']['interval']));
	$team = Table::Fetch('team', $id);
	$partner = Table::Fetch('partner', $team['partner_id']);
	$city = Table::Fetch('city', $team['city_id']);

	$condition = array();
	if(abs(intval($team['city_id']))) {
		$condition['city_id'] = abs(intval($team['city_id']));
	}
	$subs = DB::LimitQuery('subscribe', array(
				'condition' => $condition,
				'order' => 'ORDER BY id ASC',
				'offset' => $nid,
				'size' => 1,
				));
	if ( $subs ) {
		foreach($subs AS $one) {
			$nid++;
			try{
				ob_start();
				mail_subscribe($city, $team, $partner, $one);
				ob_get_clean();
			}catch(Exception $e){}
			$cost = time() - $now;
			if ( $cost >= 20 ) {
				json("X.misc.noticenext({$id},{$nid});", 'eval');
			}
		}
		$cost = time() - $now;
		if ($interval && $cost < $interval) { sleep($interval - $cost); }
		json("X.misc.noticenext({$id},{$nid});", 'eval');
	} else {
		json('Subscribe to e-mail completed', 'alert');
	}
}
elseif ( 'categoryedit' == $action ) {
	need_auth('admin');
	if ($id) {
		$category = Table::Fetch('category', $id);
		if (!$category) json('No data', 'alert');
		$zone = $category['zone'];
	} else {
		$zone = strval($_GET['zone']);
	}
	if ( !$zone ) json('Make sure the classification', 'alert');
	$zone = get_zones($zone);

	$html = render('manage_ajax_dialog_categoryedit');
	json($html, 'dialog');
}
elseif ( 'categoryremove' == $action ) {
	need_auth('admin');
	$category = Table::Fetch('category', $id);
	if (!$category) json('No such category', 'alert');
	if ($category['zone'] == 'city') {
		$tcount = Table::Count('team', array('city_id' => $id));
		if ($tcount ) json('Item already exists in this category', 'alert');
	}
	elseif ($category['zone'] == 'group') {
		$tcount = Table::Count('team', array('group_id' => $id));
		if ($tcount ) json('Item already exists in this category', 'alert');
	}
	elseif ($category['zone'] == 'express') {
		$tcount = Table::Count('order', array('express_id' => $id));
		if ($tcount ) json('Order items exist in this category', 'alert');
	}
	elseif ($category['zone'] == 'public') {
		$tcount = Table::Count('topic', array('public_id' => $id));
		if ($tcount ) json('Topic already Exists', 'alert');
	}
	elseif ($category['zone'] == 'news') {
		$tcount = Table::Count('news', array('public_id' => $id));
		if ($tcount ) json('Topic already Exists', 'alert');
	}

	Table::Delete('category', $id);
	option_category($category['zone']);
	Session::Set('notice', 'Category Removed!');
	json(null, 'refresh');
}
else if ( 'teamcoupon' == $action ) {
	need_auth('team');
	$team = Table::Fetch('team', $id);
	team_state($team);
	if ($team['now_number']<$team['min_number']) {
		json('Buy or not is not the end of the minimum number of people into the group', 'alert');
	}

	/* all orders */
	$all_orders = DB::LimitQuery('order', array(
		'condition' => array(
			'team_id' => $id,		
			'state' => 'pay',
		),
	));
	$all_orders = Utility::AssColumn($all_orders, 'id');
	$all_order_ids = Utility::GetColumn($all_orders, 'id');
	$all_order_ids = array_unique($all_order_ids);

	/* all coupon id */
	$coupon_sql = "SELECT order_id, count(1) AS count FROM coupon WHERE team_id = '{$id}' GROUP BY order_id";
	$coupon_res = DB::GetQueryResult($coupon_sql, false);
	$coupon_order_ids = Utility::GetColumn($coupon_res, 'order_id');
	$coupon_order_ids = array_unique($coupon_order_ids);

	/* miss id */
	$miss_ids = array_diff($all_order_ids, $coupon_order_ids);
	foreach($coupon_res AS $one) {
		if ($one['count'] < $all_orders[$one['order_id']]['quantity']) {
			$miss_ids[] = $one['order_id'];
		}
	}
	$orders = Table::Fetch('order', $miss_ids);

	foreach($orders AS $order) {
		ZCoupon::Create($order);
	}
	json('Successfully issued securities',  'alert');
}
elseif ( $action == 'partnerhead' ) {
	$partner = Table::Fetch('partner', $id);
	$head = ($partner['head']==0) ? time() : 0;
	Table::UpdateCache('partner', $id, array( 'head' => $head,));
	$tip = $head ? 'Set Top Business Success' : 'Top Business success Cancel';
	Session::Set('notice', $tip);
	json(null, 'refresh');
}
elseif ( 'cacheclear' == $action ) {
	need_auth('admin');
	$root = DIR_COMPILED;
	$handle = opendir($root);
	$templatelist = array( 'default'=> 'default',);
	$clear = $unclear = 0;
	while($one = readdir($handle)) {
		if ( strpos($one,'.') === 0 ) continue;
		$onefile = $root . '/' . $one;
		if ( is_dir($onefile) ) continue;
		if(@unlink($onefile)) { $clear ++; }
		else { $unclear ++; }
	}
	json("Operation is successful, clear the cache files{$clear} Not Clear{$unclear}", 'alert');
} //code by mrnhan108@gmail.com
elseif ( 'website' == $action ) {
	need_auth('admin');
	if (!$id) json('No data', 'alert');
	$html = render('manage_ajax_dialog_website');
	json($html, 'dialog');
}
elseif ( 'websitedel' == $action ) {
	//need_auth('admin');
	$category = Table::Fetch('website', $id);
	if (!$category) json('Không tồn tại', 'alert');
	Table::Delete('website', $id);
	Session::Set('notice', 'Đã xóa thành công!');
	json(null, 'refresh');
}
elseif ( 'websitesource' == $action ) {
	//need_auth('admin');
	$category = Table::Fetch('website', $id);
	if (!$category) json('Không tồn tại', 'alert');
	$html = render('manage_ajax_dialog_source');
	json($html, 'dialog');
}
else if ( 'feedback' == $action) {
	$html = render('ajax_dialog_feedback');
	json($html, 'dialog');
}
