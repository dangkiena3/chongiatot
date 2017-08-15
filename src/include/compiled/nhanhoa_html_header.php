<?php include template("html_header");?>
<?php include template("html_header");?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="tab-header">
	<div class="gr-tabs">
		
        <div class="login-tabs">
            <div id="userNotLogDiv" style="display: <?php if($login_user){?>none<?php } else { ?>block<?php }?>">
                <div class="userLogon">
                    <div class="forgotpass">
                        <div class="row-2">
							<span><a class="btnDangKy" href="/dang-nhap.html">Đăng nhập</a></span>
                            <span>&nbsp;|&nbsp;</span>
                            <span><a class="btnDangKy" href="/dang-ky.html">Đăng ký</a></span>


                        </div>
                    </div>                   
                </div>
            </div>
            <div id="userLogDiv" style="display: <?php if($login_user){?>block<?php } else { ?>none<?php }?>">

                <div class="userLogon" style="background-image:none !important;">

                    <div class="divRow" style="line-height:30px;">

                        <div class="divColumnTitle" style="width: 100%; text-align: right;">

                           <span id="ctm_email">
						   <a href="/trang-ca-nhan/thong-tin-cua-toi.html"  style="color:#0095da;">
						   <img src="<?php echo user_image($login_user['avatar']); ?>" height="25" width="25" alt="avatar" style="vertical-align: middle;margin-top: -5px;"/>
						   <?php echo $login_user['realname']; ?></a></span> | 

                            <span>

                            	<a href="/trang-ca-nhan/don-hang-cua-toi.html">Đơn hàng</a>

                                <a class="mail-note boldOrange" href="/trang-ca-nhan/hop-thu" style="display:none;" title="Bạn có 0 tin nhắn mới"><span class="number">0</span></a>

                        	</span>

                            | <span><a class="btnLogOut" onclick="" href="javascript:;">Thoát</a></span>

                        </div>

                    </div>

                </div>

            </div>
            <div class="clear"></div>
        </div>
</div>
<div class="Header">
    <div id="divHeader">
        <div class="divLogo">
	<a href="/" title="<?php echo $INI['system']['sitetitle']; ?>" class="logo"></a>
	</div>
	<div class='searchMain'>
                               
								<form id="searchbox" action="/Tim-kiem">
                                <div class='keySearchMain'>
                                    <input name="sk" type="text" id="ctl00_txtGlSearch" class="txtGlSearch" placeholder="Tìm kiếm sản phẩm" />
                                </div>                         
                                    <i></i>
								<input class='btnSearchMain' id="submit" type="submit" value="">
								</form>
    
	</div>
	<div class="ic-hotline">
                    Hotline
                    <br>
                    <span><?php echo $INI['system']['hotline']; ?></span>
    </div>
	</div>
</div>
<div class="clear"></div>
 <div class="sectionEmail" id="nhanhoa">
                    <div class="header">
                        <div class="container bg-header">
                            <div id="ctl00_dBasket" class="bg-cart">
							<div class='amo-cart'> 
							<a href='/gio-hang' class='cart'>
							<span>Giỏ hàng</span>
							<i class="cart-quantity"><?php echo $total_quantity; ?></i>
							</a> 					
							</div>
							</div>
							
                            <div class='mainMenu'>
                                <span class='labelMenu'>
                                    Danh mục sản phẩm
                                    <i class="showSubMenu"></i>
                                </span>
							<div class="CategoryBox">	
							<?php include template("block_cate");?>
							</div>
                            </div> 
							<div class="Menusale">
								<div class="sale-off">
									<span class="sale-icon">
										<img src="/img/i_cloud.png" style="height:21px;border-width:0px;">
									</span>  
									<a href="/ve-chung-toi.html">Giới thiệu <br>Cửa hàng</a>                    
								</div>
								<div class="sale-off">
									<span class="sale-icon">
										<img src="/img/i_smile.png" style="height:21px;border-width:0px;">
									</span>  
									<a href="lien-he.html">Bản đồ <br>cửa hàng </a>                    
								</div>
								<div class="sale-off">
									<span class="sale-icon">
										<img src="/img/i_love.png" style="height:21px;border-width:0px;">
									</span>  
									<a href="/index.php">Tặng quà<br>Ý nghĩa</a>                    
								</div>
								<div class="sale-off">
									<span class="sale-icon">
										<img src="/img/i_help.png" style="height:21px;border-width:0px;" alt="huong dan mua hang">
									</span>  
									<a href="/hinh-thuc-thanh-toan.html">thanh toán</a>                    
								</div>
							</div>			
                        </div>
                    </div>
</div>
<div id="divMain">
    <div id="divContent">




<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-77710019-2', 'chongiatot.vn');
  ga('send', 'pageview');

</script>
