<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_order($cur_here); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                <h2>Đơn hàng hôm nay</h2>
                    <ul class="filter">
                        <li>
                        <form method="get">
                            Mã đơn hàng<input type="text" name="order_code" class="h-input number" value="<?php echo htmlspecialchars($order_code); ?>" />
                            Email<input type="text" name="email" class="h-input" value="<?php echo htmlspecialchars($email); ?>" />
                            SĐT<input type="text" name="mobile" class="h-input number" value="<?php echo htmlspecialchars($mobile); ?>" />
                            <input type="submit" value="Tìm" class="formbutton"  style="padding:1px 6px;"/>
                        </form>
                        </li>
                    </ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr class="forum_title_tr">
                        <th width="40">ID</th>
                        <th>Mã đ.hàng</th>
                        <th width="270">Địa chỉ</th>
                        <th width="200">Khách hàng</th>
                        <th width="40" nowrap>SL</th>
                        <th width="50" nowrap>Thành tiền</th>
                        <!--<th width="50" nowrap>Chưa trả</th>-->
                        <th width="50" nowrap>Phí giao hàng</th>
                        <th width="50" nowrap>Phương thức</th>
                        <th width="50" nowrap>Tình trạng & Thao tác</th>
                  	</tr>
					<?php if(is_array($orders)){foreach($orders AS $index=>$one) { ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="order-list-id-<?php echo $one['id']; ?>">
						<td><?php echo $one['id']; ?></td>
						<td><a href="/ajax/manage.php?action=orderdetail&id=<?php echo $one['id']; ?>" class="ajaxlink"><?php echo $one['order_code']; ?></a></td>
						<td><?php echo $one['address'].', '.get_name_local($one['district_id']).', '.get_name_local($one['province_id']); ?></td>
						<td><a href="/ajax/manage.php?action=userview&id=<?php echo $one['user_id']; ?>" class="ajaxlink"><?php echo $users[$one['user_id']]['realname']; ?><br/><?php echo $users[$one['user_id']]['mobile']; ?></a></td>
						<td><?php echo $one['quantity']; ?></td>
						<td><?php echo formatMoney($one['total_price']); ?><?php echo $currency; ?></td>
						<!--<td><?php echo formatMoney($one['credit']); ?><?php echo $currency; ?></td>-->
						<td><?php echo formatMoney($one['fare']); ?><?php echo $currency; ?></td>
						<td><img src="/include/template/<?php echo $INI['skin']['template']; ?>/css/images/<?php echo get_img_method($one['method_id']); ?>" width="45" title="<?php echo get_name_method($one['method_id']); ?>" /></td>
						<td class="op" nowrap style="text-align:center">
                        <?php if($one['order_state']=='pending'){?>
                        <a href="/ajax/xuly.php?action=xacnhan&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Bạn có chắc đã xác nhận đơn hàng này không?">Xác nhận</a> <a href="/ajax/xuly.php?action=huy&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Bạn có chắc hủy đơn hàng này không?">Hủy</a>
                        <?php } else if($one['order_state']=='confirmed') { ?>
                            <?php if($one['state']=='unpay'){?>
                            <a href="/ajax/xuly.php?action=thanhtoan&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Bạn có chắc đơn hàng này đã thanh toán hay không?">Thanh toán</a>
                            <?php }?>
                            <?php if($one['ship_state']=='N'){?>
                            <a href="/ajax/xuly.php?action=giaohang&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Bạn có chắc đơn hàng này đã giao hàng rồi hay không?">Giao hàng</a>
                            <?php }?>
                        <?php } else if($one['order_state']=='success') { ?>
                        <font style="color:red">Thành công</font>
                        <?php } else { ?>
                        <font style="color:red">Đã hủy</font>
                        <?php }?>
                        </td>
					</tr>
					<?php }}?>
					<tr><td colspan="10"><?php echo $pagestring; ?></tr>
                    </table>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("manage_footer");?>
