<div class="topDetail">
    <div class="current-path">
	<p>
    <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
        <a href="<?php echo $INI['system']['wwwprefix']; ?>" itemprop="url">
            <span itemprop="title"><?php echo $INI['system']['tenngan']; ?></span>
        </a>
    </span>
    &nbsp;&gt;&nbsp;
    <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
        <a href="<?php echo $INI['system']['wwwprefix']; ?>/<?php echo friendly_link($pcate['name']); ?>.html" itemprop="url">
            <span itemprop="title"><?php echo $pcate['name']; ?></span>
        </a>
    </span>
</p>
	</div>
                <div class="socialDetail">
				<div class="like-facebook">
				<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fzago.vn&amp;width=100&amp;height=21&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;send=false&amp;appId=120031461506592" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>
					</div>
				<div class="share-google">
				<div class="g-plusone" data-size="medium"></div>
				</div>
				<div class="share-tweet">
				<a class="addthis_button_tweet"></a>
				</div>
				<div class="share-pin">
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript">
var addthis_config = {"data_track_addressbar":false};
window.___gcfg = {lang: 'vi'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4dbfa31058b1c856"></script>
					</div></div>

</div>
<div class="infoDeal" itemtype="http://schema.org/Product" itemscope="">
                <div id="ctl00_Body_Main_dDealDetails_Slider" class="slideDeal">
				<div class="titleDeal">  
				<h1 itemprop="name" class="title-dealdt"><?php echo $team['product']; ?></h1>  
				<div itemprop="description"> 
				<p><?php echo $team['title']; ?></p></div>
				</div>
	<div class="slideImgDeal">
	<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 570px;
        height: 320px; background: #FFF; overflow: hidden;">
        <div u="slides" style="cursor: move; position: absolute; left: 120px; top: 5px; width: 445px; height: 310px; overflow: hidden;">
        <?php if($team['image1']){?>
			<div>
                <img u="image" src="<?php echo team_image($team['image1']); ?>" />
                <img u="thumb" src="<?php echo team_image($team['image1'],true); ?>" />
            </div>
        <?php }?>
		<?php if($team['image2']){?>
			<div>
                <img u="image" src="<?php echo team_image($team['image2']); ?>" />
                <img u="thumb" src="<?php echo team_image($team['image2'],true); ?>" />
            </div>
        <?php }?>
		<?php if($team['image3']){?>
			<div>
                <img u="image" src="<?php echo team_image($team['image3']); ?>" />
                <img u="thumb" src="<?php echo team_image($team['image3'],true); ?>" />
            </div>
        <?php }?>
		<?php if($team['image4']){?>
			<div>
                <img u="image" src="<?php echo team_image($team['image4']); ?>" />
                <img u="thumb" src="<?php echo team_image($team['image4'],true); ?>" />
            </div>
        <?php }?>
		<?php if($team['image15']){?>
			<div>
                <img u="image" src="<?php echo team_image($team['image15']); ?>" />
                <img u="thumb" src="<?php echo team_image($team['image15'],true); ?>" />
            </div>
        <?php }?>	
        </div>

        <span u="arrowleft" class="jssord05l" style="width: 40px; height: 40px; top: 158px; left: 120px;">
        </span>
        <span u="arrowright" class="jssord05r" style="width: 40px; height: 40px; top: 158px; right: 8px">
        </span>
        <div u="thumbnavigator" class="jssort02" style="position: absolute; width: 120px; height: 320px; left:0px; bottom: 0px;top:3px">
            <div u="slides" style="cursor: move;">
                <div u="prototype" class="p" style="position: absolute; width: 105px; height: 70px; top: 0; left: 0;">
                    <div class=w><thumbnailtemplate style=" width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></thumbnailtemplate></div>
                    <div class=c>
                    </div>
                </div>
            </div>
        </div>
    </div>
	</div>	
	<div class="modOptionDeal">
				<div class="amo-price">  
				<p class="priceDeal" itemtype="http://schema.org/Offer" itemscope=""> 
				<span class="marketPrice"><del><?php echo formatMoney($team['market_price']); ?></del><u>đ</u></span>       
				<span itemprop="price"><?php echo formatMoney($team['team_price']); ?><u content="VND" itemprop="priceCurrency">đ</u></span> 
				</p>
				<span class="arrow_down f_bold"><?php echo round(moneyit((100*($team['market_price'] - $team['team_price'])/$team['market_price']))); ?>%</span>
				</div>			
				<div class="group-support">
                            <img src="/img/img-support-buy-product.png" alt="online">
                            <div class="hot-line"><?php echo $INI['system']['cskh']; ?></div>
                 </div>		
				<div class="amo-buy group-num"> 
				<div class="sumPrice" style="width:120px">
				<span>Chọn số lượng:</span>
				<div class="soluong">
                                    <input type="text" id="prosl" value="1">
                                    <div class="button">
                                        <a href="javascript:void(0);" onclick="QuantityUp();" class="up"></a><a href="javascript:void(0);" onclick="QuantityDow()" class="down"></a>
                                    </div>
                                </div>
				</div>
				<?php if(!$team['active']){?>
				<a class="btn-detail buy-normal btnMuaNgay"></a>
				<?php } else { ?>
				<a class="btn-detail buy-soidout"></a>
				<?php }?>
				</div>
				<div class="clear"></div>
				<div class="icoFly">
                                <span>Giao hàng trên toàn quốc</span>
                </div>
				</div>
	</div>              
				
    <div class="left-description">					
                    <div class="mod-description">
						<div class="ithongtin"></div>
						<div class="dealInfo">
							<div class="inote"><?php echo $team['notice']; ?></div>	
							<?php echo $team['detail']; ?>
						<?php if($team['tag']!=''){?>	
							<div class="dvTag">Từ khóa:<?php echo get_tags('tags',$team['tag'],0); ?></div>
						<?php }?>	
						</div>
                      </div>
					<div class="mod-description p20 fb">
				   <div class="highlights-cond" id="youcomment"><span>Ý kiến của bạn</span></div>
				   <div class="comment">
				   <div class="fb-comments" data-href="http://www.dealsaigon.com<?php echo rewrite_team_id($team['id']); ?>" data-width="700" data-numposts="5" data-colorscheme="light"></div>
				   </div>
				   </div>
				   <div id="scrollOther">
				   <?php include template("block_li_team_other");?>
				   </div>				   
	</div> 
	<?php include template("block_team_other");?>
</div><div class="BottomTeam"></div>
<?php include template("block_deal_detail_optionbox");?>
<script>
            jssor_slider1_starter('slider1_container');
			$(".mod-sideDeal").stick_in_parent({offset_top: 5});	
		
</script>