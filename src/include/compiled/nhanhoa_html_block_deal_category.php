<div class="nhtop">
<div class="current-path wd">
	<p>
    <span itemscope="breadcrumb">
        <a href="<?php echo $INI['system']['wwwprefix']; ?>" itemprop="url">
            <span itemprop="title"><?php echo $INI['system']['tenngan']; ?></span>
        </a>
    </span>
    &nbsp;&gt;&nbsp;
    <span itemscope="breadcrumb">
        <a href="<?php echo $INI['system']['wwwprefix']; ?>/<?php echo friendly_link($pcate['name']); ?>.html" itemprop="url">
            <span itemprop="title"><?php echo $pcate['name']; ?></span>
        </a>
    </span>
</p>
</div></div>
<div class="ls_deal_of_category">
<div class="titleCategory"></div>
<?php if(!$countCate){?>	
<div class="no-deal">Hiện tại chưa có sản phẩm nào trong mục này, quý khách vui lòng trở lại sau.</div>	
<?php }?>
    <div class="ls_cate_product2">
        <?php if(is_array($teams)){foreach($teams AS $index=>$one) { ?>
        <div class="cate_product_item2" <?php echo ($index+1)%5?'':'style="margin-right:0px"'; ?>>
            <div class="cate_product_item_img2">
                <a href="<?php echo rewrite_team_id($one['id']); ?>">
                    <img alt="<?php echo $one['product']; ?>, <?php echo $INI['system']['keywordseo']; ?>" src="<?php echo team_image($one['image']); ?>" />
                </a>
            </div>
            <div class="cate_product_item_title2">
                <h1><a href="<?php echo rewrite_team_id($one['id']); ?>"><?php echo $one['product']; ?></a></h1>
            </div>
            <div class="cate_product_item_info2 hrteam">
                <span class="deal_common_info2 sale_prc2">
				<span class="icon_price"></span>
				<span class="price-offer"><?php echo formatMoney($one['team_price']); ?><sup>đ</sup></span>
				<span class="space">|</span>
				<span class="del"><del><?php echo formatMoney($one['market_price']); ?></del><sup>đ</sup></span>
				</span>                 
            </div>
        </div>
        <?php }}?>
    </div>
    <div class="clear"></div>
    <?php echo $pagestring; ?>
</div>
<div class="nhbot"></div>

