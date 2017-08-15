<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_order($current); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                	<h2><?php echo $titleorder; ?>: <span style="color:red"><?php echo $count; ?></span></h2>
                    <ul class="filter">
                        <li>
                        <form method="get">
							ID ĐH<input type="text" name="order_id" class="h-input number" style="width:50px" value="<?php echo htmlspecialchars($order_id); ?>" />
							--
                            Mã ĐH<input type="text" name="order_code" class="h-input number" style="width:50px" value="<?php echo htmlspecialchars($order_code); ?>" />
							--
							ID Sản phẩm<input type="text" name="team_id" class="h-input number" style="width:50px" value="<?php echo htmlspecialchars($team_id); ?>" />
							--
                            Email<input type="text" name="email" class="h-input" style="width:120px" value="<?php echo htmlspecialchars($email); ?>" />
							--
                            SĐT<input type="text" name="mobile" class="h-input number" style="width:90px" value="<?php echo htmlspecialchars($mobile); ?>" />
                            
		                    <input type="submit" value="Tìm" class="formbutton"  style="padding:1px 6px;"/>
                        </form>
                        </li>
                    </ul>
               	</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr class="forum_title_tr">
                        <th width="40">ID</th>
                        <th>Mã ĐH</th>
                        <th width="150">Tên sản phẩm</th>
						<th width="150">Khách hàng</th>
                        <th width="200">Địa chỉ</th>
                        
                        <th width="20" nowrap>SL</th>
                        <th width="40" nowrap>Đơn giá</th>
                        <th width="50" nowrap>T.Tiền</th>      
                        <th width="50" nowrap>Tình trạng</th>
                  	</tr>
					<?php if(is_array($team_orders)){foreach($team_orders AS $index=>$one) { ?>
                    <?php 
                    	$team = Table::Fetch('team', $one['team_id']);
                        $order = Table::Fetch('order', $one['order_id']);
                        $users = Table::Fetch('user', $order['user_id']);
                        $quantity = $one['quantity'];
                        $price = $team['team_price'];
                        $total = $quantity*$price;
                    ; ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="order-list-id-<?php echo $one['id']; ?>">
						<td><?php echo $one['id']; ?>
						<?php if(!$one['track']){?>
						<a href="/ajax/manage.php?action=editOrder&id=<?php echo $one['id']; ?>" class="ajaxlink"><img src="/img/edit.png" alt="Chỉnh sửa"></a>
						<?php }?>
						</td>
						<td><a href="/ajax/manage.php?action=orderview&id=<?php echo $one['id']; ?>" class="ajaxlink"><?php echo $order['order_code']; ?></a></td>
                        <td><?php echo $team['product']; ?></td>
						<?php if($order['user_id']){?>
						<td><a href="/ajax/manage.php?action=userview&id=<?php echo $order['user_id']; ?>" class="ajaxlink"><?php echo $users['realname']; ?><br/><?php echo $users['mobile']; ?></a></td>
						<?php } else { ?>
						<td><?php echo $order['fullname']; ?><br/><?php echo $order['mobile']; ?>	
						</td>
						<?php }?>
						<td><?php echo $order['address'].', '.get_name_local($order['district_id']).', '.get_name_local($order['province_id']); ?></td>
						<td><?php echo $quantity; ?></td>
						<td><?php echo formatMoney($price); ?><?php echo $currency; ?></td>
						<td><?php echo formatMoney($total); ?><?php echo $currency; ?></td>				
						<td class="op" nowrap style="text-align:center">
                        <select name="cate" ONCHANGE="window.location='./<?php echo $current; ?>.php?act=tracking&idd=<?php echo $one['id']; ?>&value='+this.options[this.selectedIndex].value"><?php echo Utility::Option($tracking, $one['track']); ?> </select>
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
