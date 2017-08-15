<?php
require_once(dirname(__FILE__) . '/app.php');

$code = strval($_GET['code']);
$subscribe = Table::Fetch('subscribe', $code, 'secret');
if ($subscribe) {
	ZSubscribe::Unsubscribe($subscribe);
	Session::Set('notice', 'Anular bem sucedido, você não receberá informações diariamente comprar');
}
redirect( WEB_ROOT  . '/subscribe.php');
