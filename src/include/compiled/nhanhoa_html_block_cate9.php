<?php if($INI['option']['cate_name9']){?>
<?php 
    $item = 9;
    $cate_id = abs(intval($INI['option']['cate_name9']));
    $quantity_cate = abs(intval($INI['option']['cate_quantity9']));
    if(empty($quantity_cate)) $cate_quantity = 10;
    $cates = Table::Fetch('cate', $cate_id);
    $cate_name = get_name_cate($cate_id);
	$condition_cate = array('active'=>'0',);
	$condition_cate[] = "group_ppid = '".$cate_id."' OR group_pid IN (select id from cate where pid ='".$cate_id."')";
	$team_cate = DB::LimitQuery('team', array(
		'condition' => $condition_cate,
		'order' => 'ORDER BY RAND()',
		'size' => $quantity_cate,
	
	));
	$count = Table::Count('team',$condition_cate);
; ?>
<?php if($count){?> 
	<?php include template("block_li_team_home");?>
<?php }?>
<?php }?>