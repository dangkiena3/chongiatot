<?php
require_once(dirname(__FILE__) . '/app.php');
$rcates = DB::LimitQuery('cate', array(
    	'condition' => array('cate_type'=>'deal', 'type'=>'root', 'display'=>'Y'),
        'order' => 'ORDER BY sort_order',
        'size' => '15',
    ));  
	foreach($rcates AS $id=>$cate){
	$ccates = DB::LimitQuery('cate', array(
    	'condition' => array('cate_type'=>'deal', 'type'=>'child', 'display'=>'Y', 'pid'=>$cate['id']),
        'order' => 'ORDER BY sort_order ASC',
    ));
	
	echo "RewriteRule ^".rewrite_cate_shop($cate['id'])."$ team.php?gid=".$cate['id'].'<br/>';
	foreach($ccates AS $id=>$cate){
		echo "RewriteRule ^".rewrite_cate_shop($cate['id'])."$ team.php?gid=".$cate['id'].'&child=1<br/>';
	}
	}

