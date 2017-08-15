<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

if($_POST){
	$id = $_POST['cmt_id'];
	Table::Delete('vmarket_cmt',$id);
}