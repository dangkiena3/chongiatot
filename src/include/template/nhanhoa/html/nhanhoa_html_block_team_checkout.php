<div class="personal_page"><div class="nhtop">
<div class="current-path wd">
	<p>
    <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
        <a href="<?php echo $INI['system']['wwwprefix']; ?>" itemprop="url">
            <span itemprop="title"><?php echo $INI['system']['abbreviation']; ?></span>
        </a>
    </span>
    &nbsp;&gt;&nbsp;
    <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
        <a href="/thanh-toan.html" itemprop="url">
            <span itemprop="title">Thanh toán đơn hàng</span>
        </a>
    </span>
</p>
	</div></div>
	<div class="nhmain">
	<ul class="checkout-step">
           <li class="last-step ">
                <div class="step-number step-three"></div>
                <a href="#">HOÀN TẤT ĐƠN HÀNG</a></li>
           <li class="reached">
                <div class="step-number step-two"></div>
                <a href="#">THÔNG TIN KHÁCH HÀNG</a></li>
            <li class="">
                <div class="step-number step-one"></div>
                <a href="#" >KIỂM TRA ĐƠN HÀNG</a></li>
            <li class="first-step" style="width:67px">
                <div class="step-logo"></div>
                <a href="#"></a></li>
    </ul>
    <div class="wrap_cart">
        <form action="/ThanhToan/AcceptOrder" method="POST" name="frmOrder" id="frmOrder">
        <div class="cart_address">
            <div class="cart_title hrl">
                 <h1 class="c_title_text">địa chỉ nhận hàng</h1>
				 <div class="form-subtitle">Thông tin đầy đủ, chính xác giúp việc giao nhận nhanh chóng.</div>
            </div>
            
            <div class="info_box">

                <div class="info_box_content">
                    <div class="address_one">
                        <span class="add_title">Họ và tên:<span style="color: Red;">*</span></span> 
                        <span class="add_input"><input type="text" value="<?php echo $users['realname']; ?>" name="FullName" id="FullName"></span>
                    </div>
                    <div class="address_one">
                        <span class="add_title">Điện thoại:<span style="color: Red;">*</span></span> 
                        <span class="add_input">
                            <input type="text" onkeypress="blockNotNumber(event)" maxlength="12" value="<?php echo $users['mobile']; ?>" name="tbxPhone" id="tbxPhone">
                     	</span>
                    </div>
                    <div class="address_one">
                        <span class="add_title">Tỉnh thành:<span style="color: Red;">*</span></span> 
                        <span class="add_input">
                            <select name="Province" id="Province" style="width: 235px;">
                            	<?php echo Utility::Option($option_provinces,$users['province_id'],'Chọn thành phố'); ?>
                            </select>
                            <input type="hidden" value="<?php echo $users['province_id']; ?>" name="hdProvinceSelected" id="hdProvinceSelected">
                        </span>
					</div>	
					<div style="" class="address_one">
                        <span class="add_title">Lời nhắn:</span> <span class="add_input">
                            <textarea value="" name="tbxNote" id="tbxNote" placeholder="Quý khách vui lòng ghi rõ thời gian có thể nhận hàng ( Giờ hành chính, hay cả buổi tối và ngày nghỉ…)"></textarea>
                      	</span>
                    </div>
					<div class="address_one">	
                        <span style="width: 100px;" class="add_title">Quận huyện:<span style="color: Red;">*</span></span>
                        <span class="add_input">
                            <select name="District" id="District" style="width: 235px;">
                            	<?php echo Utility::Option($opt_districts,$users['district_id'],'Chọn Quận Huyện'); ?>
                            </select>
                            <input type="hidden" value="<?php echo $users['district_id']; ?>" name="hdDistrictSelected" id="hdDistrictSelected">
                        </span>
                    </div>
					
                    <div class="address_one_1"></div>
                    <div class="address_one">
					<span class="add_title">Phường Xã:<span style="color: Red;">*</span></span>
                        <span class="add_input">
                           
                            <input type="hidden" value="<?php echo $users['ward_id']; ?>" name="hdWardSelected" id="hdWardSelected">
                        </span>
                    </div>
                    <div class="address_one">
                        <span class="add_title">Mã an toàn:<span style="color: Red;">*</span></span> 
                        <span class="add_input">
                            <input type="text" maxlength="10" style="width: 70px;" name="tbxCaptchaOrder" id="tbxCaptchaOrder">
                      	</span> 
                        <span id="captcha_box" class="add_input">
        					<img src="/captcha/captcha.php" alt="<?php echo $tenngan; ?> captcha" id="cpt_img" />
                        </span>
                        <span style="margin-left: 15px;" class="add_input">
                            <img src="/img/refresh.png" alt="<?php echo $tenngan; ?> captcha" style="cursor: pointer; margin-top: 8px;" id="btnRefreshCaptcha">
                     	</span>
                    </div>
					<div class="address_one_ad">
                        <span class="add_title">Số nhà, Đường:<span style="color: Red;">*</span></span>
                        <span class="add_input"><input style="width:365px;" type="text" value="<?php echo $users['address']; ?>" name="tbxAddressDelivery" id="tbxAddressDelivery"></span>
                    </div>
                </div>
            </div>
       
        </div>
        
        <div class="cart_thanhtoan">
            <div class="cart_title hrl">
                <h1 class="c_title_text">phương thức thanh toán</h1>
				<div class="form-subtitle">Vui lòng chọn cách thanh toán bên dưới</div>
            </div>
            <div class="info_box">
                <div class="info_box_content">
                    <ul class="thanhtoan_list">
                        <?php include template("block_method_list");?>
                    </ul>
                </div>

            </div>
        </div>     
        <div class="cart_content">
            <div class="cart_title">
                <span class="c_title_text">thông tin đơn hàng của bạn</span>
            </div>
            <!-- begin cart content -->
            <div class="cart_content_title">
                <span class="title-del">STT</span>
                <span class="title-product">Sản phẩm/Dịch vụ</span>
                <span class="title-price">Đơn giá</span> 
                <span class="title-soluong">Số lượng</span>
                <span class="title-thanhtien">Thành tiền         
           		</span>
            </div>
            <div class="cart_listitem">
				<?php if(is_array($carts)){foreach($carts AS $index=>$one) { ?>
                <?php 
                    $hdOptionValue = $one['deal_info'];
                    $info_id = intval(substr($hdOptionValue,-1));
                    $deal_id = intval(substr($hdOptionValue,0,-1));
                	$teams = Table::Fetch('team', $deal_id);
                    $info = 'infop'.$info_id;
                    $max_quantity = $teams['max_number'] - $teams['now_number'];
                    $quantity = $one['quantity'];
					$quantitys += $quantity;
                    $price_sum = $quantity * $teams['team_price'];
                    $price_total += $price_sum;
                    $teams[$info] =  $teams[$info]?$teams[$info]:'Chọn ngẩu nhiên'; 
                    $count++;
                ; ?>
                <div class="cart_item">
                    <div class="item_row">
                        <span style="margin-left: 0px;" class="title-del"><?php echo $count; ?></span></div>
                    <div class="item_row">
                        <span style="text-align: left;margin-top:10px" class="title-product">
                        	<a href="<?php echo rewrite_team_id($deal_id); ?>">
							<img src="<?php echo team_image($teams['image'],true); ?>" alt="<?php echo $teams['product']; ?>" width="60" height="60">
                                &nbsp;<?php echo $teams['product']; ?>
                            </a>
                      	</span>
                   	</div>
                    <div class="item_row"><span class="title-price"><?php echo formatMoney($teams['team_price']); ?></span></div>
                    <div class="item_row"><span class="title-soluong"><?php echo $quantity; ?></span></div>
                    
                    <div class="item_row"><span class="title-thanhtien"><?php echo formatMoney($price_sum); ?></span></div>
                   
                </div>
                <?php }}?>
                <!-- end div.cart_item -->
                
                <div class="sum_item" style="font-weight:bold">
                    <span class="sum_item_title"><p>Tổng cộng&nbsp;</p></span>
                    <span class="sum_item_value"><p><?php echo formatMoney($price_total); ?></p></span>
                    <input type="hidden" value="<?php echo $price_total; ?>" id="hdTotalPrice" name="hdTotalPrice">
					<input type="hidden" value="<?php echo $quantitys; ?>" id="hdTotalQuantity" name="hdTotalQuantity">
                </div>
                <div class="sum_item" style="display:none">
                    <span class="sum_item_title">
                        <p>Phí vận chuyển&nbsp;</p>
                    </span><span class="sum_item_value shipping_cost"><p>0</p></span>
                 
                    <input type="hidden" value="0" id="hdpaymentCost" name="hdpaymentCost">
                </div>
                <div style="background: #e9e9e9; font-weight: bold; color:red; font-size:14px" class="sum_item">
                    <span class="sum_item_title"><p>Tổng tiền thanh toán&nbsp;</p></span>
                    <span class="sum_item_value totalpaycost"><p></p></span>
                    
                </div>
                <div style="background: #F4B82C; font-weight: bold;" class="sum_item cmoney_payment">
                    <span class="sum_item_title"><p>Tổng số tiền tích lũy hiện có&nbsp;</p></span>
                    <span class="sum_item_value total_cmoney"><p><?php echo $user['money']; ?></p></span>
                </div>
                <div style="background: #F4B82C; font-weight: bold; color:red" class="sum_item cmoney_payment">
                    <span class="sum_item_title"><p>Tổng số tiền phải thanh toán&nbsp;</p></span>
                    <span class="sum_item_value totalpayaf"><p></p></span>
                </div>
                
            </div>
            <!-- end cart content -->
        </div>  
    
	

        <div class="notice_coupon">
            <span class="icon_rs"><img src="/include/template/<?php echo $INI['skin']['template']; ?>/css/images/coupon_ico.png" alt=""></span> 
            <span class="content_cp_rs"></span>
            <span class="close_noteice_cp"><a href="javascript://">&nbsp;</a></span>
        </div>
        <!--{/if}-->
        </form>
        <?php 
            $pay_banner = DB::LimitQuery('adsense', array(
                'condition' => array('display'=>'Y', 'pos_ads'=>'pay_banner'),
                'order' => 'ORDER BY order_sort ASC, id DESC',
            ));
        ; ?>
        <div style="width:660px; margin:10px; float:left">
            <a href="<?php echo $pay_banner['0']['url']; ?>" target="_blank" title="<?php echo $pay_banner['0']['name']; ?>">
                <img alt="<?php echo $pay_banner['0']['name']; ?>" src="<?php echo team_image($pay_banner['0']['image']); ?>" width="660" />
            </a>
        </div>
        
        
        <div class="thanhtoan_control">
            <div class="continous-shop">
                <span class="btn_ctn_b"><a href="/" class="btnv5 continue-buying"></a></span>
            </div>
            <div class="finish_order">
                <span class="btn_finish_o">
                	<a class="btnv5 paying" href="javascript:"></a>
             	</span>
            </div>
        </div>
    </div></div>
<div class="nhbot"></div>
</div>