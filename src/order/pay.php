<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
require_once(dirname(__FILE__) . '/paybank.php');

need_login();
if (is_post()) {
	$order_id = abs(intval($_POST['order_id']));
} else {
	if ( $_GET['id'] == 'charge' ) {
		redirect( WEB_ROOT. '/credit/index.php');
	}
	$order_id = $id = abs(intval($_GET['id']));
}
if(!$order_id || !($order = Table::Fetch('order', $order_id))) {
	redirect( WEB_ROOT. '/index.php');
}

//add state pay for order 
if($order['state']=='unpay'){
	//ZOrder::CashIt($order);
	$user = Table::Fetch('user', $order['user_id']);
	$team = Table::Fetch('team', $order['team_id']);
	//update now number
	//Table::UpdateCache('order', $order_id, array('state' => 'pay'));
	$now_number = $team['now_number'] + 1 + $team['pre_number'];
	Table::UpdateCache('team', $order['team_id'], array('now_number' => $now_number));
	//End update now number
	//create voucher
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
	//end create voucher
	mail_order($order);
}


if ( $order['user_id'] != $login_user['id']) {
	redirect( WEB_ROOT . "/team.php?id={$order['team_id']}");
}

$team = Table::Fetch('team', $order['team_id']);
team_state($team);

if (is_post() && $_POST['paytype'] ) {
	$uarray = array( 'service' => pay_getservice($_POST['paytype']) );
	Table::UpdateCache('order', $order_id, $uarray);
	$order = Table::Fetch('order', $order_id);
	$order['service'] = pay_getservice($_POST['paytype']);
}
if ( $_POST['paytype']!='credit' 
		&& $_POST['service']!='credit' 
		&& $team['team_type']=='seconds' 
		&& ($order['origin']>$login_user['money'])
		&& option_yes('creditseconds')
   ) {
	$need_money = ceil($order['origin'] - $login_user['money']);
	Session::Set('error', "Deal sÃ³ pode usar o saldo do seu crÃ©dito, vocÃª precisa de recarga completa de {$need_money} a ordem ");
	redirect(WEB_ROOT . "/credit/charge.php?money={$need_money}");
}
//peruser buy count
if ($_POST && $team['per_number']>0) {
	$now_count = Table::Count('order', array(
		'user_id' => $login_user_id,
		'team_id' => $team['id'],
		'state' => 'pay',
	), 'quantity');
	$leftnum = ($team['per_number'] - $now_count);
	if ($leftnum <= 0) {
		Session::Set('error', 'Deal passou do seu limite de compra, verifique nossos outros negÃ³cios');
		redirect( WEB_ROOT . "/team.php?id={$id}"); 
	}
}

//payed order
if ( $order['state'] == 'pay' ) {  
	if ( is_get() ) {
		die(include template('order_pay_success'));		
	} else {
		redirect(WEB_ROOT  . "/order/pay.php?id={$order_id}");
	}
}

$total_money = moneyit($order['origin'] - $login_user['money']);
if ($total_money<0) { $total_money = 0; $order['service'] = 'credit'; }

/* generate unique pay_id */
if (!($pay_id = $order['pay_id'])) {
	$randid = rand(1000,9999);
	$pay_id = "go-{$order['id']}-{$order['quantity']}-{$randid}";
	Table::UpdateCache('order', $order['id'], array(
				'pay_id' => $pay_id,
				));
}

/* noneed pay where goods soldout or end */
if ($team['close_time']) {
	Session::Set('notice', 'Thời gian ra khuyến mãi đã hết, Bạn không thanh toán cho đơn hàng này được');
	redirect(WEB_ROOT  . "/team.php?id={$order['team_id']}");
}
/* end */

/* credit pay */
if ( $_POST['action'] == 'redirect' ) {
	redirect($_POST['reqUrl']);
}
elseif ( $_POST['service'] == 'credit' ) {
	if ( $order['origin'] > $login_user['money'] ){
		Table::Delete('order', $order_id);
		redirect( WEB_ROOT . '/order/index.php');
	}
	Table::UpdateCache('order', $order_id, array(
				'service' => 'credit',
				'money' => 0,
				'state' => 'pay',
				'credit' => $order['origin'],
				'pay_time' => time(),
				));
	$order = Table::FetchForce('order', $order_id);
	ZTeam::BuyOne($order);
	redirect( WEB_ROOT . "/order/pay.php?id={$order_id}");
}
elseif ( $order['service'] == 'pagseguro' ) {
	/* credit pay */
	$credit = moneyit($order['origin'] - $total_money);
	if ($order['credit']!=$credit) {
		Table::UpdateCache('order', $order_id, array('credit'=>$credit,));
	}
	/* end */

	$conta 		= $INI['pagseguro']['acc'];
	$retorno 	= $INI['system']['wwwprefix']. '/order/pagseguro/return.php';
	$token   	= $INI['pagseguro']['mid'];
	$idVenda	= $order['id'];

	include template('order_pay');
}
elseif ( $order['service'] == 'chinabank' ) {
	/* credit pay */
	$credit = moneyit($order['origin'] - $total_money);
	if ($order['credit']!=$credit) {
		Table::UpdateCache('order', $order_id, array('credit'=>$credit,));
	}
	/* end */

	$v_mid = $INI['chinabank']['mid'];
	$v_url = $INI['system']['wwwprefix']. '/order/chinabank/return.php';
	$key   = $INI['chinabank']['sec'];
	$v_oid = $pay_id;
	$v_amount = $total_money;
	$v_moneytype = $INI['system']['currencyname'];
	$text = $v_amount.$v_moneytype.$v_oid.$v_mid.$v_url.$key;
	$v_md5info = strtoupper(md5($text));

	include template('order_pay');
}
/**
 * thanh toan thong qua baokim.vn
 */
elseif ( $_POST['paytype']=='bk'){
	Table::UpdateCache('order', $order_id, array('service' => $_POST['paytype']));
	$thanhtien	=	$order['price'] * $order['quantity'];
	header("location: https://www.baokim.vn/payment/customize_payment/product?business={$INI['paypal']['baokim_email']}&product_name=".$team['title']."&product_price=".$order['price']."&product_quantity=".$order['quantity']."&total_amount=".$thanhtien."");
}
/**
 * thanh toán qua nganluong.vn
 */
elseif ($_POST['paytype']=='nl'){
	Table::UpdateCache('order', $order_id, array('service' => $_POST['paytype']));
	echo "thanh toán qua ngan luong";
}
/**
 * thanh toán chuyển khoản - ATM
 */
elseif ($_POST['paytype']=='ck'){
	$bankID = abs(intval($_POST['bank_id_value']));
	if(!empty($bankID) && $bankID!=0){
		Table::UpdateCache('order', $order_id, array('service' => $_POST['paytype']));
		Table::UpdateCache('order', $order_id, array('bankID' => $bankID));
		redirect( WEB_ROOT. "success.php?order_id={$_POST['order_id']}&team_id={$_POST['team_id']}&tt={$_POST['paytype']}&bank={$bankID}");
	}
	else {
		Session::Set('error', "Vui lòng chọn ngân hàng cần thanh toán.<a href='#repay'> [chọn lại]</a>");
		//redirect( WEB_ROOT. "/team.php?id={$order_id}");
		redirect( WEB_ROOT. "check.php?id={$order_id}");
	}
}
/**
 * thanh toán tại công ty
 */
elseif ($_POST['paytype']=='ct'){
	Table::UpdateCache('order', $order_id, array('service' => $_POST['paytype']));
	redirect( WEB_ROOT. "success.php?order_id={$_POST['order_id']}&team_id={$_POST['team_id']}&tt={$_POST['paytype']}");
}
/**
 * thu tiền tại nhà khách hàng
 */
elseif ($_POST['paytype']=='tn'){
	Table::UpdateCache('order', $order_id, array('service' => $_POST['paytype']));
	redirect( WEB_ROOT. "success.php?order_id={$_POST['order_id']}&team_id={$_POST['team_id']}&tt={$_POST['paytype']}");
}
/** bạn chưa chọn thông tin thanh toán :( **/
else {
	Table::UpdateCache('order', $order_id, array('service' => 'NULL'));
	Session::Set('error', "Bạn chưa chọn cách thanh toán cho đơn đặt hàng này.<a href='#repay'> [chọn lại]</a>");
	//redirect( WEB_ROOT. "/team.php?id={$order_id}");
	redirect( WEB_ROOT. "check.php?id={$order_id}");
}
/**
elseif ( $order['service'] == 'tenpay' ) {
	/* credit pay */
/**
	$credit = moneyit($order['origin'] - $total_money);
	if ($order['credit']!=$credit) {
		Table::UpdateCache('order', $order_id, array('credit'=>$credit,));
	}
	/* end */
/**
	$v_mid = $INI['tenpay']['mid'];
	$v_url = $INI['system']['wwwprefix']. '/order/tenpay/return.php';
	$key   = $INI['tenpay']['sec'];
	$v_oid = $pay_id;
	$v_amount = intval($total_money * 100);
	$v_moneytype = $INI['system']['currencyname'];
	$text = $v_amount.$v_moneytype.$v_oid.$v_mid.$v_url.$key;
/**
	/* must *//**
	$sp_billno = $v_oid;
	$transaction_id = $v_mid. date('Ymd'). date('His') .rand(1000,9999);
	$desc = mb_convert_encoding($team['title'], 'GBK', 'UTF-8');
	/* end */
/**
	$reqHandler = new PayRequestHandler();
	$reqHandler->init();
	$reqHandler->setKey($key);
	$reqHandler->setParameter("bargainor_id", $v_mid);
	$reqHandler->setParameter("cs", "GBK");
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

	include template('order_pay');
}
**/
/**
elseif ( $order['service'] == 'bill' ) {
	/* credit pay *//**
	$credit = moneyit($order['origin'] - $total_money);
	if ($order['credit'] != $credit) {
		Table::UpdateCache('order', $order_id, array('credit'=>$credit,));
	}
	/* end */   
/**

	$merchantAcctId = $INI['bill']['mid'];	

	$key = $INI['bill']['sec']; 

	$inputCharset = "1";

	$pageUrl = $INI['system']['wwwprefix'] . '/order/bill/return.php';

	$bgUrl = $INI['system']['wwwprefix'] . '/order/bill/return.php';

	$version = "v2.0";

	$language = "1";

	$signType = "1";	
	
	$payerName = $login_user['username'];

	$payerContactType = "1";	

	$payerContact = $login_user['email'];	

	$orderId = $pay_id;

	$orderAmount = intval($total_money * 100);

	$orderTime = date('YmdHis');

	$productName = preg_replace('/[\r\n\s]+/','',strip_tags($team['title']));

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



	include template('order_pay');
}
/* paypal support *//**
else if ( $order['service'] == 'paypal' ) {
	/* credit pay *//**
	$credit = moneyit($order['origin'] - $total_money);
	if ($order['credit']!=$credit) {
		Table::UpdateCache('order', $order_id, array('credit'=>$credit,));
	}
	/* end */
	/**
	$cmd = '_xclick';
	$Business = $INI['paypal']['mid'];
	$location = $INI['paypal']['loc'];
	$currency_code = $INI['system']['currencyname'];
	
	$item_number = $pay_id;
	$item_name = $team['title'];
	$amount = $total_money;
	$quantity = 1;

	//$post_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
	$post_url = "https://www.paypal.com/row/cgi-bin/webscr";
	$image_url = "";
	$return_url = $INI['system']['wwwprefix'] . '/order/index.php';
	$notify_url = $INI['system']['wwwprefix'] . '/order/paypal/ipn.php';
	$cancel_url = $INI['system']['wwwprefix'] . "/order/index.php";

	include template('order_pay');
}
/* alipay support */
/*else if ( $order['service'] == 'alipay' ) {

	/* credit pay */
/*	$credit = moneyit($order['origin'] - $total_money);
	if ($order['credit']!=$credit) {
		Table::UpdateCache('order', $order_id, array('credit'=>$credit,));
	}
	/* end */
/*
	$_input_charset = 'utf-8';
	$service = 'create_direct_pay_by_user';
	$partner = $INI['alipay']['mid'];
	$security_code = $INI['alipay']['sec'];
	$seller_email = $INI['alipay']['acc'];
	$itbpay = strval($INI['alipay']['itbpay']);

	$sign_type = 'MD5';
	$out_trade_no = $pay_id;

	$return_url = $INI['system']['wwwprefix'] . '/order/alipay/return.php';
	$notify_url = $INI['system']['wwwprefix'] . '/order/alipay/notify.php';
	$show_url = $INI['system']['wwwprefix'] . "/team.php?id={$team['id']}";
	$show_url = obscure_rep($show_url);

	$subject = preg_replace('/[\r\n\s]+/','',strip_tags($team['title']));
	$body = $show_url;
	$quantity = $order['quantity'];

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
	if ($itbpay) $parameter['it_b_pay'] = $itbpay;
	$alipay = new AlipayService($parameter, $security_code, $sign_type);
	$sign = $alipay->Get_Sign();
	$reqUrl = $alipay->create_url();
	include template('order_pay');
}*/
/*else if ( $order['service'] == 'credit' ) {
	$total_money = $order['origin'];
	die(include template('order_pay'));
} */

// Function The value of the variable parameters of the composition is not empty string
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

