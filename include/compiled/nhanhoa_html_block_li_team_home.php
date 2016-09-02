<div class="showproduct_cate">
    <div class="product_top">
        <div class="product_top_title cate-<?php echo $item; ?>"><h3><a href="<?php echo rewrite_cate_shop($cate_id); ?>" title="<?php echo $cate_name; ?>"><?php echo $cate_name; ?></a></h3></div>
    </div>
    <div class="product_cate_content">
       <div class="hot-product_sale_<?php echo $item; ?> mgt10 clearfix jcarousel-skin-nhanhoa">
    <ul class="slide-hot-pr">
	<?php if(is_array($team_cate)){foreach($team_cate AS $one) { ?>
		<li>
            <div class="dispImg ftp">
                <a href="<?php echo rewrite_team_id($one['id']); ?>">
                    <img src="<?php echo team_image($one['image']); ?>" alt="<?php echo $one['product']; ?>" width="186" height="186"/>
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
	<div class="product_top_control"><a href="<?php echo rewrite_cate_shop($cate_id); ?>">
	<span class="v7inview">Xem tiếp</span><br/>
	<span class="v7productnum">Tất cả <?php echo $count; ?> sản phẩm</span>
	</a></div>		
</div>
    </div>
</div>
<script type="text/javascript">   
jQuery(document).ready(function() {
    $('.hot-product_sale_<?php echo $item; ?>').jcarousel({
        auto: 0,
        scroll: 1,
        wrap: 'circular',
        animation: 500,
        iniFallbackDimension: 90
     });
});
</script> 