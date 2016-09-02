<?php include template("manage_header");?>

<div id="bdw" class="bdw">

<div id="bd" class="cf">

<div id="partner">

	<div class="dashboard" id="dashboard">

		<ul><?php echo mcurrent_system('index'); ?></ul>

	</div>

	<div id="content" class="clear mainwide">

        <div class="clear box">

            <div class="box-top"></div>

            <div class="box-content">

                <div class="head"><h2>Cài đặt cơ bản</h2></div>

                <div class="sect">

                    <form method="post">

						<div class="wholetip clear"><h3>1. Thông tin cơ bản</h3></div>

                        <div class="field">

                            <label>Tên công ty</label>

                            <input type="text" size="30" name="system[companyname]" class="f-input" value="<?php echo $INI['system']['companyname']; ?>"/>

                        </div>

                        <div class="field">

                            <label>Địa chỉ</label>

                            <input type="text" size="30" name="system[address]" class="f-input" value="<?php echo $INI['system']['address']; ?>"/>

                        </div>

                        <div class="field">

                            <label>Điện thoại</label>

                            <input type="text" size="30" name="system[tel]" class="f-input" value="<?php echo $INI['system']['tel']; ?>"/>

                        </div> 
						<div class="field">

                            <label>Hotline</label>

                            <input type="text" size="30" name="system[hotline]" class="f-input" value="<?php echo $INI['system']['hotline']; ?>"/>

                        </div>
                        
						<div class="field">

                            <label>Chăm sóc KH</label>

                            <input type="text" size="30" name="system[cskh]" class="f-input" value="<?php echo $INI['system']['cskh']; ?>"/>

                        </div>
                        
						<div class="field">

                            <label>Tổng đài 1</label>

                            <input type="text" size="30" name="system[tongdai1]" class="f-input" value="<?php echo $INI['system']['tongdai1']; ?>"/>

                        </div>
                        
						<div class="field">

                            <label>Tổng đài 2</label>

                            <input type="text" size="30" name="system[tongdai2]" class="f-input" value="<?php echo $INI['system']['tongdai2']; ?>"/>

                        </div>
                        
						<div class="field">

                            <label>Hotline</label>

                            <input type="text" size="30" name="system[tgphucvu]" class="f-input" value="<?php echo $INI['system']['tgphucvu']; ?>"/>

                        </div>

                        <div class="field">

                            <label>Fax</label>

                            <input type="text" size="30" name="system[fax]" class="f-input" value="<?php echo $INI['system']['fax']; ?>"/>

                        </div> 

                        <div class="field">

                            <label>E-mail</label>

                            <input type="text" size="30" name="system[email]" class="f-input" value="<?php echo $INI['system']['email']; ?>"/>

                        </div>
				                                                               

                        <div class="field">

                            <label>Website</label>

                            <input type="text" size="30" name="system[sitename]" class="f-input" value="<?php echo $INI['system']['sitename']; ?>"/>

                        </div>

                        <div class="field">
                            <label>Tên website</label>
                            <input type="text" size="30" name="system[sitetitle]" class="f-input" value="<?php echo $INI['system']['sitetitle']; ?>"/>
                        </div>
						<div class="field">
                            <label>Description</label>
                            <input type="text" size="30" name="system[description]" class="f-input" value="<?php echo $INI['system']['description']; ?>"/>
                        </div>
						<div class="field">
                            <label>Keyword</label>
                            <input type="text" size="30" name="system[keyword]" class="f-input" value="<?php echo $INI['system']['keyword']; ?>"/>
                        </div>
                        <div class="field">

                            <label>Tên site rút gọn</label>

                            <input type="text" size="30" name="system[abbreviation]" class="f-input" value="<?php echo $INI['system']['abbreviation']; ?>"/>

                        </div>
                        
                        <div class="field">

                            <label>Tên ngắn</label>

                            <input type="text" size="30" name="system[tenngan]" class="f-input" value="<?php echo $INI['system']['tenngan']; ?>"/>

                        </div>
                        
                        <div class="field">

                            <label>Từ khóa SEO</label>

                            <input type="text" size="30" name="system[keywordseo]" class="f-input" value="<?php echo $INI['system']['keywordseo']; ?>"/>
                            
                            <span class="hint">Các từ khóa cách nhau dấu phẩy. Chú ý nên ít thay đổi từ khóa này để đảm bảo thứ hạng website</span>

                        </div>

                       

                        <div class="field">

                            <label>Tên Coupon</label>

                            <input type="text" size="30" name="system[couponname]" class="f-input" value="<?php echo $INI['system']['couponname']; ?>"/>

                        </div>

                        <div class="field">

                            <label>Icon tiền tệ</label>

                            <input type="text" size="30" name="system[currency]" class="number" value="<?php echo $INI['system']['currency']; ?>"/>

						</div>

                        <div class="field">

                            <label>Mã tiền tệ</label>

                            <input type="text" size="30" name="system[currencyname]" class="number" value="<?php echo $INI['system']['currencyname']; ?>"/><span class="inputtip">VD: VNĐ, USD,..</span>

						</div>
<!--
                        <div class="field">

                            <label>Mời và giảm giá</label>

                            <input type="text" size="30" name="system[invitecredit]" class="number" value="<?php echo abs(intval($INI['system']['invitecredit'])); ?>"/>

							<span class="inputtip"><?php echo $currency; ?></span>

						</div>
				
						 <div class="field">

                            <label>Số deal gần đây</label>

                            <input type="text" size="30" name="system[recentteam]" class="number" value="<?php echo abs(intval($INI['system']['recentteam'])); ?>"/>

							<span class="hint">Số deal gần đây mà bạn muốn hiển thị trong trang giá tốt gần đây (đề nghị 4x)</span>

						</div>
						
						<div class="field">

                            <label>Số deal hôm nay</label>

                            <input type="text" size="30" name="system[mainteam]" class="number" value="<?php echo abs(intval($INI['system']['mainteam'])); ?>"/>

							<span class="hint">Số deal mà bạn muốn hiển thị trong giá tốt hôm nay(đề nghị 4x)</span>

						</div>
                        
                       	<div class="field">

                            <label>Số tin tức</label>
                            
                            <input type="text" size="30" name="system[newsitem]" class="number" value="<?php echo abs(intval($INI['system']['newsitem'])); ?>"/>

							<span class="hint">Số tin mà bạn muốn hiển thị trong trang tin tức!</span>

						</div>
                        
                       	<div class="field">

                            <label>Số slide</label>
                            
                            <input type="text" size="30" name="system[slideitem]" class="number" value="<?php echo abs(intval($INI['system']['slideitem'])); ?>"/>

							<span class="hint">Số lượng slide mà bạn muốn hiển thị ở trang chủ!</span>

						</div>
                        
                       	<div class="field">

                            <label>Số left adsense</label>
                            
                            <input type="text" size="30" name="system[adslitem]" class="number" value="<?php echo abs(intval($INI['system']['adslitem'])); ?>"/>

							<span class="hint">Số lượng banner mà bạn muốn hiển thị ở quảng cáo bên trái!</span>

						</div>
                        
                       	<div class="field">

                            <label>Số left adsense home</label>
                            
                            <input type="text" size="30" name="system[adslhomeitem]" class="number" value="<?php echo abs(intval($INI['system']['adslhomeitem'])); ?>"/>

							<span class="hint">Số lượng banner mà bạn muốn hiển thị ở quảng cáo bên trái ở trang chủ!</span>

						</div>
                        
                       	<div class="field">

                            <label>Số left ads voucher</label>
                            
                            <input type="text" size="30" name="system[vright_ads_item]" class="number" value="<?php echo abs(intval($INI['system']['vright_ads_item'])); ?>"/>

							<span class="hint">Số lượng banner mà bạn muốn hiển thị ở quảng cáo bên phải ở trang chợ voucher!</span>

						</div>
                        
                       	<div class="field">

                            <label>Số kết quả TK</label>
                            
                            <input type="text" size="30" name="system[searchitem]" class="number" value="<?php echo abs(intval($INI['system']['searchitem'])); ?>"/>

							<span class="hint">Số lượng sản phẩm mà bạn muốn hiển thị ở kết quả tìm kiếm!</span>

						</div>
                        
                       	<div class="field">

                            <label>Số deal cùng d.mục</label>
                            
                            <input type="text" size="30" name="system[other_cate_item]" class="number" value="<?php echo abs(intval($INI['system']['other_cate_item'])); ?>"/>

							<span class="hint">Số lượng sản phẩm mà bạn muốn hiển thị ở sản phẩm cùng danh mục trong trang chi tiết!</span>

						</div>
                        
                       	<div class="field">

                            <label>Số deal ưa thích</label>
                            
                            <input type="text" size="30" name="system[favitem]" class="number" value="<?php echo abs(intval($INI['system']['favitem'])); ?>"/>

							<span class="hint">Số lượng sản phẩm mà bạn muốn hiển thị ở trang deal ưa thích!</span>

						</div>
                        
                       	<div class="field">

                            <label>Số deal mới</label>
                            
                            <input type="text" size="30" name="system[new_deal_item]" class="number" value="<?php echo abs(intval($INI['system']['new_deal_item'])); ?>"/>

							<span class="hint">Số lượng sản phẩm trong danh mục sản phẩm mới mà bạn muốn hiển thị ở trang chủ!</span>

						</div>
                        
						<div class="wholetip clear"><h3>2. Cài đặt chợ voucher</h3></div>
                        
                       	<div class="field">

                            <label>Số tin chợ voucher</label>
                            
                            <input type="text" size="30" name="system[vmarketiteam]" class="number" value="<?php echo abs(intval($INI['system']['vmarketiteam'])); ?>"/>

							<span class="hint">Số lượng tin rao mà bạn muốn hiển thị ở trang chủ chợ voucher!</span>

						</div>
                        
                       	<div class="field">

                            <label>Số tin khác</label>
                            
                            <input type="text" size="30" name="system[vmarket_other_item]" class="number" value="<?php echo abs(intval($INI['system']['vmarket_other_item'])); ?>"/>

							<span class="hint">Số lượng tin rao khác mà bạn muốn hiển thị ở trang chi tiết!</span>

						</div>
                        
                       	<div class="field">

                            <label>Số online ảo</label>
                            
                            <input type="text" size="30" name="system[virtal_online]" class="number" value="<?php echo abs(intval($INI['system']['virtal_online'])); ?>"/>

							<span class="hint">Số online ảo mà bạn muốn người dùng thấy ở cuối trang!</span>

						</div>
                        
                        
                        -->
						<!-- Fanpage -->

						<div class="wholetip clear"><h3>2. Cài đặt Fanpage</h3></div>

              			<div class="field">
						
                            <label>Trang Twitter</label>

                            <input type="text" size="30" name="system[twitter]" class="f-input" value="<?php echo $INI['system']['twitter']; ?>"/>
							
							<span class="inputtip">Nhập có http://</span>

                        </div>   

                        <div class="field">

                            <label>Trang Facebook</label>

                            <input type="text" size="30" name="system[facebook]" class="f-input" value="<?php echo $INI['system']['facebook']; ?>"/>

                            <span class="inputtip">Nhập có http://</span>

                        </div>

						<div class="field">

                            <label>Trang YouTube</label>

                            <input type="text" size="30" name="system[youtube]" class="f-input" value="<?php echo $INI['system']['youtube']; ?>"/>

                            <span class="inputtip">Nhập có http://</span>

                        </div>  

						<div class="field">

                            <label>Tài khoản Google+</label>

                            <input type="text" size="30" name="system[googleplus]" class="f-input" value="<?php echo $INI['system']['googleplus']; ?>"/>

                            <span class="inputtip">Nhập có http://</span>

                        </div> 
						<div class="field">

                            <label>Zing Me</label>

                            <input type="text" size="30" name="system[zingme]" class="f-input" value="<?php echo $INI['system']['zingme']; ?>"/>

                            <span class="inputtip">Nhập có http://</span>

                        </div>  

						<!-- End fanpage -->           

						<!--Logo and background-->

						
						<div class="wholetip clear"><h3>3. Chăm sóc khách hàng online</h3></div>

                        <div class="field">

                            <label>Yahoo mesenger 1</label>

                            <input type="text" size="30" name="system[ym1]" class="f-input" value="<?php echo $INI['system']['ym1']; ?>"/>

						</div>

                        <div class="field">

                        	<label>Yahoo messenger 2</label>

                            <input type="text" size="30" name="system[ym2]" class="f-input" value="<?php echo $INI['system']['ym2']; ?>"/>

						</div>
                        
                        <div class="field">

                        	<label>Yahoo messenger 3</label>

                            <input type="text" size="30" name="system[ym3]" class="f-input" value="<?php echo $INI['system']['ym3']; ?>"/>

						</div>
                        <div class="field">

                        	<label>Yahoo messenger 4</label>

                            <input type="text" size="30" name="system[ym4]" class="f-input" value="<?php echo $INI['system']['ym4']; ?>"/>

						</div>

                        <div class="field">

                        <label>Skype 1</label>

                            <input type="text" size="30" name="system[sk1]" class="f-input" value="<?php echo $INI['system']['sk1']; ?>"/>

						</div>


                        <div class="field">

                        <label>Skype 2</label>

                            <input type="text" size="30" name="system[sk2]" class="f-input" value="<?php echo $INI['system']['sk2']; ?>"/>

						</div>
						
						<div class="wholetip clear"><h3>4. Thông tin khác </h3></div>

                        <div class="field">

                            <label>Google Analytics</label>

                            <input type="text" size="30" name="system[ga]" class="f-input" value="<?php echo htmlspecialchars(stripslashes($INI['system']['ga'])); ?>" style="width:500px;"/>
							<span class="inputtip">Ex: UA-31263897-1</span>

						</div>

                        <div class="field">

                            <label>Google APIkey</label>

                            <input type="text" size="30" name="system[googlemap]" class="f-input" value="<?php echo htmlspecialchars(stripslashes($INI['system']['googlemap'])); ?>" style="width:500px;"/><span class="inputtip">google map Apikey <a href="http://code.google.com/intl/en/apis/maps/signup.html" target="_blank">Áp dụng ngay </a></span>

						</div>

                        <div class="field">

                            <label>Google maps zoom</label>

                            <input type="text" size="30" name="system[gmzoom]" class="number" value="<?php echo $INI['system']['gmzoom']; ?>"/>
							<span class="inputtip">Mặc đinh là 15</span>

						</div>

						<div class="act">

                            <input type="submit" value="Lưu" name="commit" class="formbutton" />

                        </div>

                    </form>

                </div>

            </div>

            <div class="box-bottom"></div>

        </div>

	</div>

</div>

</div> <!-- bd end -->

</div> <!-- bdw end -->



<?php include template("manage_footer");?>

