<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
require_once(dirname(__FILE__) . '/paybank.php');
require_once '../include/classes/ZBaoKimPayment.class.php';

need_login();
$total_money = abs(floatval($_POST['money']));
$action = strval($_POST['action']);
if (!$total_money && $action != 'redirect') {
	Session::Set('error', 'Valor adicionado a ser recarregado deve ser maior que 1');
	redirect( WEB_ROOT . '/credit/charge.php' );
}
//$order_service = pay_getservice($_POST['paytype']);
$order_service = $_POST['paytype'];
$title = "{$login_user['email']}({$INI['system']['sitename']}recharge{$total_money})";
$now = time();
$randno = rand(1000,9999);

/* credit pay */
if ( $_POST['action'] == 'redirect' ) {
	redirect($_POST['reqUrl']);
}
/* paypal support */
else if ( $order_service == 'paypal' ) {
	$cmd = '_xclick';
	$Business = $INI['paypal']['mid'];
	$location = $INI['paypal']['loc'];
	
	$item_number = "charge-{$login_user_id}-{$now}-{$randno}";
	$item_name = $title;
	$amount = $total_money;
	$quantity = 1;

	$post_url = "https://www.paypal.com/row/cgi-bin/webscr";

	$image_url = "";
	$return_url = $INI['system']['wwwprefix'] . "/credit/index.php";
	$notify_url = $INI['system']['wwwprefix'] . '/order/paypal/ipn.php';
	$cancel_url =   $INI['system']['wwwprefix'] . "/credit/index.php";

	include template('order_charge');
}
else if ($order_service=='baokim'){
	$bk_payment = new BaoKimPayment();
	/*
	 * @param
	 */
	
	$order_id="DH002";
	$tranferMail = $INI['paypal']['baokim_email'];
	$product_name	=	"Nạp tiền vào tài khoản " . $INI['system']['sitename'];
	$product_price = $total_money;
	$product_quantity = 1;
	$total_amount = $product_quantity*$product_price;
	$shipping_fee = NULL;
	$tax_fee = NULL;
	$order_description = "Nạp tiền vào tài khoản " . $INI['system']['sitename'];
	$url_success = "http://nttoan.com/pay_success";
	$url_cancel = "http://nttoan.com/pay_canced";
	$url_detail ="#";
	$reqUrl = $bk_payment->createRequestUrl(
						$order_id, 
						$tranferMail, 
						$total_amount, 
						$shipping_fee, 
						$tax_fee, 
						$order_description, 
						$url_success, 
						$url_cancel, 
						$url_detail
					);
	if($bk_payment->verifyResponseUrl)
		echo "okkkkkkkkkkkkkkkk";
	/**
	$tranferMail = $INI['paypal']['baokim_email'];
	$product_name	=	"Nạp tiền vào tài khoản " . $INI['system']['sitename'];
	$product_price = $total_money;
	$product_quantity = 1;
	$total_amount = $product_quantity*$product_price;
	$reqUrl	=	"https://www.baokim.vn/payment/customize_payment/product?".
				"business=$tranferMail" .	
				"&product_name=$product_name" .
				"&product_price=$product_price" .
				"&product_quantity=$product_quantity" . 
				"&total_amount=$total_amount";
	**/
	//-------------------------------------------------------------------
	include template('order_charge');
	//-------------------------------------------------------------------
}
else if ($order_service=='nganluong'){
	echo "demo";
}
/**
elseif ( $order_service == 'chinabank' ) {

	$v_mid = $INI['chinabank']['mid'];
	$v_url = $INI['system']['wwwprefix']. '/order/chinabank/return.php';
	$key   = $INI['chinabank']['sec'];
	$v_oid = "charge-{$login_user_id}-{$now}-{$randno}";
	$v_amount = $total_money;
	$v_moneytype = $INI['system']['currencyname'];
	$text = $v_amount.$v_moneytype.$v_oid.$v_mid.$v_url.$key;
	$v_md5info = strtoupper(md5($text));

	include template('order_charge');
}
elseif ( $order_service == 'tenpay' ) {

	$v_mid = $INI['tenpay']['mid'];
	$v_url = $INI['system']['wwwprefix']. '/order/tenpay/return.php';
	$key   = $INI['tenpay']['sec'];
	$v_oid = "charge-{$login_user_id}-{$now}-{$randno}";
	$v_amount = intval($total_money * 100);
	$v_moneytype = $INI['system']['currencyname'];

	/* must 
	$sp_billno = $v_oid;
	$transaction_id = $v_mid. date('Ymd'). date('His') .rand(1000,9999);
	$desc = $title;
	/* end */
/**
	$reqHandler = new PayRequestHandler();
	$reqHandler->init();
	$reqHandler->setKey($key);
	$reqHandler->setParameter("bargainor_id", $v_mid);
	$reqHandler->setParameter("cs", "UTF-8");
	$reqHandler->setParameter("sp_billno", $sp_billno);
	$reqHandler->setParameter("transaction_id", $transaction_id);
	$reqHandler->setParameter("total_fee", $v_amount);
	$reqHandler->setParameter("return_url", $v_url);
	$reqHandler->setParameter("desc", $desc);
	$reqHandler->setParameter("spbill_create_ip", Utility::GetRemoteIp());
	$reqUrl = $reqHandler->getRequestURL();

	if($_POST['paytype']!='tenpay') {
		$reqHandler->setParameter('bank_type', pay_getqqbank($_POST['paytype']));
		$reqUrl = $reqHandler->getRequestURL();
		redirect( $reqUrl );
	}

	include template('order_charge');
}
elseif ( $order_service == 'bill' ) {		



	$pname = urlencode($login_user['username']);	
	$commodity_info =urlencode($title);		
	$merchant_param = "";		

	$pemail=$login_user['email'];		
	$pid="";		

	$merchantAcctId= $INI['bill']['mid'];	

	$key=$INI['bill']['sec']; 

	$inputCharset="1";

	$pageUrl=$INI['system']['wwwprefix'] . '/order/bill/return.php';

	$bgUrl=$INI['system']['wwwprefix'] . '/order/bill/return.php';

	$version="v2.0";

	$language="1";

	$signType="1";	

	$payerName=$login_user['username'];

	$payerContactType="1";	

	$payerContact=$login_user['email'];	

	$orderId= "charge-{$login_user_id}-{$now}-{$randno}";		

	$orderAmount=  intval($total_money * 100);

	$orderTime=date('YmdHis');

	$productName= preg_replace('/[\r\n\s]+/','',strip_tags($title));

	$productNum="1";

	$productId="";

	$productDesc="";

	$ext1="";

	$ext2="";

	$payType="00";

	$bankId="";

	$redoFlag="0";

	$pid=""; 

	$signMsgVal=appendParam($signMsgVal,"inputCharset",$inputCharset);
	$signMsgVal=appendParam($signMsgVal,"pageUrl",$pageUrl);
	$signMsgVal=appendParam($signMsgVal,"bgUrl",$bgUrl);
	$signMsgVal=appendParam($signMsgVal,"version",$version);
	$signMsgVal=appendParam($signMsgVal,"language",$language);
	$signMsgVal=appendParam($signMsgVal,"signType",$signType);
	$signMsgVal=appendParam($signMsgVal,"merchantAcctId",$merchantAcctId);
	$signMsgVal=appendParam($signMsgVal,"payerName",$payerName);
	$signMsgVal=appendParam($signMsgVal,"payerContactType",$payerContactType);
	$signMsgVal=appendParam($signMsgVal,"payerContact",$payerContact);
	$signMsgVal=appendParam($signMsgVal,"orderId",$orderId);
	$signMsgVal=appendParam($signMsgVal,"orderAmount",$orderAmount);
	$signMsgVal=appendParam($signMsgVal,"orderTime",$orderTime);
	$signMsgVal=appendParam($signMsgVal,"productName",$productName);
	$signMsgVal=appendParam($signMsgVal,"productNum",$productNum);
	$signMsgVal=appendParam($signMsgVal,"productId",$productId);
	$signMsgVal=appendParam($signMsgVal,"productDesc",$productDesc);
	$signMsgVal=appendParam($signMsgVal,"ext1",$ext1);
	$signMsgVal=appendParam($signMsgVal,"ext2",$ext2);
	$signMsgVal=appendParam($signMsgVal,"payType",$payType);	
	$signMsgVal=appendParam($signMsgVal,"bankId",$bankId);
	$signMsgVal=appendParam($signMsgVal,"redoFlag",$redoFlag);
	$signMsgVal=appendParam($signMsgVal,"pid",$pid);
	$signMsgVal=appendParam($signMsgVal,"key",$key);
	$signMsg= strtoupper(md5($signMsgVal)); 

	include template('order_charge');
}
else if ( $order_service == 'alipay' ) {

	$_input_charset = 'utf-8';
	$service = 'create_direct_pay_by_user';
	$partner = $INI['alipay']['mid'];
	$security_code = $INI['alipay']['sec'];
	$seller_email = $INI['alipay']['acc'];

	$sign_type = 'MD5';
	$out_trade_no = "charge-{$login_user_id}-{$now}-{$randno}";

	$return_url = $INI['system']['wwwprefix'] . '/order/alipay/return.php';
	$notify_url = $INI['system']['wwwprefix'] . '/order/alipay/notify.php';
	$show_url =   $INI['system']['wwwprefix'] . "/credit/index.php";

	$subject = $title;
	$body = $show_url;
	$quantity = 1;

	$parameter = array(
			"service"         => $service,
			"partner"         => $partner,      
			"return_url"      => $return_url,  
			"notify_url"      => $notify_url, 
			"_input_charset"  => $_input_charset, 
			"subject"         => $subject,  	 
			"body"            => $body,     	
			"out_trade_no"    => $out_trade_no,
			"total_fee"       => $total_money,  
			"payment_type"    => "1",
			"show_url"        => $show_url,
			"seller_email"    => $seller_email,  
			);
	$alipay = new AlipayService($parameter, $security_code, $sign_type);
	$sign = $alipay->Get_Sign();
	include template('order_charge');
}
**/
else {
	redirect( WEB_ROOT. "/credit/index.php");
}

Function appendParam($returnStr,$paramId,$paramValue){
	if($returnStr!=""){			
		if($paramValue!=""){					
			$returnStr.="&".$paramId."=".$paramValue;
		}			
	}else{		
		If($paramValue!=""){
			$returnStr=$paramId."=".$paramValue;
		}
	}		
	return $returnStr;
}