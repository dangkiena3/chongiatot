<?php 
    $item = 2014;
	$condition_cate = array('active' => '0',);
	$team_cate = DB::LimitQuery('team', array(
		'condition' => $condition_cate,
		'order' => 'ORDER BY RAND()',
		'size' => 8,	
	));
	$count = Table::Count('team',$condition_cate);
; ?>
<?php if($count){?> 
	<div class="showproduct_cate">
	<div class="product_top">
        <div class="product_top_title cate-1"><h3><a href="/sieu-giam-gia.html" title="Sieu giam gia">Siêu giảm giá</a></h3></div>
    </div>
    <div class="product_cate_content">
       <div class="hot-product_sale_<?php echo $item; ?> mgt10 clearfix jcarousel-skin-thietketrangchu">
    <ul class="slide-hot-pr">
	<?php if(is_array($team_cate)){foreach($team_cate AS $index=>$one) { ?>
		<li style="<?php echo ($index+1)%4?"":"margin-right:0px"; ?>">
            <div class="dispImg ftp">
                <a href="<?php echo rewrite_team_id($one['id']); ?>">
                    <img src="<?php echo team_image($one['image']); ?>" alt="<?php echo $one['product']; ?>" width="164" height="164"/>
                </a>
			<?php if($one['market_price']){?>	
				<span class="lb-sale1"><b>-<?php echo round(moneyit((100*($one['market_price'] - $one['team_price'])/$one['market_price']))); ?>%</b></span> 
			<?php }?>	
			</div>
            <div class="title"><a href="<?php echo rewrite_team_id($one['id']); ?>" title="<?php echo $one['product']; ?>"><?php echo $one['product']; ?></a></div>
            <div class="desImg">
				<span class="fl fs14"><b class="clPrice fs16"><?php echo formatMoney($one['team_price']); ?> <?php echo $currency; ?></b>
                </span>
			<?php if($one['market_price']){?>	
                <span class="fl cl66 txtout"><?php echo formatMoney($one['market_price']); ?> <?php echo $currency; ?></span>
				<br/>
			<?php }?>
			</div>
        </li>       
    <?php }}?>                 
            </ul>	

</div>
    </div>
	<a href="/sieu-giam-gia.html" class="viewall" title="sieu giam gia"></a>
</div>

<?php }?>
