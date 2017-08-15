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
        <a href="/gio-hang.html" itemprop="url">
            <span itemprop="title">Xác nhận đơn hàng</span>
        </a>
    </span>
</p>
	</div></div>
	<div class="nhmain">
	<ul class="checkout-step">
           <li class="last-step ">
                <div class="step-number step-three"></div>
                <a href="#">HOÀN TẤT ĐƠN HÀNG</a></li>
           <li class="">
                <div class="step-number step-two"></div>
                <a href="#">THÔNG TIN KHÁCH HÀNG</a></li>
            <li class="reached">
                <div class="step-number step-one"></div>
                <a href="#" >KIỂM TRA ĐƠN HÀNG</a></li>
            <li class="first-step reached" style="width:67px">
                <div class="step-logo"></div>
                <a href="#"></a></li>
    </ul>
	
    <div class="wrap_cart">
        <div class="cart_content">
            <div class="cart_title odTitle">
                <h1 class="c_title_text">Đơn hàng</h1>
				<div class="form-subtitle">Thông tin đơn hàng của bạn</div>
            </div>
            <!-- begin cart content -->
            <div class="cart_content_title">
                <span class="title-del">Xóa</span> <span class="title-product">Sản phẩm</span>
                <span class="title-price">Đơn giá</span> <span class="title-soluong">Số lượng</span>
                <span class="title-thanhtien">Thành tiền</span>
                
            </div>
            <?php if(empty($carts)){?>
            <div class="cart_listitem">
            	<div style="width:100%;float:left;color:red;text-align:center;line-height:50px;">Giỏ hàng trống</div>
            </div>
            <?php } else { ?>
            <div class="cart_listitem">
				<?php if(is_array($carts)){foreach($carts AS $index=>$one) { ?>
                <?php 
                    $hdOptionValue = $one['deal_info'];
                    $info_id = intval(substr($hdOptionValue,-1));
                    $deal_id = intval(substr($hdOptionValue,0,-1));
                	$teams = Table::Fetch('team', $deal_id);
                    $info = 'infop'.$info_id;
                    $max_quantity = $teams['per_number'];
                    $quantity = $one['quantity'];
                    $price_sum = $quantity * $teams['team_price'];
                    $price_total += $price_sum;
                    $teams[$info] =  $teams[$info]?$teams[$info]:'Chọn ngẩu nhiên'; 
                ; ?>
                <div class="cart_item">
                    <div class="item_row">
                        <span style="margin-left: 0px;" class="title-del">
                        	<a title="Xóa sản phẩm này" href="javascript:">
                            	<img title="Xóa sản phẩm này" src="<?php echo $template_path; ?>/btn_del_item.png" alt="">
                       		</a>
                     	</span>
                   	</div>
                    <div class="item_row">
                        <span style="text-align: left;margin-top:14px" class="title-product">
                        	<a href="<?php echo rewrite_team_id($deal_id); ?>">
							<img src="<?php echo team_image($teams['image'],true); ?>" alt="<?php echo $teams['product']; ?>" width="60" height="60">
                            &nbsp;<?php echo $teams['product']; ?>
                           	</a>
                   		</span>
                  	</div>
                    <div class="item_row">
                        <span class="title-price"><?php echo formatMoney($teams['team_price']); ?></span></div>
                    <input type="hidden" value="<?php echo $hdOptionValue; ?>" id="hdDealIfoID">
                    <input type="hidden" value="<?php echo $teams['team_price']; ?>" id="price">
                    <input type="hidden" value="100" id="numAvalidable">
                    <input type="hidden" value="0" id="IsDealService">
                    <div class="item_row">
                        <span class="title-soluong">
                            <input type="text" onkeypress="blockNotNumber(event)" maxlength="2" style="width: 35px; text-align: center;margin-left:20px;float:left;" value="<?php echo $quantity; ?>" name="tbxQuantity" id="tbxQuantity">
                            <span style="margin: 0px;margin-left:3px; position: relative;top:5px;">
                                <img class="up_quantity" src="<?php echo $template_path; ?>/cart_quantity_up.png" alt="">
                                <img class="down_quantity" src="<?php echo $template_path; ?>/cart_quantity_down.png" alt="">
                            </span>
                        </span>
                    </div>
                    <div class="item_row"><span class="title-thanhtien tientratruoc"><?php echo formatMoney($price_sum); ?></span></div>
                    
                </div>
                <?php }}?>
                <div class="sum_item">
                    <span class="sum_item_title"><p>Tổng cộng&nbsp;</p></span>
                    <span class="sum_item_value_price"><p><?php echo formatMoney($price_total); ?></p></span>
                    
                </div>
                <div style="background: #e9e9e9; font-weight: bold;display:none;" class="sum_item">
                    <span class="sum_item_title"><p>Tổng tiền thanh toán&nbsp;</p></span>
                    <span class="sum_item_value_total"><p>0</p></span>
                </div>
                
            </div>
            <?php }?>
            <div class="continous-shop">
                <span><a href="/" class="btnv5 continue-buying"></a></span>
            </div>
            
            <div class="finish_order">
            	<?php if($login_user){?>
                <span><a href="/ThanhToan" id="btn_Order" class="btnv5 paying"></a></span>
                <?php } else { ?>
                <span><a href="#" id="btn_Order" class="btnv5 paying"></a></span>
                <?php }?>
            </div>
            
            <!-- end cart content -->
        </div>
        
        <?php if(!$login_user){?>
        <?php include template("block_cart_login");?>
        <?php include template("block_cart_regist");?>
        <?php }?>
        
    </div></div>
	<div class="nhbot"></div>
</div>