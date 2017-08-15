<?php
/**
 * send mail class
 * @nttoan
 */
include_once 'ZXtemplate.class.php';
class ZSendmail{
	// gửi mail chi tiết đơn hàng, chưa xác nhận thanh toán
	public static function sendOrder($email, $realname){
		$sTemplatePath= dirname(dirname(__FILE__));
		echo $sTemplatePath;
		$objTemplate=new XTemplate($sTemplatePath ."/". sendOrder.php);
		$objTemplate->parse("main");
		return $objTemplate->text("main");
	}
}
?>