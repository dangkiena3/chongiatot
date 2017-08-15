<div style="width:800px;margin:auto;border:solid 3px #EE8F02;float:left">
	<div class="adM">
	</div>
	<div style="width:700px;float:left;min-height:100px;margin-left:45px">
		<div class="adM"></div>
		<div style="width:500px;float:left">
			<div class="adM"></div>
			<span style="width:100%;float:left;margin-top:20px"><b>Kính chào quý khách</b></span>
			<span style="width:100%;float:left">Cảm ơn quý khách đã đặt hàng tại <a target="_blank" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>"><?php echo $tenngan; ?></a></span>
			<span style="width:100%;float:left">Đơn hàng của quý khách có mã số là: <b><?php echo $order['order_code']; ?></b></span>
		</div>
		<div style="width:200px;float:left">
			<img src="http:/lunglinhshop.net/include\template\nhanhoa\css\images\v2\w_logo.png" alt="<?php echo $tenngan; ?> - <?php echo $kwseo; ?>" />
		</div>
	</div>
	<div style="width:700px;float:left;margin-left:45px;margin-bottom:20px;margin-top:20px">
		<div style="width:100%;float:left;min-height:25px;background-color:#EE8F02">
			<span style="float:left;margin-top:2px;font-size:13pt;font-weight:bold;margin-left:5px">THÔNG TIN ĐƠN HÀNG</span>
		</div>
		<div style="width:300px;float:left">
			<span style="margin:10px 0px;width:100%;float:left"><b>Thông tin người đặt hàng (thanh toán)</b></span>
			<span style="width:100%;float:left">Họ tên: <?php echo $user['realname']; ?></span>
			<span style="width:100%;float:left">
            	Địa chỉ: <?php echo $user['address'].', '.get_name_local($user['district_id']).', '.get_name_local($user['province_id']); ?>
            </span>
			<span style="width:100%;float:left">Điện thoại: <?php echo $user['mobile']; ?></span>
		</div>
		<div style="width:390px;margin-left:10px;float:left">
			<span style="margin:10px 0px;width:100%;float:left"><b>Thông tin người nhận hàng</b></span>
			<span style="width:100%;float:left">Họ tên: <?php echo $order['fullname']; ?></span>
			<span style="width:100%;float:left">
            	Địa chỉ: <?php echo $order['address'].', '.get_name_local($order['district_id']).', '.get_name_local($order['province_id']); ?>
            </span>
			<span style="width:100%;float:left">Điện thoại: <?php echo $order['mobile']; ?></span>
		</div>
		<div style="float:left;width:700px;margin-bottom:10px;margin-top:10px">
			<b>Ghi chú:</b><?php echo $order['remark']; ?>
		</div>
	</div>
	<div style="width:700px;float:left;border:solid 1px #cdcdcd;font-size:14px;margin-left:45px">
		<div style="margin-bottom:10px;width:100%;float:left;min-height:25px;background-color:#EE8F02">
			<span style="float:left;margin-top:2px;font-size:13pt;font-weight:bold;margin-left:5px">CHI TIẾT ĐƠN ĐẶT HÀNG</span>
		</div>
		<div style="width:100%;float:left;background-color:gray;min-height:25px">
			<div style="width:40px;border-left:none;float:left;min-height:25px;text-align:center">
				<span style="float:left;width:100%;margin-top:5px;font-weight:bold">STT</span>
			</div>
			<div style="width:300px;float:left;min-height:25px;border-left:solid 1px #cdcdcd;text-align:center">
				<span style="float:left;width:100%;margin-top:5px;font-weight:bold">Tên sản phẩm</span>
			</div>
			<div style="width:80px;float:left;min-height:25px;border-left:solid 1px #cdcdcd;text-align:center">
				<span style="float:left;width:100%;margin-top:5px;font-weight:bold">Đơn giá</span>
			</div>
			<div style="width:70px;float:left;min-height:25px;border-left:solid 1px #cdcdcd;text-align:center">
				<span style="float:left;width:100%;margin-top:5px;font-weight:bold">Số lượng</span>
			</div>
			<div style="width:100px;float:left;min-height:25px;border-left:solid 1px #cdcdcd;text-align:center">
				<span style="float:left;width:100%;margin-top:5px;font-weight:bold">Thành tiền</span>
			</div>
			
		</div>
        <?php if(is_array($team_orders)){foreach($team_orders AS $index=>$team_order) { ?>
        <?php 
            $team = Table::Fetch('team', $team_order['team_id']);
            $info = 'infop'.$team_order['info_id'];
            $team[$info] =  $team[$info]?$team[$info]:'Chọn ngẩu nhiên'; 
            $quantity = $team_order['quantity'];
            $price_sum = $quantity * $team['team_price'];
            $method = Table::Fetch('shipping_method',$order['method_id']);
        ; ?>
		<div style="float:left;width:100%;min-height:60px;border-top:solid 1px #cdcdcd">
			<div style="width:40px;border-left:none;float:left;min-height:60px">
				<span style="float:left;width:100%;margin-top:20px;text-align:center"><?php echo ++$index; ?></span>
			</div>
			<div style="width:300px;float:left;border-left:solid 1px #cdcdcd;min-height:60px">
				<span style="float:left;width:100%;margin-top:20px;text-align:left"><?php echo $team['product']; ?>[<i style="color:#e7433c"><?php echo $team[$info]; ?></i>]</span>
			</div>
			<div style="width:80px;float:left;border-left:solid 1px #cdcdcd;min-height:60px">
				<span style="float:left;width:100%;margin-top:20px;text-align:center"><?php echo formatMoney($team['team_price']); ?></span>
			</div>
			<div style="width:70px;float:left;border-left:solid 1px #cdcdcd;min-height:60px">
				<span style="float:left;width:100%;margin-top:20px;text-align:center"><?php echo $quantity; ?></span>
			</div>
			<div style="width:100px;float:left;border-left:solid 1px #cdcdcd;min-height:60px">
				<span style="float:left;width:100%;margin-top:20px;text-align:center"><?php echo formatMoney($price_sum); ?></span>
			</div>
			
		</div>
        <?php }}?>
		<div style="width:100%;float:left;min-height:40px;background-color:#f9f9f9;border-top:solid 1px gray">
			<div style="float:left;min-height:40px;border-right:solid 1px #cdcdcd;width:493px;text-align:right">
				<span style="float:left;margin-top:10px;width:100%">Tổng tiền:&nbsp;</span>
			</div>
			<div style="float:left;width:100px;border-right:solid 1px #cdcdcd;min-height:40px">
				<span style="float:left;margin-top:10px;width:100%">&nbsp;<?php echo formatMoney($order['total_price']); ?></span>
			</div>
			
		
			
		</div>
				<b>Lưu ý: Chưa bao gồm phí vận chuyển hoặc trừ khuyến mãi. Chúng tôi sẽ liên hệ để thống nhất mức phí</b>

	</div>
	<div style="width:700px;float:left;margin:10px 0 10px 45px">
		<div style="margin-bottom:10px;width:100%;float:left;min-height:25px;background-color:#EE8F02">
			<span style="float:left;margin-top:2px;font-size:13pt;font-weight:bold;margin-left:5px">THÔNG TIN THANH TOÁN</span>
		</div>
		 <?php echo $method['name']; ?> 
	</div>
	<div style="width:700px;float:left;margin:10px 0 10px 45px">
		<div style="margin-bottom:10px;width:100%;float:left;min-height:25px;background-color:#EE8F02">
			<span style="float:left;margin-top:2px;font-size:13pt;font-weight:bold;margin-left:5px">THÔNG TIN THANH TOÁN</span>
		</div>
		 <strong style="font-size:16px; color:red"><?php echo $option_pay[$order['state']]; ?> - <?php echo $option_order_state[$order['order_state']]; ?> - <?php echo $option_ships[$order['ship_state']]; ?></strong>
	</div>
	<div style="width:700px;float:left;margin-left:45px;margin-bottom:20px;margin-top:20px">
		<span style="width:100%;float:left;margin-top:30px">------------------------------<wbr></wbr>------------------------------<wbr></wbr>------------------------------<wbr></wbr>------------------</span>
		<span style="width:100%;float:left"><b>Trung tâm hỗ trợ khách hàng</b></span>
		<span style="width:100%;float:left"><?php echo $INI['system']['companyname']; ?></span>
		<span style="width:100%;float:left">Địa chỉ:Thôn 4 - Yên Sở - Hoài Đức - Hà Nội</span>
		<span style="width:100%;float:left">Hotline: 0975 408 329</span>
		<span style="width:100%;float:left">Website:<a target="_blank" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>"><?php echo $tenngan; ?></a></span>
		<span style="width:100%;float:left;margin-bottom:20px">Email:<a target="_blank" href="mailto:<?php echo $INI['system']['email']; ?>"><?php echo $INI['system']['email']; ?></a></span>
		<div class="yj6qo"></div>
		<div class="adL"></div>
	</div>
	<div class="adL"></div>
</div>