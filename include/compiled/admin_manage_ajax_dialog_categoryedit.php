<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:380px;">
	<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">Đóng</span><?php echo $category?'Sửa':'Thêm mới'; ?> <?php echo $zone[1]; ?></h3>
	<div style="overflow-x:hidden;padding:10px;">
	<p>Tên, Tên không dấu là những mục yêu cầu</p>
<form method="post" action="/manage/category/edit.php" class="validator">
	<input type="hidden" name="id" value="<?php echo $category['id']; ?>" />
	<input type="hidden" name="zone" value="<?php echo $zone[0]; ?>" />
	<table width="96%" class="coupons-table">
		<tr><td width="80" nowrap><b>Tên chuyên mục</b></td><td><input type="text" name="name" value="<?php echo $category['name']; ?>" require="true" datatype="require" class="f-input" /></td></tr>
		<tr><td nowrap><b>Tên không dấu</b></td><td><input type="text" name="ename" value="<?php echo $category['ename']; ?>" require="true" datatype="english" class="f-input" style="text-transform:lowercase;" /></td></tr>
		<tr><td nowrap><b>Ký tự đầu</b></td><td><input type="text" name="letter" value="<?php echo $category['letter']; ?>" maxLength="1" require="true" datatype="english" class="f-input" style="text-transform:uppercase;" /></td></tr>
		<tr><td nowrap><b>Chuyên mục</b></td><td><input type="text" name="czone" value="<?php echo $category['czone']; ?>" class="f-input" /></td></tr>
		<tr><td nowrap><b>Hiển thị (Y/N)：</b></td><td><input type="text" name="display" value="<?php echo $category['display']; ?>" class="f-input" style="text-transform:uppercase;"/></td></tr>
		<tr><td nowrap><b>Sắp xếp (giảm dần):</b></td><td><input type="text" name="sort_order" value="<?php echo intval($category['sort_order']); ?>" class="f-input" /></td></tr>
		<tr><td colspan="2" height="10">&nbsp;</td></tr>
		<tr><td></td><td><input type="submit" value="Đồng ý" class="formbutton" /></td></tr>
	</table>
</form>
	</div>
</div>
