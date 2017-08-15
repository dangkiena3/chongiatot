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
        <a href="/trang-ca-nhan/don-hang-cua-toi.html" itemprop="url">
            <span itemprop="title">Đơn hàng của tôi</span>
        </a>
    </span>
</p>
	</div></div>
	<div class="nhmain">
    <div class="personal-nav">
        <div class="nav-bar-bg">
        </div>
        <div class="personal-bar">
            <ul><?php echo current_account2(); ?></ul>
        </div>
    </div>

    <div class="personal-content Orders">
            <div class="table-content">
                <table width="100%" cellspacing="0" cellpadding="0" class="lstable">
                    <thead>
                    	<tr>
                            <th width="4%">STT</th>
                            <th width="4%">Mã ĐH</th>
                            <th width="15%">Tên SP</th>
                            <th width="2%">SL</th>
                            <th width="5%">Đơn giá</th>
                            <th width="5%">Phí</th>
                            <th width="5%">Tổng cộng</th>
                            <th width="4%">Ngày mua</th>
                            <th width="9%">Tình trạng</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                    	<?php if(is_array($orderss)){foreach($orderss AS $order=>$one) { ?>
						<?php 
							$team = Table::Fetch('team',$one['team_id']);
							$orders = Table::Fetch('order',$one['order_id']);
						; ?>
                        <?php if($order%2==0){?>
                        <tr class="even">
                        <?php } else { ?>
                        <tr class="odd">
                        <?php }?>
                            <td class="center"><?php echo ++$order; ?></td>
                            <td><?php echo $orders['order_code']; ?></td>
							<td><?php echo $team['product']; ?></td>
							<td><?php echo $one['quantity']; ?></td> 
							<td><?php echo formatMoney($team['team_price']); ?></td> 
							<td><?php echo formatMoney(getVat($orders['team_id'],$orders['district_id'])); ?></td> 
							<td><?php echo formatMoney(($team['team_price']*$one['quantity']) + getVat($orders['team_id'],$orders['district_id'])); ?></td> 
                            <td><?php echo date('d/m/Y H:i:s', $orders['create_time']); ?></td>
                            <td><b style="color:<?php echo $one['track']==4?'red':'blue'; ?>"><?php echo $tracking[$one['track']]; ?></b>
							<br/>
							<a title="Chi tiết đơn hàng" orderid="<?php echo $one['id']; ?>" class="btnViewDetail" href="javascript:void(0)">» Chi tiết</a>
							<?php if(!$one['track']){?><br/>
							<a title="Chỉnh đơn hàng" orderid="<?php echo $one['id']; ?>" class="btnEditOrder" href="javascript:void(0)">» Sửa ĐH</a>
							<br/>
							<a title="Hủy đơn hàng" value="<?php echo $one['id']; ?>" class="btnHuy" name="btnHuy_<?php echo $one['id']; ?>" href="javascript:;" onclick="CancelMyOrder(<?php echo $one['id']; ?>);">» Hủy</a>
							
							<?php include template("block_popup_order_edit");?>
							<?php }?>
							<?php include template("block_popup_order_detail");?>    
							</td>                            
                        </tr>
                        <?php }}?>
                    </tbody>
                </table>
            </div>
            <div class="clear"></div>
			<?php echo $pagestring; ?>
			<div class="proBody_footer">
					<p class="txt_ip title">Chú thích:</p>
					<p class="txt_ip"><i class="txt_tle">-</i> <em class="non_ye">Chưa xác nhận: </em>Đã đặt hàng online nhưng chưa nhận được điện thoại xác nhận từ <?php echo $tenngan; ?>.</p>
					<p class="txt_ip"><i class="txt_tle">-</i> <em class="wait_gr">Đang chờ giao: </em>Đặt hàng và đã được xác nhận từ <?php echo $tenngan; ?>. Đang có kế hoạch giao hàng.</p>
					<p class="txt_ip"><i class="txt_tle">-</i> <em class="going_blue">Đang trên đường: </em>Đã có kế hoạch giao hàng, <?php echo $tenngan; ?> đang trên đường giao.</p>
					<p class="txt_ip"><i class="txt_tle">-</i> <em class="finish_black">Hoàn tất: </em>Đã giao cho khách hàng.</p>
					<p class="txt_ip"><i class="txt_tle">-</i> <em class="del_red">Đã hủy: </em>Khách hàng đã hủy đơn hàng.</p>
					</div>
            <div class="clear"></div>
        </div></div>
    <div class="clear"></div>
	<div class="nhbot"></div>
</div>