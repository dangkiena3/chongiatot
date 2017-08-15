<?php

//code by mrnhan108@gmail.com

require_once(dirname(__FILE__). '/app.php');

$p = strval($_GET['p']);

if(empty($p)) redirect( WEB_ROOT . '/index.php');

$option_page = array(
	'help_faqs' => 'Hỏi đáp',
	'help_tour' => 'Hướng dẫn mua hàng',
	'help_payment' => 'Hình thức thanh toán',
	'delivery_item' => 'Giao nhận hàng',
	'money' => 'Trả hàng và hoàn tiền',
	'bonus' => 'Cách nhận tiền thưởng',
	'account' => 'Tài khoản và đơn hàng',
	'feedback_sellerfaq' => 'Hợp tác kinh doanh',
	'voucher' => 'Sử dụng phiếu '.$tenngan,
	'about_us' => 'Về chúng tôi',
	'about_job' => 'Tuyển dụng',
	'about_terms' => 'Điều khoản sử dụng',
	'about_privacy' => 'Chính sách bảo mật',
	'quychesangiaodich' => 'Quy chế sàn giao dịch',
	'about_contact' => 'Liên hệ',
	'camket' => 'Cam kết bán hàng',
	'giaonhan' => 'Quy trình giao nhận',
	'doitra' => 'Quy trình bảo hành đổi trả',
	'muahang' => 'Quy trình mua hàng',
	'banhang' => 'Quy trình bán hàng',
	'thongbao' => 'Thông báo',
	'khieunai' => 'Chính sách giải quyết khiếu nại',
);

$page = Table::Fetch('page', $p);
function activeMenu($str){
	$p = strval($_GET['p']);
	if($str==$p) $str="active active";
	else $str = "";
	return $str;
}
$pagetitle = $option_page[$p];

$page_type = 'article';

include template('static_page');