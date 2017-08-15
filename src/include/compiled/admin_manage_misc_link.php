<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_misc('link'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
<div class="head">
                    <h2>Liên kết bạn bè</h2>
                    <ul class="filter">
                    	<li><a href="/ajax/misc.php?action=link" class="ajaxlink">Thêm liên kết</a></li>
                    </ul>
			  </div>
                <div class="sect">
					<table border="0" cellpadding="0" cellspacing="0" class="coupons-table" id="orders-list">
					<tr>
						<th width="40" nowrap>ID</th>
						<th width="200" nowrap>Tên website</th>
						<th width="220" nowrap>Địa chỉ trang</th>
						<th width="200" nowrap>LOGO</th>
						<th width="60" nowrap>Sắp xếp</th>
						<th width="80" nowrap>Hiển thị</th>
						<th width="100" nowrap>Thao tác</th>
					</tr>
				<?php if(is_array($links)){foreach($links AS $index=>$one) { ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?>>
						<td><?php echo $one["id"]; ?></td>
						<td><?php echo $one["title"]; ?></td>
						<td><?php echo $one["url"]; ?></td>
						<td><?php echo $one["logo"]; ?></td>
						<td><?php echo $one["sort_order"]; ?></td>
						<td><?php echo $one["display"]; ?></td>
						<td align="center"><a href="/ajax/misc.php?action=linkremove&id=<?php echo $one['id']; ?>" ask="Bạn có chắc là muốn xoá liên kết này không?" class="ajaxlink">Xoá</a> | <a href="/ajax/misc.php?action=link&id=<?php echo $one['id']; ?>" class="ajaxlink">sửa</a></td>
					  </tr>
				<?php }}?>
					<tr><td colspan="7"><?php echo $pagestring; ?></td></tr>
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
