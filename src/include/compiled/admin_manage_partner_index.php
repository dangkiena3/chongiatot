<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_partner('index'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>Đối tác kinh doanh</h2>
					<ul class="filter"><li><form method="get">Tên đối tác:<input type="text" name="ptitle" class="h-input" value="<?php echo htmlspecialchars($ptitle); ?>" >&nbsp;<select name="open" class="h-input"><?php echo Utility::Option($option_open, $open, 'xin chọn'); ?></select>&nbsp;<select name="city_id" class="h-input"><?php echo Utility::Option(option_category('city'), $city_id, 'Tất cả thành phố'); ?></select>&nbsp;<select name="group_id" class="h-input"><?php echo Utility::Option(option_category('partner'), $group_id, 'Tất cả c.mục'); ?></select>&nbsp;<input type="submit" value="select" class="formbutton"  style="padding:1px 6px;"/><form></li></ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="40">ID</th><th width="290">Tên đối tác</th><th width="90">Chuyên mục</th><th width="120">Người liên hệ</th><th width="130">Điện thoại/di động</th><th width="60">Hiển thị</th><th width="40">S.Xếp</th><th width="100">Thao tác</th></tr>
					<?php if(is_array($partners)){foreach($partners AS $index=>$one) { ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
						<td><?php echo $one['id']; ?></td>
						<td style="text-align:left;"><a class="deal-title" href="/manage/partner/edit.php?id=<?php echo $one['id']; ?>"><?php echo $one['title']; ?></a></td>
						<td nowrap><?php echo $groups[$one['group_id']]; ?><br/><?php echo $cities[$one['city_id']]; ?></td>
						<td nowrap><?php echo $one['contact']; ?></td>
						<td nowrap><?php echo $one['phone']; ?><br/><?php echo $one['mobile']; ?></td>
						<td nowrap><?php echo $one['open']; ?></td>
						<td nowrap><?php echo $one['head']; ?></td>
						<td class="op" nowrap><a href="/manage/partner/edit.php?id=<?php echo $one['id']; ?>">Sửa</a> | <a href="/ajax/manage.php?action=partnerremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Bạn có chắc muốn xoá đối tác này không?">xoá</a></td>
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
