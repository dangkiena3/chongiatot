<?php 
	$oc = array( 
			'team_type' => 'normal',
			'active' => '0',
			"id <> '$others_team_id'",
			"group_ppid = '$team[group_ppid]'",
			);
	$others = DB::LimitQuery('team', array(
				'condition' => $oc,
				'order' => 'ORDER BY RAND()',
				'size' => 10,
				));
	$count = Table::Count('team', $oc);	
; ?>
<?php if($count){?>
<div class="mod-sideDeal">
	<span class="titleSide">Có thể bạn quan tâm</span>
	<div class="lien-quan"></div>
	<div class="innerDeal">
<?php if(is_array($others)){foreach($others AS $one) { ?>
	<div class="deal-side" style="position:relative;"> 
	<a href="<?php echo rewrite_team_id($one['id']); ?>" title="<?php echo $one['product']; ?>">
	<img alt="<?php echo $one['product']; ?>" src="<?php echo team_image($one['image']); ?>" width="90" height="90"/>    </a>
	<div class="info-sideDeal"> 
	<span class="title"><a href="<?php echo rewrite_team_id($one['id']); ?>" title="<?php echo $one['product']; ?>"><?php echo $one['product']; ?></a></span>
	<p> 
		<del><?php echo formatMoney($one['market_price']); ?><sup>đ</sup></del>&nbsp;&nbsp; - &nbsp;<font style="color:#dc143c"><?php echo formatMoney($one['team_price']); ?><sup>đ</sup></font>       
	</p> 
	</div>
	</div>
<?php }}?>	
				   <p class="loadMore">  
				   <i></i>
				   <a href="/<?php echo friendly_link(getRecord('cate',$team['group_ppid'],'name')); ?>.html"> 
				   <span>Xem thêm</span>   
				   <span class="spanMore"></span> 
				   </a>   
				   </p>
				   </div>
</div>
<?php }?>