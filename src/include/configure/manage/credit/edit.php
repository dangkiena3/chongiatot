<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('market');

$id = abs(intval($_REQUEST['id']));
$goods = Table::Fetch('goods', $id);

$table = new Table('goods', $_POST);
$table->letter = strtoupper($table->letter);
$uarray = array('title','number','image','score','display','sort_order','time'); 
$table->display = strtoupper($table->display)=='Y' ? 'Y' : 'N';
$table->image = upload_image('upload_image', $goods['image'], 'team');
$table->time = time();

if (!$_POST['title'] || !$_POST['score'] ) {
	Session::Set('error', 't�tulo de cr�dito e n�o deve estar vazio');
	redirect(null);
}

if ( $goods ) {
	if ( $flag = $table->update( $uarray ) ) {
		Session::Set('notice', 'bens edi��o conseguiu');
	} else {
		Session::Set('error', 'edi��o de bens n�o');
	}
} else {
	if ( $flag = $table->insert( $uarray ) ) {
		Session::Set('notice', 'bens de cria��o conseguiu');
	} else {
		Session::Set('error', 'cria��o de bens n�o');
	}
}

redirect(null);
