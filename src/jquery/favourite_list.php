<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

check_login();

$page = $_POST['page'];

$condition = array('user_id' => $login_user_id);

$count = Table::Count('favourite',$condition);

$page_size = $INI['system']['favitem']?$INI['system']['favitem']:10;

list($pagesize, $offset, $pagestring) = pagestring($count, $page_size);

$favs = DB::LimitQuery('favourite', array(

	'condition' => $condition,
	
	'order' => 'ORDER BY id DESC',
	
	'size' => $pagesize,

	'offset' => $offset,
));

echo '"div"';
//include template('block_favourite_list');
