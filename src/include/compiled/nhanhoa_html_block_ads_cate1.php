<?php 
    $ads_cate1 = DB::LimitQuery('adsense', array(
    'condition' => array('display'=>'Y', 'pos_ads'=>'cate1'),
    'order' => 'ORDER BY order_sort ASC, id DESC',
));
; ?>
<?php if(!empty($ads_cate1)){?>
<div class="clear"></div>
<div class="ads_cate">
    <a href="<?php echo $ads_cate1['0']['url']; ?>" target="_blank" title="<?php echo $ads_cate1['0']['name']; ?>">
        <img alt="<?php echo $ads_cate1['0']['name']; ?>" src="<?php echo team_image($ads_cate1['0']['image']); ?>" width="1001" />
    </a>
</div>
<div class="clear"></div>
<?php }?>