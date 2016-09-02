<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:380px;">
	<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">Đóng</span>Thông tin khách hàng và nạp tiền</h3>
	<div style="overflow-x:hidden;padding:10px;">
	<table width="96%" class="coupons-table">
		<tr><td width="120"><b>Email:</b></td><td><?php echo $user['email']; ?></td></tr>
		<tr><td><b>Tên người dùng</b></td><td><?php echo $user['username']; ?></td></tr>
		<tr><td><b>Họ tên</b></td><td><?php echo $user['realname']; ?></td></tr>
		<tr><td><b>Số điện thoại:</b></td><td><?php echo $user['mobile']; ?></td></tr>
		<tr>
		  <td><b>Địa chỉ:</b></td><td><?php echo $user['address'].', '.get_name_local($user['ward_id']).','.get_name_local($user['district_id']).', '.get_name_local($user['province_id']); ?></td></tr>
		<tr>
		  <td><b>IP đăng ký:</b></td><td><?php echo $user['ip']; ?></td></tr>
		<tr><td colspan="2"><hr /></td></tr>
		<tr>
		  <td><b>Số dư tài khoản:</b></td><td><b><?php echo formatMoney($user['money']); ?>&nbsp;<?php echo $currency; ?></b></td></tr>
		<tr>
		  <td><b>Số điểm:</b></td>
		  <td><b><?php echo formatMoney($user['score']); ?></b> điểm</td></tr>
		<tr>
		<td><b>Thống kê mua:</b></td>
		<td>Tổng cộng đã mua <b><?php echo formatMoney($user['costcount']); ?></b> lần, đã tích luỹ <b><?php echo formatMoney($user['cost']); ?>&nbsp;<?php echo $currency; ?></b></td></tr>
		<tr><td colspan="2"><hr /></td></tr>
		<tr><td><b>Nạp tiền tài khoản:</b></td><td><input type="text" name="in" id="user-dialog-input-id" value="0" size="6" maxLength="6" require="true" datatype="number" class="number" uid="<?php echo $user['id']; ?>" ask="Bạn có chắc là nạp tiền cho khách hàng này không?" />&nbsp;&nbsp;<input type="submit" value="Nạp ngay" onclick="return X.manage.usermoney();"/></td></tr>
	</table>
	</div>
</div>
