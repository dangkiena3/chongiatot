<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:380px;">
	<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">Đóng</span>Cấp quyền quản trị cho <?php echo $user['email']; ?></h3>
	<div style="overflow-x:hidden;padding:10px;">
	<form method="POST" id="form_authorization_id">
	<input type="hidden" name="action" value="authorization" />
	<input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
	<table width="96%" class="coupons-table">
		<tr><td width="160"><input type="checkbox" name="auth[]" value="team" <?php echo in_array('team', $INI['authorization'][$user['id']])?'checked':''; ?>/>&nbsp;<b>Quản trị deal</b></td><td width="174">(Thêm và sửa deal)</td></tr>
		<tr><td><input type="checkbox" name="auth[]" value="help" <?php echo in_array('help', $INI['authorization'][$user['id']])?'checked':''; ?>/>&nbsp;<b>Quản trị dịch vụ KH</b></td><td>Hỏi đáp, webpage, giao diện và thông báo</td></tr>
		<tr><td><input type="checkbox" name="auth[]" value="order" <?php echo in_array('order', $INI['authorization'][$user['id']])?'checked':''; ?>/>&nbsp;<b>Orders Manager</b></td><td>(Quản lý đơn hàng, hoàn tiền, vận chuyển,...)</tr>
		<tr><td><input type="checkbox" name="auth[]" value="market" <?php echo in_array('market', $INI['authorization'][$user['id']])?'checked':''; ?>/>&nbsp;<b>Quản trị quảng bá</b></td><td>(Email & SMS marketing, download dữ liệu）</td></tr>
		<tr><td><input type="checkbox" name="auth[]" value="admin" <?php echo in_array('admin', $INI['authorization'][$user['id']])?'checked':''; ?>/>&nbsp;<b>Quản trị hệ thống</b></td><td>(Khách hàng, chuyên muc, tài chính,...)</tr>
		<tr><td colspan="2"><input type="submit" class="formbutton" value="Cấp quyền" /></td></tr>
	</table>
	</form>
	</div>
</div>