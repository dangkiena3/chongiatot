<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:580px;">
	<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">Đóng</span>Chi tiết Deal</h3>
	<div style="overflow-x:hidden;padding:10px;">
	<table width="96%" align="center" class="coupons-table">
		<tr><td width="122"><b>Tiêu đề Deal </b></td><td width="393"><b><?php echo $team['product']; ?></b></td></tr>
		<tr><td><b>Thời gian</b></td><td>Bắt đầu: <b><?php echo date('d-m-Y',$team['begin_time']); ?></b> - Kết thúc: <b><?php echo date('d-m-Y',$team['end_time']); ?></b></td></tr>

		<tr><td><b>Trạng thái </b></td>
		<td><span style="color:#F00;font-weight:bold;"><?php echo state_explain($team); ?></span><?php if($team['close_time']&&$team['now_number']>=$team['min_number']&&$team['delivery']!='express'){?>&nbsp;&nbsp;<span style="color:#F8C;font-weight:bold;"><?php if(($team['teamcoupon'])){?>&lt;<?php echo $INI['system']['couponname']; ?>Chưa kết thúc&gt;<?php } else { ?>&lt;Đang giao phiếu <?php echo $INI['system']['couponname']; ?>&gt;<?php }?></span><?php }?></td></tr>
		<tr><td><b>Số lượng </b></td><td>Thấp nhất <b><?php echo $team['min_number']; ?></b> - Cao nhất <b><?php echo $team['max_number']==0?'không giới hạn':$team['max_number']; ?></b></td></tr>
		<tr>
		  <td><b>Giá</b></td><td>Giá gốc&nbsp;<b><?php echo formatMoney($team['market_price']); ?></b>&nbsp;<b><?php echo $currency; ?></b>&nbsp;-&nbsp;Giá bán <b><?php echo formatMoney($team['team_price']); ?></b>&nbsp;<b><?php echo $currency; ?></b></td></tr>
		<tr><th colspan="2"><hr/></th><td width="7"></td>
		<tr>
		  <td><b>Thống kê mua</b></td>
		  <td><b>Tổng số mua hiện tại&nbsp;<?php echo $team['now_number']; ?></b>,có&nbsp;<b><?php echo $paycount; ?></b>&nbsp;người mua với&nbsp;<b><?php echo $buycount; ?> </b>lần mua.</td></tr>
		<tr>
		  <td><b>Thanh toán</b></td>
		  <td>Thanh toán online:<b> <?php echo formatMoney($onlinepay); ?> <?php echo $currency; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;Thanh toán bằng thẻ: <b><?php echo formatMoney($creditpay); ?> </b><b><?php echo $currency; ?></b></td></tr>
		<tr>
		  <td><b>Số dư tài khoản</b></td>
		  <td>Tổng:<b> <?php echo formatMoney($onlinepay+$creditpay); ?></b>&nbsp;<b><?php echo $currency; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;Credit vouchers: <b><?php echo formatMoney($cardpay); ?></b>&nbsp;<b><?php echo $currency; ?></b></td></tr>
	<?php if($team['needline']){?>
		<tr><th colspan="2"><hr/></th></td>
		<tr><td colspan="2">
			<button style="padding:0;" id="dialog_subscribe_button_id" onclick="if(confirm('Tiến trình gửi email cho khách hàng sẽ tiến hành, xin hãy chờ và đồng ý để tiếp tục')){this.disabled=true;return X.misc.noticenext(<?php echo $team['id']; ?>,0);}">Gửi email khách hàng&nbsp;(<span id="dialog_subscribe_count_id">0</span>/<?php echo $subcount; ?>)</button>&nbsp;
			<?php if($team['noticesmssubscribe']){?><button style="padding:0;" id="dialog_smssubscribe_button_id" onclick="if(confirm('The process of sending text messages, please be patient, agreed to do ')){this.disabled=true;return X.misc.noticenextsms(<?php echo $team['id']; ?>,0);}">Gửi SMS khách hàng&nbsp;(<span id="dialog_smssubscribe_count_id">0</span>/<?php echo $smssubcount; ?>)</button>&nbsp;<?php }?>
			<?php if($team['noticesms']){?><button id="dialog_sms_button_id" onclick="if(confirm('The process of sending text messages, please be patient, agreed to do？')){this.disabled=true;return X.misc.noticesms(<?php echo $team['id']; ?>,0);}">Tin nhắn đã gửi trong coupon&nbsp;(<span id="dialog_sms_count_id">0</span>/<?php echo $couponcount; ?>)</button>&nbsp;<?php }?>
			<?php if($team['teamcoupon']){?><button onclick="this.disabled=true;return X.manage.teamcoupon(<?php echo $team['id']; ?>);">Gửi vé tự động&nbsp;(<?php echo $couponcount; ?>/<?php echo $buycount; ?>)</button>&nbsp;<?php }?>
		</td></tr>
	<?php }?>
	</table>
	</div>
</div>
