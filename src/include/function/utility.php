<?php
//* code by mrnhan108@gmail.com
function get_city($ip=null) {
	$cities = option_category('city', false, true);
	$ip = ($ip) ? $ip : Utility::GetRemoteIP();
	$url = "http://open.baidu.com/ipsearch/s?wd={$ip}&tn=baiduip";
	$res = mb_convert_encoding(Utility::HttpRequest($url), 'UTF-8', 'GBK');
	if ( preg_match('#From<b>(.+)</b>#Ui', $res, $m) ) {
		foreach( $cities AS $one) {
			if ( FALSE !== strpos($m[1], $one['name']) ) {
				return $one;
			}
		}
	}
	return array();
}

function mail_zd($email) {
	global $option_mail;
	if ( ! Utility::ValidEmail($email) ) return false;
	preg_match('#@(.+)$#', $email, $m);
	$suffix = strtolower($m[1]);
	return $option_mail[$suffix];
}

function nanooption($string) {
	if ( preg_match_all('#{(.+)}#U', $string, $m) ){
		return $m[1];
	}
	return array();
}

global $striped_field;
$striped_field = array(
	'username',
	'realname',
	'name',
	'tilte',
	'email',
	'address',
	'mobile',
	'url',
	'logo',
	'contact',
);

global $option_gender;
$option_gender = array(
		'M' => 'Nam',
		'F' => 'Nữ',
		'TE' => 'Trẻ em',
		'N' => 'Không xác định',
		);
global $option_pay;
$option_pay = array(
		'pay' => 'Đã thanh toán',
		'unpay' => 'Chưa thanh toán',
		);
global $option_ships;
$option_ships = array(
		'Y' => 'Đã giao hàng',
		'N' => 'Chờ giao hàng',
		);
global $option_order_state;
$option_order_state = array(
	'cancel' => 'Đã hủy',
	'pending' => 'Chờ xử lý',
	'confirmed' => 'Đã xử lý',
	'success' => 'Thành công',
);
global $option_service;
$option_service = array(
		'alipay' => 'alipay',
		'tenpay' => 'tenpay',
		'chinabank' => 'ChinaBank',
		'cash' => 'pay in cach',
		'credit' => 'pay with balance',
		'other' => 'other',
		);
global $option_delivery;
$option_delivery = array(
		'express' => 'Giao hàng',
		'coupon' => 'Giao phiếu',
		'pickup' => 'self delivery',
		);
global $option_giaohang;
$option_giaohang = array(
		'product' => 'Giao sản phẩm',
		'voucher' => 'Giao phiếu',
		);
global $option_flow;
$option_flow = array(
		'buy' => 'buy',
		'invite' => 'invite',
		'store' => 'topup',
		'withdraw' => 'withdraw',
		'coupon' => 'rebate',
		'refund' => 'refund',
		'register' => 'register',
		'charge' => 'topup',
		);
global $option_mail;
$option_mail = array(
		'gmail.com' => 'https://mail.google.com/',
		'hotmail.com' => 'http://hotmail.com/',
		'yahoo.com' => 'http://mail.yahoo.com/',
		);
global $option_cond;
$option_cond = array(
		'Y' => ' Deal thành công khi đạt số lượng người mua tối thiểu',
		'N' => ' Deal thành công khi số lượng sản phẩm được mua đạt tối thiểu',
		);
global $option_open;
$option_open = array(
		'Y' => 'Hiển thị',
		'N' => 'Không hiển thị',
		);
global $option_buyonce;
$option_buyonce = array(
		'Y' => 'Mua 1 lần',
		'N' => 'Mua nhiều lần',
		);
global $option_teamtype;
$option_teamtype = array(
	'normal' => 'Deal thường',
	'giamgia' => 'Giảm giá',
	'giasoc' => 'Giá sốc',
	'banchay' => 'Bán chạy',
	'chayhang' => 'Cháy hàng',
	'giare' => 'Giá rẻ',
	'saphethan' => 'Sắp hết hạn',
	'topdeal' => 'Top deal',
	'shopnow' => 'Shop now',
	'ordernow' => 'Order now',
	'cheapest' => 'Cheapest'
);
global $option_yn;
$option_yn = array(
		'Y' => 'Có',
		'N' => 'Không',
		);
global $option_alipayitbpay;
$option_alipayitbpay= array(
		'1h' => '1 hour',
		'2h' => '2 hours',
		'3h' => '3 hours',
		'1d' => '1 day',
		'3d' => '3 days',
		'7d' => '7 days',
		'15d' => '15 days',
		);
		
global $option_days;
$option_days = array();
for($i=1;$i<=31;$i++){$option_days[$i] = $i;}

global $option_months;
$option_months = array();
for($i=1;$i<=12;$i++){$option_months[$i] = $i;}

global $option_years;
$option_years = array();
for($i=1970;$i<=2011;$i++){$option_years[$i] = $i;}

global $option_avatars;
$option_avatars = array();
for($i=1;$i<=8;$i++){$option_avatars[$i] = $i.'.jpg';}

global $ads_position;
$ads_position = array(
	'cate1' => 'Trên chuyên mục 1',
	'cate2' => 'Trên chuyên mục 2',	
	'left' => 'Bên trái',
	'bottom' => 'Phía dưới',
	//'sbottom' => 'Phía dưới cùng',
	'bannertop' => 'Slideshow',
	//'vright' => 'Phía phải chợ Voucher',
	//'bannerl' => 'Banner trái',
	//'bannerr' => 'Banner phải',
//	'imgnews' => 'Tin ảnh',
	//'pop_center' => 'Popup ở giữa',
	//'pay_banner' => 'Trên nút thanh toán',

);

global $vmarket_type;
$vmarket_type = array(
	'sell' => 'Bán',
	'buy' => 'Mua',
);
global $vmarket_state;
$vmarket_state = array(
	'pending' => 'Chờ duyệt',
	'confirmed' => 'Đã duyệt',
	'cancel' => 'Đã hủy',
);

global $option_ads_lr;
$option_ads_lr = array(
	'item' => 'Quảng cáo tin ảnh',
	'img' => 'Banner ảnh',
	'off' => 'Tắt',
);
function srcWeb($str){
	$_key=strtoupper(md5(md5("0dLOQPC9726Amdfsa600IkfdsbntMlaOQwBdsclop8cA9g".$str.rand(1,100))));
	$_key=substr(strtoupper(md5(substr($_key,9))),15);
	$_key=trim(substr($_key,0,3).substr($_key,3,6).strtoupper(substr(md5($_key),8,9)).substr($_key,-3));
	return $_key;
}
function getSession(){
	$client = addslashes($_SERVER['REQUEST_URI']);
	$pos = strpos($client,"affiliate");
    if($pos !== false) {
    $client = explode('&',end(explode('?affiliate=', $client)));
	$client = $client[0];
	if ($client!=''){
	$web = DB::LimitQuery('website', array('condition' => array('srcweb' => $client,),'one' => true,));
	$website = $web['id']?$web['id']:0;
	if($website!=$_SESSION['website'])
	$_SESSION['website'] = $website;
				}
	}
	return $_SESSION['website']?$_SESSION['website']:0;
}


