<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
need_manager();

$pages = array(
	'help_tour' => 'Hướng dẫn mua hàng',
	'help_payment' => 'Hình thức thanh toán',
	'help_faqs' => 'Hỏi đáp',
	'feedback_sellerfaq' => 'Hợp tác kinh doanh',
	//'help_api' => 'API',
	'about_contact' => 'Liên hệ',
	'about_us' => 'Về chúng tôi',
	'about_job' => 'Tuyển dụng',
	'about_terms' => 'Điều khoản sử dụng',
	'about_privacy' => 'Chính sách bảo mật',
	'khieunai' => 'Chính sách giải quyết khiếu nại',
	//'about_credit' => 'Tiền tích lũy là gì?',
	//'reg_shop' => 'Đăng ký mở shop',
	'quychesangiaodich' => 'Quy chế sàn giao dịch',
	'delivery_item' => 'Giao nhận hàng',
	'money' => 'Trả hàng và hoàn tiền',
	'bonus' => 'Cách nhận tiền thưởng',
	'account' => 'Tài khoản và đơn hàng',
	'voucher' => 'Sử dụng phiếu',
	'camket' => 'Cam kết bán hàng',
	'giaonhan' => 'Quy trình giao nhận',
	'doitra' => 'Quy định bảo hàng đổi trả',
	'muahang' => 'Quy định mua hàng',
	'banhang' => 'Quy định bán hàng',
	'thongbao' => 'Thông báo',
);

$id = strval($_GET['id']);
if ( $id && !in_array($id, array_keys($pages))) { 
	redirect( WEB_ROOT . "/manage/system/page.php");
}
$n = Table::Fetch('page', $id);
// show text editor
$CKEditor = new CKEditor();
$CKEditor->returnOutput = true;
$width	=	"105"."%";
$CKEditor->config['width'] = $width;
// Change default textarea attributes.
//$CKEditor->textareaAttributes = array("cols" => 80, "rows" => 10);
// The initial value to be displayed in the editor.
CKFinder::SetupCKEditor( $CKEditor,'../../include/plugin/ckfinder/' ) ;
$value_content = $n['value'];
$value_textArea = $CKEditor->editor("value", $value_content);
/**---------------end--------------------**/
if ( $_POST ) {
	$table = new Table('page', $_POST);
	$table->SetStrip('value');
	if ( $n ) {
		$table->SetPk('id', $id);
		$table->update( array('id', 'value') );
	} else {
		$table->insert( array('id', 'value') );
	}
	Session::Set('notice', "Page {$pages[$id]} Edited Successfully");
	redirect( WEB_ROOT . "/manage/system/page.php?id={$id}");
}
$value = $n['value'];
include template('manage_system_page');