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
        <a href="/don-hang.html" itemprop="url">
            <span itemprop="title">Hoàn tất đơn hàng</span>
        </a>
    </span>
</p>
	</div></div>
<div class="nhmain">	
	<ul class="checkout-step">
           <li class="last-step reached">
                <div class="step-number step-three"></div>
                <a href="#">HOÀN TẤT ĐƠN HÀNG</a></li>
           <li class="">
                <div class="step-number step-two"></div>
                <a href="#">THÔNG TIN KHÁCH HÀNG</a></li>
            <li class="">
                <div class="step-number step-one"></div>
                <a href="#" >KIỂM TRA ĐƠN HÀNG</a></li>
            <li class="first-step" style="width:67px">
                <div class="step-logo"></div>
                <a href="#"></a></li>
    </ul>
	<div class="checkout-message">
            <div class="messgage-icon success"></div>
            <span>Đơn hàng đã được đặt thành công</span>
        </div>
    <div class="wrap_cart">
		<div class="thankyou-header">
                Cảm ơn bạn đã đặt hàng tại <?php echo $tenngan; ?>
            </div>
        <div class="cart_content">
            <div class="cart_title">
                <h1 class="c_title_text">thông tin đơn hàng của bạn </h1>
				<div class="form-subtitle">Mã đơn hàng: <b><?php echo $order['order_code']; ?></b>
				<br/><br/>
				Để theo dõi trạng thái của đơn hàng vui lòng vào <a href="/trang-ca-nhan/don-hang-cua-toi.html">Quản lý đơn hàng</a>
				<br/><br/>
				<b><?php echo $tenngan; ?> sẽ liên hệ xác nhận đơn hàng với bạn trong vòng 24h.</b>
				<br/>
				<b>Nhân viên giao hàng sẽ giao đến tận tay bạn từ 1- 3 ngày sau khi xác nhận ( Trừ ngày lễ, CN).</b>

				</div>
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
            	<?php if(is_array($team_orders)){foreach($team_orders AS $one) { ?>
                <?php 
                	$teams = Table::Fetch('team', $one['team_id']);
                    $info = 'infop'.$one['info_id'];
                    $teams[$info] =  $teams[$info]?$teams[$info]:'Chọn ngẩu nhiên'; 
                    $quantity = $one['quantity'];
                    $price_sum = $quantity * $teams['team_price'];
                    $price_total += $price_sum;
                    $count++;
                ; ?>
                <div class="cart_item">
                    <div class="item_row"><span style="margin-left: 0px;" class="title-del"><?php echo $count; ?></span></div>
                    <div class="item_row">
                        <span style="text-align: left" class="title-product">
                        	<a href="<?php echo rewrite_team_id($one['team_id']); ?>">&nbsp;<?php echo $teams['product']; ?></a>
                   		</span>
                   	</div>
                    <div class="item_row"><span class="title-price"><?php echo formatMoney($teams['team_price']); ?></span></div>
                    <div class="item_row"><span class="title-soluong"><?php echo $quantity; ?></span></div>
                    <div class="item_row"><span class="title-thanhtien"><?php echo formatMoney($price_sum); ?></span></div>
                	
                </div>
                <?php }}?>
                <!-- end div.cart_item -->
                
                <div class="sum_item">
                    <span class="sum_item_title"><p>Tổng cộng&nbsp;</p></span>
                    <span class="sum_item_value"><p><?php echo formatMoney($price_total); ?></p></span>
             
                </div>      
                
                <div style="background: #e9e9e9; font-weight: bold;" class="sum_item">
                    <span class="sum_item_title">
                        <p>Tổng tiền thanh toán chưa bao gồm phí vận chuyển. Freeship 5km với đơn hàng trên 100.000đ&nbsp;</p>
                    </span><span class="sum_item_value"><p><?php echo formatMoney($price_total); ?></p></span>
                  
                </div>
            </div>
            <!-- end cart content -->
        </div>
        <!-- end div.cart_content -->
        <div class="thanhtoan_control">
            <div style="margin-left: 505px;">
                <span class="btn_ctn_b"><a class="btnv5 continue-buying" href="/"></a></span>
            </div>
        </div>        
    </div></div>
	<div class="nhbot"></div>
</div>