<?php 
    $team_orders = DB::LimitQuery('team_order', array(
    	'condition' => array('id'=>$one['id']),
        'order' => 'ORDER BY id DESC',
    ));
; ?>
<div class="detail-box" id="detail-box">
    <div class="order-detail-box">
        <div class="btnClose"></div>
        <div class="clear"></div>
        <div class="order-table">
		<h2 class="title_info_setting">Chi tiết đơn hàng<span style="float:right"><a href="javascript:void(0)" onclick="PrintOrder()"><img src="/img/print.png" align="absmiddle"> In đơn hàng</a></span>
                        </h2>
            <table width="100%" cellspacing="0" cellpadding="0" class="orderdetail-table">
                <thead>
                    <tr>
                        <th width="4%">STT</th>
                        <th width="50%">Tên sản phẩm / Dịch vụ</th>
                        <th width="15%">Đơn giá</th>
                        <th width="10%">Số lượng</th>
                        <th width="15%">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($team_orders)){foreach($team_orders AS $index=>$team_order) { ?>
                    <?php 
                    	$team = Table::Fetch('team', $team_order['team_id']);
                    	$order = Table::Fetch('order', $team_order['order_id']);
                        $info = 'infop'.$team_order['info_id'];
                        $team[$info] =  $team[$info]?$team[$info]:'Chọn ngẩu nhiên'; 
                        $quantity = $team_order['quantity'];
                        $price_sum = $quantity * $team['team_price'];
                    ; ?>
                    <tr class="even">
                        <td class="center"><?php echo ++$index; ?></td>
                        <td>
                        	<a target="_blank" title="Xem chi tiết" href="<?php echo rewrite_team_id($team['id']); ?>"><?php echo $team['product']; ?></a>
                            [<i style="color: #E7433C;"><?php echo $team[$info]; ?></i>]
                        </td>
                        <td class="right dongia"><?php echo formatMoney($team['team_price']); ?></td>
                        <td class="center soluong"><?php echo $quantity; ?></td>
                        <td class="right thanhtien"><?php echo formatMoney($price_sum); ?></td>
                    </tr>
                    <?php }}?>
                    <tr class="odd">
                        <td class="right" colspan="4">Phí vận chuyển</td>
                        <td class="right">+<?php echo formatMoney(getVat($team['id'],$order['district_id'])); ?></td>
                    </tr>
                    <tr class="even">
                        <td class="right" colspan="4">Tổng giá trị đơn hàng</td>
                        <td style="font-size: 100%;" class="right bold"><?php echo formatMoney(getVat($team['id'],$order['district_id'])+$price_sum); ?></td>
                    </tr>
                    
                    <tr class="odd">
                        <td class="right bold" colspan="4">Thanh toán bằng tiền tích lũy</td>
                        <td class="right boldOrange"><?php echo formatMoney($one['paymoney']); ?></td>
                    </tr>
                    <tr class="even">
                        <td class="right bold" colspan="4">Thanh toán bằng tiền mặt</td>
                        <td style="font-size: 120%;color:red;" class="right bold"><?php echo formatMoney($one['fare']+$one['total_price']-$one['paymoney']); ?></td>
                    </tr>
                    
                </tbody>
            </table>
			<table width="100%" class="orderdetail-table" style="line-height:22px;">
        <tbody>
            <tr class="forum_title_tr"><th colspan="2" width="50%"><b>Thông tin người nhận</b></th><th colspan="2">Thông tin đơn hàng</th></tr>
            <tr>
            	<td width="15%"><b>Họ tên</b></td><td><?php echo $order['fullname']; ?></td>
                <td width="20%"><b>Mã đơn hàng</b></td><td><?php echo $order['order_code']; ?></td>
            </tr>
            <tr class="alt">
            	<td width="15%"><b>Địa chỉ</b></td>
                <td><?php echo $order['address'].', '.get_name_local($order['district_id']).', '.get_name_local($order['province_id']); ?></td>
                <td width="20%"><b>Ngày đặt</b></td><td><?php echo date('d/m/Y H:i',$order['create_time']); ?></td>
            </tr>
            <tr>
            	<td width="15%"><b>Điện thoại</b></td><td><strong><?php echo $order['mobile']; ?></strong></td>
                <td width="20%"><b>Tình trạng</b></td><td><strong><?php echo $tracking[$team_order['track']]; ?></strong></td>
           	</tr>
            <tr class="alt">
            	<td width="15%"><b>Lời nhắn</b></td><td><strong><?php echo $order['remark']; ?></strong></td>
                <td width="20%"><b>Thanh toán</b></td><td><strong><?php echo $paystate[$order['state']]; ?></strong></td>
         	</tr>
        </tbody>
    </table>			
        </div>
        <div class="clear">
        </div>
		<?php include template("block_print_order");?>
    </div>
</div>
