<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('market');

if (is_post()){
	$card = $_POST;

	$card['quantity'] = abs(intval($card['quantity']));
	$card['money'] = abs(intval($card['money']));
	$card['partner_id'] = abs(intval($card['partner_id']));
	$card['begin_time'] = strtotime($card['begin_time']);
	$card['end_time'] = strtotime($card['end_time']);

	$error = array();
	if ( $card['money'] < 1 ) {
		$error[] = "o valor do cupom não pode ser inferior a 1";
	}
	if ( $card['quantity'] < 1 || $card['quantity'] > 1000 ) {
		$error[] = "the quantity of coupon produced once should be between 1-1000 piece";
	}
	$today = strtotime(date('Y-m-d'));
	if ( $card['begin_time'] < $today ) {
		$error[] = "O tempo não pode ser menor do que hoje";
	}
	elseif ( $card['end_time'] < $card['begin_time'] ) {
		$error[] = "o final não pode ser menor do que o começo do tempo";
	}
	if ( !$error && ZCard::CardCreate($card) ) {
		Session::Set('notice', "{$card['quantity']} cupons criado com sucesso");
		redirect(WEB_ROOT . '/manage/coupon/cardcreate.php');
	}
	$error = join("<br />", $error);
	Session::Set('error', $error);
}
else {
	$card = array(
		'begin_time' => time(),
		'end_time' => strtotime('+3 months'),
		'quantity' => 10,
		'money' => 10,
		'code' => date('Ymd').'_WR',
	);
}

include template('manage_coupon_cardcreate');
