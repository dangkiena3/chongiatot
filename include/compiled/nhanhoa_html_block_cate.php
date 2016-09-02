<div class="category divProductCategoryBox">
<div class="contentMenu focusIndex">
<ul class='listMenu'>
<?php 
	$rcates = DB::LimitQuery('cate', array(
    	'condition' => array('cate_type'=>'deal', 'type'=>'root', 'display'=>'Y'),
        'order' => 'ORDER BY sort_order ASC',
        'size' => '10',
    ));    
; ?>
<?php if(is_array($rcates)){foreach($rcates AS $index=>$cate) { ?>	
	<li class='liCategory'>
    <div class='dNameCat <?php echo $index==8?"lastItem":""; ?>'>    
	<a class='mainCategory' href="<?php echo rewrite_cate_shop($cate['id']); ?>" style='cursor:pointer'> 
	<b style="background-image: url(<?php echo team_image($cate['image_icon']); ?>)"></b><?php echo $cate['name']; ?></a>
	<span class='arrExpand'></span>    </div>
<?php 
	$ccates = DB::LimitQuery('cate', array(
    	'condition' => array('cate_type'=>'deal', 'type'=>'child', 'display'=>'Y', 'pid'=>$cate['id']),
        'order' => 'ORDER BY sort_order ASC',
    ));
	$count_child = count($ccates);
; ?>
<?php if($count_child){?>	
	<div class='subCategory' style='top:-<?php echo ($index+0)*35; ?>px'> 
	<div class='innerSubCat' style='padding-right: 50px;'>  
	<span class='shadowLeftSub'></span>     
	<div class='modListSubs'>
	<?php if($cate['image_cate']){?>
	<span class='imgSubCat' style='bottom:0px;right:2px'> 
	<img src="/static/<?php echo $cate['image_cate']; ?>" alt="<?php echo $cate['name']; ?>" usemap='#<?php echo $cate['id']; ?>'/>
	</span>
	<?php }?>   
	<ul class='listSubCats'>
	<li class='nameSubCat '>  
	<a href="<?php echo rewrite_cate_shop($cate['id']); ?>">
    <span class="arrow"></span><?php echo $cate['name']; ?></a></li>
	<?php if(is_array($ccates)){foreach($ccates AS $index=>$ccate) { ?>
	<li><a href="<?php echo rewrite_cate_shop($ccate['id']); ?>"><?php echo $ccate['name']; ?></a></li>
	<?php if(($index+1)%9==0){?>
	</ul>
	<ul class='listSubCats'>
	<li class='nameSubCat '>
	<a href='#'>&nbsp;</a></li>
	<?php }?>
	<?php }}?>
	</ul>	
	</div></div></div>
<?php }?>	
	</li>
<?php }}?>	
	</ul></div>
</div>
<div class="clear"></div>
