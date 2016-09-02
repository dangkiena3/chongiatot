<?php

/*
 * mrnhan108@gmail.com
 */

function current_frontend() {

	global $INI;

	$a = array();

	$a['/'] = 'Giá tốt hôm nay';

	$a['/Gia-Tot-Gan-Day'] = 'Giá tốt gần đây';

	$a['/Tin-Khuyen-Mai'] = 'Tin khuyến mãi';

	$a['/cach-thuc-mua-hang'] = 'Hướng dẫn';


	$r = $_SERVER['REQUEST_URI'];


	if (preg_match('#/Gia-Tot-Gan-Day#',$r)) $l = '/Gia-Tot-Gan-Day';


	elseif (preg_match('#/Tin-Khuyen-Mai#',$r)) $l = '/Tin-Khuyen-Mai';

	elseif (preg_match('#/cach-thuc-mua-hang#',$r)) $l = '/cach-thuc-mua-hang';

	else $l = '/';

	return current_link_menu($l, $a);

}

function current_link_menu($link, $links, $span=false) {

	$html = '';

	$span = $span ? '<span></span>' : '';

	foreach($links AS $l=>$n) {

		if (trim($l,'/')==trim($link,'/')) {

			if($l=='/')

				$html .= "<li><a  class=\"selected first\" href=\"{$l}\">{$n}</a>{$span}<span class='nav-separate'></span></li>";

			else

				$html .= "<li><a  class=\"selected\" href=\"{$l}\">{$n}</a>{$span}<span class='nav-separate'></span></li>";

		} else {

			if($l=='/') 

				$html .= "<li><a class=\"first\" href=\"{$l}\">{$n}</a>{$span}<span class='nav-separate'></span></li>";

			else 

				$html .= "<li><a href=\"{$l}\">{$n}</a>{$span}<span class='nav-separate'></span></li>";

		}

	}

	return $html;

}



//menu category today

function current_teamcategory($gid='0') {

	global $city;

	$daytime = strtotime(date('Y-m-d H:s:i'));

	$dk = array(

		'team_type' => 'normal',

		'city_id' => array(0, "{$city['id']}"),

		"begin_time <= '{$daytime}'",

		"end_time > '{$daytime}'",

	);

	$all_sl = Table::Count('team', $dk);

	$a = array('/deal-hom-nay.html' => 'Tất cả ('.$all_sl.')',);

	foreach(option_hotcategory('group') AS $id=>$name) {

		$dk['group_id'] = $id;

		$sl = Table::Count('team', $dk);

		$link = rewrite_cate($id);

		if($sl==0) $a["{$link}"] = $name;

		else $a["{$link}"] = $name.' ('.$sl.')';

	}

	$l = $_SERVER['REQUEST_URI'];

	return current_link($l, $a, true);

}

//menu category recent

function current_teamcate_recent($gid='0') {

	global $city;

	$daytime = strtotime(date('Y-m-d H:s:i'));

	$dk = array(

		'team_type' => 'normal',

		'city_id' => array(0, "{$city['id']}"),

		"begin_time <= '{$daytime}'",

		"end_time > '{$daytime}'",

	);

	$all_sl = Table::Count('team', $dk);

	$a = array('/deal-gan-day.html' => 'Tất cả ('.$all_sl.')',);

	foreach(option_hotcategory('group') AS $id=>$name) {

		$dk['group_id'] = $id;

		$sl = Table::Count('team', $dk);

		$link = rewrite_cate_recent($id);

		if($sl==0) $a["{$link}"] = $name;

		else $a["{$link}"] = $name.' ('.$sl.')';

	}

	$l = $_SERVER['REQUEST_URI'];

	return current_link($l, $a, true);

}

//Cate menu shop

//Get child cate from root id

function option_cate($pid='0'){

	$cates = DB::LimitQuery('cate', array(

		'condition' => array('pid' => $pid, 'display' => 'Y',),

		'order' => 'ORDER BY sort_order DESC, id DESC',

	));

	return Utility::OptionArray($cates,'id','name');

}

/*function current_cateshop(){

	$sel = $_SERVER['REQUEST_URI'];

	$html = "";

	foreach(option_cate('0') AS $id=>$name) {

		if ($sel == rewrite_cate_shop($id))

			$html .="<div class='cate-item'><div class='parrent'><a class='cate_selected' href='".rewrite_cate_shop($id)."' title='".$name."'>".$name."</a></div>";

		else

			$html .="<div class='cate-item'><div class='parrent'><a href='".rewrite_cate_shop($id)."' title='".$name."'>".$name."</a></div>";

		$cate_child = option_cate($id);

		if($cate_child){

			$html .= "<div class='child-list'><ul>";

			foreach($cate_child AS $id1=>$name1) {

				$html .="<li><a href='".rewrite_cate_shop($id1)."' title='".$name1."'>".$name1."</a></li>";

			}

			$html .= "</ul></div><div class='clear'></div></div>";

		}else{

			$html .="<div style='display: block; height: 5px;'></div></div>";

		}

	}

	$html .= "";

	return $html;

}*/

function current_cateshop(){
	$sel = $_SERVER['REQUEST_URI'];
	$html = "";
	foreach(option_cate('0') AS $id=>$name) {
		if ($sel == rewrite_cate_shop($id))
			$html .="<div class='cate-item'><div class='parrent'><a class='cate_selected' href='".rewrite_cate_shop($id)."' title='".$name."'>".$name."</a></div>";
		else
			$html .="<div class='cate-item'><div class='parrent'><a href='".rewrite_cate_shop($id)."' title='".$name."'>".$name."</a></div>";
		$cate_child = option_cate($id);
		if($cate_child){
			$html .= "<div class='child-list'><ul>";
			foreach($cate_child AS $id1=>$name1) {
				$html .="<li><a href='".rewrite_cate_shop($id1)."' title='".$name1."'>".$name1."</a></li>";
			}
			$html .= "</ul></div><div class='clear'></div></div>";
		}else{
			$html .="<div style='display: block; height: 5px;'></div></div>";
		}
	}
	$html .= "";
	return $html;
}

//cate thd menu
function option_cate_thd($pid='0'){
	$cates = DB::LimitQuery('cate', array(
		'condition' => array('pid' => $pid, 'display' => 'Y','cate_type' => 'deal'),
		'order' => 'ORDER BY sort_order DESC, id DESC',
	));
	return Utility::OptionArray($cates,'id','name');
}
function current_cate_thd(){
	$sel = $_SERVER['REQUEST_URI'];
	$html = "";
	foreach(option_cate_thd('0') AS $id=>$name) {
		$cate = Table::Fetch('cate', $id);
		if ($sel == rewrite_cate_shop($id))
			$html .="<div class='cate-item'><div class='parrent'><img src='/static/".$cate['image_cate']."' alt='".$cate['name']."' width='16' height='16' /><a class='cate_selected athd' href='".rewrite_cate_shop($id)."' title='".$name."'>".$name."<span class='deal_count'>(".count_team_cate($id).")</span></a></div>";
		else
			$html .="<div class='cate-item'><div class='parrent'><img src='/static/".$cate['image_cate']."' alt='".$cate['name']."' width='16' height='16' /><a class='athd' href='".rewrite_cate_shop($id)."' title='".$name."'>".$name."<span class='deal_count'>(".count_team_cate($id).")</span></a></div>";
		$cate_child = option_cate_thd($id);
		if($cate_child){
			$html .= "<div class='child-list'><ul>";
			foreach($cate_child AS $id1=>$name1) {
				$html .="<li><a href='".rewrite_cate_shop($id1)."' title='".$name1."'>".$name1."</a></li>";
			}
			$html .= "</ul></div><div class='clear'></div></div>";
		}else{
			$html .="<div style='display: block; height: 5px;'></div></div>";
		}
	}
	$html .= "";
	return $html;
}


function option_menu(){

	$html = "";

	foreach(option_cate('0') AS $id=>$name) {

		$html .="<option value='{$id}'>{$name}</option>";

		$cate_child = option_cate($id);

		if($cate_child){

			foreach($cate_child AS $id1=>$name1) {

				$html .="<option value='{$id1}'>--{$name1}</option>";

			}

		}

	}

	return $html;

}



function current_backend() {

	global $INI;

	$a = array(

			'/manage/misc/index.php' => 'Quản trị',

			'/manage/team/index.php' => 'Sản phẩm',

			'/manage/order/index.php' => 'Đơn hàng',

			//'/manage/coupon/index.php' => 'Phiếu',

			'/manage/user/index.php' => 'Khách hàng',

		//	'/manage/market/index.php' => 'Quảng bá',

			'/manage/category/index.php' => 'Chuyên mục',

		//	'/manage/location/index.php' => 'Khu vực',

			'/manage/cate/index2.php' => 'Danh mục',

		//	'/manage/news/index.php' => 'Tin tức',

			//'/manage/vote/index.php' => 'Đánh giá',

			//'/manage/credit/index.php' => 'Tín dụng',

			'/manage/adsense/position.php'=>'Quảng cáo',

			'/manage/system/index.php' => 'Hệ thống',

			);

	$r = $_SERVER['REQUEST_URI'];

	if (preg_match('#/manage/(\w+)/#',$r, $m)) {

		$l = "/manage/{$m[1]}/index.php";

	} else $l = '/manage/misc/index.php';

	return current_link($l, $a);

}

function current_biz() {

	global $INI;

	$a = array(
			'/biz/team/index.php' => 'Danh sách',
			'/biz/team/edit.php' => 'Thêm mới',
			);
	$r = $_SERVER['REQUEST_URI'];

	if (preg_match('#/biz/coupon#',$r)) $l = '/biz/coupon.php';

	elseif (preg_match('#/biz/settings#',$r)) $l = '/biz/settings.php';

	elseif (preg_match('#/biz/voucherserial#',$r)) $l = '/biz/voucherserial.php';

	else $l = '/biz/index.php';

	return current_link($l, $a);

}



function current_forum($selector='index') {

	global $city;

	$a = array(

			'/forum/tat-ca.html' => 'Tất cả',

			'/forum/khu-vuc.html' => "Khu vực {$city['name']}",

			'/forum/thao-luan-chung.html' => 'Thảo luận chung',

			);

	if (!$city) unset($a['/forum/city.php']);

	$r = $_SERVER['REQUEST_URI'];

	if (preg_match('#/forum/khu-vuc#',$r)) $l = '/forum/khu-vuc.html';

	elseif (preg_match('#/forum/thao-luan-chung#',$r)) $l = '/forum/thao-luan-chung.html';

	elseif (preg_match('#/forum/tat-ca#',$r)) $l = '/forum/tat-ca.html';

	elseif (preg_match('#/forum/binh-luan#',$r)) $l = '/forum/tat-ca.html';

	else $l = "/forum/index.php";

	return current_link($l, $a, true);

}

function current_seller($selector){

	$a	=	array(

		'/hop-tac-kinh-doanh.html'=>'Hợp tác kinh doanh',

		'/thong-tin-doanh-nghiep.html'=>'Liên hệ hợp tác',

	);

	$l = "/{$selector}.html";

	return current_link($l, $a, true);

}

function current_invite($selector='refer') {

	$a = array(

			'/account/refer.php' => 'Tất cả',

			'/account/referpending.php' => "Chưa thanh toán",

			'/account/referdone.php' => 'Đã thanh toán',

			);

	$l = "/account/{$selector}.php";

	return current_link($l, $a, true);

}



function current_partner($gid='0') {

	$a = array(

			'/partner/index.php' => 'All',

			);

	foreach(option_category('partner') AS $id=>$name) {

		$a["/partner/index.php?gid={$id}"] = $name;

	}

	$l = "/partner/index.php?gid={$gid}";

	if (!$gid) $l = "/partner/index.php";

	return current_link($l, $a, true);

}



function current_city($cename, $citys) {

	$link = "/city.php?ename={$cename}";

	$links = array();

	foreach($citys AS $city) {

		$links["/city.php?ename={$city['ename']}"] = $city['name'];

	}

	return current_link($link, $links);

}



function current_coupon_sub($selector='index') {

	$selector = $selector ? $selector : 'index';

	$a = array(

		'/coupon/index.php' => 'Không sử dụng',

		'/coupon/consume.php' => 'Được sử dụng',

		'/coupon/expire.php' => 'Hết hạn',

	);

	$l = "/coupon/{$selector}.php";

	return current_link($l, $a);

}

/**

 * /coupon/index.php	-	tien-ich.html

 * /order/index.php	-	gio-hang.html

 * /credit/index.php	-	so-du-tai-khoan.html

 * /account/settings.php	-	cai-dat-tai-khoan.html

 * /account/myask.php	-	cau-hoi.html

 * Enter description here ...

 * @param unknown_type $selector

 */

function current_account($selector) {

	global $INI;

	$a = array(

		'/khach-hang/don-hang.html' => 'Đơn hàng',

		'/khach-hang/cai-dat-tai-khoan.html' => 'Cài đặt tài khoản',

		'/user/so-du-tai-khoan.html' => 'Số dư tài khoản',

		'/user/tien-ich.html' => 'Tiện ích ' . $INI['system']['couponname'],

		'/account/refer.php' => 'Mời bạn bè',

		'/khach-hang/cau-hoi.html' => 'Câu hỏi đã gửi',

	);

	$r = $_SERVER['REQUEST_URI'];

	if (preg_match('#/khach-hang/don-hang#',$r)) $l = '/khach-hang/don-hang.html';

	elseif (preg_match('#/khach-hang/cai-dat-tai-khoan#',$r)) $l = '/khach-hang/cai-dat-tai-khoan.html';

	elseif (preg_match('#/khach-hang/cau-hoi#',$r)) $l = '/khach-hang/cau-hoi.html';

	elseif (preg_match('#/account/refer#',$r)) $l = '/account/refer.php';

	elseif (preg_match('#/user/tien-ich#',$r)) $l = '/user/tien-ich.html';

	elseif (preg_match('#/user/so-du-tai-khoan#',$r)) $l = '/user/so-du-tai-khoan.html';

	else $l = '/account/index.php';

	return current_link($l, $a, true);

}



function current_account2($selector) {

	global $INI;

	$a = array(

		'/trang-ca-nhan/thong-tin-cua-toi.html' => 'Thông tin cá nhân',

		'/trang-ca-nhan/don-hang-cua-toi.html' => 'Đơn hàng của tôi',

		//'/trang-ca-nhan/tai-san' => 'Tài sản của tôi',

		//'/trang-ca-nhan/deal-yeu-thich' => 'Deal yêu thích',

		//'/trang-ca-nhan/hop-thu' => 'Tin nhắn',

	);

	$r = $_SERVER['REQUEST_URI'];

	if (preg_match('#/trang-ca-nhan/don-hang-cua-toi.html#',$r)) $l = '/trang-ca-nhan/don-hang-cua-toi.html';

	elseif (preg_match('#/trang-ca-nhan/tai-san#',$r)) $l = '/trang-ca-nhan/tai-san';

	elseif (preg_match('#/trang-ca-nhan/deal-yeu-thich#',$r)) $l = '/trang-ca-nhan/deal-yeu-thich';

	elseif (preg_match('#/trang-ca-nhan/hop-thu#',$r)) $l = '/trang-ca-nhan/hop-thu';

	else $l = '/trang-ca-nhan/thong-tin-cua-toi.html';

	return current_link_account($l, $a, true);

}



function current_link_account($link, $links, $span=false) {

	$html = '';

	$span = $span ? '<span></span>' : '';

	foreach($links AS $l=>$n) {

		if (trim($l,'/')==trim($link,'/')) {

			if($l=='/trang-ca-nhan')

				$html .= "<li class=\"selected\"><a  class=\"first\" href=\"{$l}\">{$n}</a>{$span}<span class='separate'></span></li>";

			else

				$html .= "<li class=\"selected\"><a href=\"{$l}\">{$n}</a>{$span}<span class='separate'></span></li>";

		} else {

			if($l=='/') 

				$html .= "<li><a class=\"first\" href=\"{$l}\">{$n}</a>{$span}<span class='separate'></span></li>";

			else 

				$html .= "<li><a href=\"{$l}\">{$n}</a>{$span}<span class='separate'></span></li>";

		}

	}

	return $html;

}

function current_register($selector='index'){

	global $INI;

	$a = array(

		'/user/dang-ky.html'=>'Tài khoản ' . $INI['system']['abbreviation'],

		/*'/forward.php?openID=google'=>'Google ID',

		'/forward.php?openID=yahoo'=>'Yahoo ID',

		'/tw_connect/redirect.php'=>'Twitter ID',

		'/facebook-client'=>'Facebook ID',

		'/forward.php?openID=aol'=>'AOL ID',

		'/forward.php?openID=myspace'=>'Myspace ID',

		'/forward.php?openID=openid'=>'OpenID',

		'/forward.php?openID=wordpress'=>'Wordpress ID',*/

	);

	return current_link($l, $a, true);

}

function current_bank($selector='index'){

	$a = array(

	'/manage/bank/index.php'=>'Tất cả',

	'/manage/bank/process.php'=>'Đang xử lý',

	'/manage/bank/unprocess.php'=>'Đã xử lý',

	);

	$l = "/manage/bank/{$selector}.php";

	return current_link($l, $a, true);

}

function current_adsense($selector='index'){

	$a = array(

	//'/manage/adsense/index.php'=>'Tin ảnh',

	'/manage/adsense/position.php'=>'Các vị trí',

	);

	$l = "/manage/adsense/{$selector}.php";

	return current_link($l, $a, true);

}

function current_about($selector) {

	global $INI;

	$a = array(

		'/us/ve-chung-toi.html' => 'Về ' . $INI['system']['abbreviation'],

		'/us/lien-he.html' => 'Liên hệ',

		'/us/co-hoi-nghe-nghiep.html' => 'Cơ hội nghề nghiệp',

		'/us/dieu-khoan-su-dung.html' => 'Điều khoản sử dụng',

		'/us/chinh-sach-rieng-tu.html' => 'Chính sách riêng tư',

	);

	$l = "/us/{$selector}.html";

	return current_link($l, $a, true);

}



function current_help($selector='faqs') {

	global $INI;

	$a = array(

		'/help/huong-dan-mua-hang.html' => 'Hướng dẫn mua hàng',

		'/help/huong-dan-thanh-toan.html'=>'Hướng dẫn thanh toán',

		'/help/hoi-dap.html' => 'Hỏi/đáp',

		//'/help/api/api.html'=>'API'

		//'/help/wroupon.php' => $INI['system']['abbreviation'] . ' là gì?',

	);

	$l = "/help/{$selector}.html";

	return current_link($l, $a, true);

}



function current_order_index($selector='index') {

	$selector = $selector ? $selector : 'index';

	$a = array(

		'/khach-hang/don-hang-tat-ca.html' => 'Tất cả',

		'/khach-hang/don-hang-chua-thanh-toan.html' => 'Chưa thanh toán',

		'/khach-hang/don-hang-da-thanh-toan.html' => 'Đã thanh toán',

	);

	$r = $_SERVER['REQUEST_URI'];

	if (preg_match('#/khach-hang/don-hang-tat-ca#',$r)) $l = '/khach-hang/don-hang-tat-ca.html';

	elseif (preg_match('#/khach-hang/don-hang-chua-thanh-toan#',$r)) $l = '/khach-hang/don-hang-chua-thanh-toan.html';

	elseif (preg_match('#/khach-hang/don-hang-da-thanh-toan#',$r)) $l = '/khach-hang/don-hang-da-thanh-toan.html';

	else $l = "/order/index.php?s={$selector}";

	return current_link($l, $a);

}



function current_credit_index($selector='index') {

	$selector = $selector ? $selector : 'index';

	$a = array(

		'/credit/score.php' => 'Điểm mua hàng',

		'/credit/goods.php' => 'Chuyển đổi tín dụng',

	);

	$l = "/credit/{$selector}.php";

	return current_link($l, $a);

}



function current_link($link, $links, $span=false) {

	$html = '';

	$span = $span ? '<span></span>' : '';

	foreach($links AS $l=>$n) {

		if (trim($l,'/')==trim($link,'/')) {

			$html .= "<li class=\"current\"><a href=\"{$l}\">{$n}</a>{$span}</li>";

		}

		else $html .= "<li><a href=\"{$l}\">{$n}</a>{$span}</li>";

	}

	return $html;

}



/* manage current */

function mcurrent_misc($selector=null) {

	$a = array(

		'/manage/misc/index.php' => 'Thống kê',

		'/manage/misc/ask.php' => 'Bình luận',

		'/manage/misc/feedback.php' => 'Liên hệ',

		'/manage/misc/subscribe.php' => 'Khách hàng',

	//	'/manage/misc/vmarket.php' => 'Chợ Voucher',

	//	'/manage/misc/smssubscribe.php' => 'SMS',

	//	'/manage/misc/invite.php' => 'Lời mời',

	//	'/manage/misc/money.php' => 'Tài chính',

	//	'/manage/misc/link.php' => 'Liên kết bạn bè',

		'/manage/misc/backup.php' => 'Sao lưu',

	);

	$l = "/manage/misc/{$selector}.php";

	return current_link($l,$a,true);

}



function mcurrent_misc_money($selector=null){

	$selector = $selector ? $selector : 'store';

	$a = array(

		'/manage/misc/money.php?s=store' => 'Nạp tiền offline',

		'/manage/misc/money.php?s=charge' => 'Nạp tiền online',

		'/manage/misc/money.php?s=withdraw' => 'Trả tiền',

		'/manage/misc/money.php?s=cash' => 'Tiền mặt',

		'/manage/misc/money.php?s=refund' => 'Hoàn tiền',

	);

	$l = "/manage/misc/money.php?s={$selector}";

	return current_link($l, $a);

}



function mcurrent_misc_backup($selector=null){

	$selector = $selector ? $selector : 'backup';

	$a = array(

		'/manage/misc/backup.php' => 'Sao lưu dữ liệu',

		'/manage/misc/restore.php' => 'Phục hồi dữ liệu',

	);

	$l = "/manage/misc/{$selector}.php";

	return current_link($l, $a);

}



function mcurrent_misc_invite($selector=null){

	$selector = $selector ? $selector : 'index';

	$a = array(

		'/manage/misc/invite.php?s=index' => 'Chưa xử lý',

		'/manage/misc/invite.php?s=record' => 'Đã xử lý',

		'/manage/misc/invite.php?s=cancel' => 'Lỗi',

	);

	$l = "/manage/misc/invite.php?s={$selector}";

	return current_link($l, $a);

}

function mcurrent_order($selector=null) {

	$a = array(

		'/manage/order/index.php' => 'Hiện tại',
		'/manage/order/hold.php' => 'Mới đặt',
		'/manage/order/confirmed.php' => 'Đã xác nhận',
		'/manage/order/ship.php' => 'Đang giao',
		'/manage/order/success.php' => 'Thành công',
		'/manage/order/waiting.php' => 'Chờ thanh toán',
		'/manage/order/cancel.php' => 'Đã hủy',
	//	'/manage/order/redeal.php' => 'Đặt mua lại',
		
		
	//	'/manage/order/payed.php' => 'Đã thanh toán',

	//	'/manage/order/detail.php' => 'Chi tiết',
		
	//	'/manage/order/ref.php' => 'Nguồn giới thiệu',

		//'/manage/order/pay.php' => 'Đã thanh toán',

		//'/manage/order/credit.php' => 'Thanh toán trực tuyến',

		//'/manage/order/unpay.php' => 'Chưa thanh toán',

		//'/manage/voucher/index.php' => 'Voucher Serial',

		'/manage/order/down.php' => 'Tải về',

	);

	if($selector=='voucher')

		$l = "/manage/voucher/index.php";

	else { $l = "/manage/order/{$selector}.php"; } 

	return current_link($l,$a,true);

}



function mcurrent_user($selector=null) {

	$a = array(

		'/manage/user/index.php' => 'Khách hàng',

		'/manage/user/manager.php' => 'Quản trị',

		'/manage/partner/index.php' => 'Đối tác',

		'/manage/partner/create.php' => 'Thêm đối tác',

	);

	$l = "/manage/user/{$selector}.php";

	return current_link($l,$a,true);

}

function mcurrent_team($selector=null) {

	$a = array(

		'/manage/team/index.php' => 'Danh sách',
		'/manage/team/edit.php' => 'Thêm mới',

	);

	$l = "/manage/team/{$selector}.php";

	return current_link($l,$a,true);

}



function current_manageteam($selector='edit', $id=0) {

	$selector = $selector ? $selector : 'edit';

	$a = array(

		"/manage/team/edit.php?id={$id}" => 'Thông tin cơ bản',

		"/manage/team/editzz.php?id={$id}" => 'Thông tin hiển thị',

		"/manage/team/editseo.php?id={$id}" => 'Thông tin SEO',

	);

	$l = "/manage/team/{$selector}.php?id={$id}";

	return current_link($l, $a);

}





function mcurrent_feedback($selector=null) {

	$a = array(

		'/manage/feedback/index.php' => 'Xem tất cả',

	);

	$l = "/manage/feedback/{$selector}.php";

	return current_link($l,$a,true);

}

function mcurrent_coupon($selector=null) {

	$a = array(

		'/manage/coupon/index.php' => 'Chưa dùng',

		'/manage/coupon/consume.php' => 'Đã dùng',

		'/manage/coupon/expire.php' => 'Hết hạn',

		'/manage/coupon/card.php' => 'Coupon',

		'/manage/coupon/cardcreate.php' => 'Phiếu novos',

	);

	$l = "/manage/coupon/{$selector}.php";

	return current_link($l,$a,true);

}

function mcurrent_category($selector=null) {

	$zones = get_zones();

	$a = array();

	foreach( $zones AS $z=>$o ) {

		$a['/manage/category/index.php?zone='.$z] = $o;

	}

	$l = "/manage/category/index.php?zone={$selector}";

	return current_link($l,$a,true);

}



function mcurrent_location($selector=null) {

	$locals = get_locals();

	$a = array();

	foreach( $locals AS $z=>$o ) {

		$a['/manage/location/index.php?local='.$z] = $o;

	}

	$l = "/manage/location/index.php?local={$selector}";

	return current_link($l,$a,true);

}



function mcurrent_cate($selector=null) {

	$types = get_types();

	$a = array();

	foreach( $types AS $z=>$o ) {

		$a['/manage/cate/index.php?type='.$z] = $o;

	}

	$l = "/manage/cate/index.php?type={$selector}";

	return current_link($l,$a,true);

}



function mcurrent_partner($selector=null) {

	$a = array(

		'/manage/user/index.php' => 'Khách hàng',

		'/manage/user/manager.php' => 'Quản trị',

		'/manage/partner/index.php' => 'Đối tác',

		'/manage/partner/create.php' => 'Thêm đối tác',

	);

	$l = "/manage/partner/{$selector}.php";

	return current_link($l,$a,true);

}

function mcurrent_market($selector=null) {

	$a = array(

		'/manage/market/index.php' => 'Email marketing',

		'/manage/market/sms.php' => 'Nhóm SMS',

		'/manage/market/down.php' => 'Tải về',

	);

	$l = "/manage/market/{$selector}.php";

	return current_link($l,$a,true);

}

function mcurrent_market_down($selector=null) {

	$a = array(

		'/manage/market/down.php' => 'Di động',

		'/manage/market/downemail.php' => 'Email',

		'/manage/market/downorder.php' => 'Deal',

		'/manage/market/downcoupon.php' => 'Coupon',

		'/manage/market/downuser.php' => 'Thông tin khách hàng',

	);

	$l = "/manage/market/{$selector}.php";

	return current_link($l,$a,true);

}



function mcurrent_system($selector=null) {

	$a = array(

		'/manage/system/index.php' => 'Cơ bản',

		'/manage/system/option.php' => 'Tuỳ chọn',

		'/manage/system/bulletin.php' => 'Thông báo',

	//	'/manage/system/pay.php' => 'Thanh toán',

		'/manage/system/email.php' => 'Email',

		//'/manage/system/sms.php' => 'SMS',

	//	'/manage/system/bank.php'=>'Ngân hàng',

		//'/manage/system/slider.php'=>'Slider',

		'/manage/system/shippingmethod.php' => 'Phương thức',

	//	'/manage/system/shipping_cost.php' => 'Phí',

		'/manage/system/page.php' => 'Sửa trang tĩnh',
		
	//	'/manage/system/referral.php' => 'Nguồn giới thiệu',
		//'/manage/system/cache.php' => 'Cache',

		//'/manage/system/skin.php' => 'Skin',

		//'/manage/system/template.php' => 'Sửa giao diện',

		//'/manage/system/upgrade.php' => 'Cập nhật',

	);

	$l = "/manage/system/{$selector}.php";

	return current_link($l,$a,true);

}



function mcurrent_credit($selector=null) {

	$a = array(

		'/manage/credit/index.php' => 'Danh sách',

		'/manage/credit/settings.php' => 'Cài đặt',

		'/manage/credit/goods.php' => 'Chuyển đổi',

	);

	$l = "/manage/credit/{$selector}.php";

	return current_link($l,$a,true);

}

