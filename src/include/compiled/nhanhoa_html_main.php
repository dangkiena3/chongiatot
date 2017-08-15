<?php include template("header");?>
<?php if($INI['option']['pop_center_display']=='Y'){?>
<?php include template("block_popup_center");?>
<?php }?>
<div class="leftContent">

    <div class="clear"></div>
    <?php include template("block_slider");?>
    <div class="clear"></div>
    
</div>
<div class="rightContent">
    <?php include template("block_cate");?>
</div>
<div class="clear"></div>
<div class="sectionSubMenu subscribe">
<form id="frsubemail" name="frsubemail" method="post" action="#">
	<div class="res-sn-outside">
	<div class="res-sale-news">
	<span class="restitle">
	<div class="first"></div>
	<div class="doi">
        <span class="text1">Sản phẩm </span><span class="text2">chất lượng</span>
    </div>
	<div class="tich">
        <span class="text1">Giá luôn</span> <span class="text2">Tốt nhất</span>
    </div>
	<div class="camket">
        <span class="text1">Phục vụ</span><span class="text2">Chu đáo</span>
    </div>
	</span>
	<p class="txt">
	<input name="emailsub" id="emailsub" type="text" value="Nhập email của bạn" onfocus="if(this.value=='Nhập email của bạn')this.value=''" onblur="if(this.value=='')this.value='Nhập email của bạn'"></p>
	<a id="btn-sub" href="javascript:void(0)" class="btn btn-sub">Đăng ký ngay</a>
	<div class="subscribe_loading">
                    <img alt="" src="/img/loading.gif">
    </div>
	</div></div>
</form>
        <?php include template("block_ads_cate1");?>
    </div>
<div class="ls_cate_home_product">
    <?php include template("block_cate1");?>
    <?php include template("block_cate2");?>
    <?php include template("block_cate3");?>
    <?php include template("block_cate4");?>
    <?php include template("block_cate5");?>
    <?php include template("block_cate6");?>
    <?php include template("block_cate7");?>
    <?php include template("block_cate8");?>
    <?php include template("block_cate9");?>
    <?php include template("block_cate10");?>
	
</div>
	<div class="bottomAds"><?php include template("block_facebook_home");?></div>
<div class="clear"></div>
<?php include template("footer");?>