<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_category($zone); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2><?php echo $cates[$local]; ?></h2>
					<ul class="filter">
						<li><a href="/ajax/manage.php?action=categoryedit&zone=<?php echo $zone; ?>" class="ajaxlink">Thêm <?php echo $cates[$zone]; ?></a></li>
					</ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="72">ID</th><th width="154">Tên chuyên mục</th><th width="158">Tên không dấu</th><th width="185">Ký tự đầu</th><th width="103">Nhóm</th><th width="103" nowrap>Hiển thị</th><th width="114" nowrap>Sắp xếp</th><th width="120">Thao tác</th></tr>
					<?php if(is_array($categories)){foreach($categories AS $index=>$one) { ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?>>
						<td><?php echo $one['id']; ?></td>
						<td><?php echo $one['name']; ?></td>
						<td><?php echo $one['ename']; ?></td>
						<td><?php echo strtoupper($one['letter']); ?></td>
						<td><?php echo $one['czone']; ?></td>
						<td><?php echo $one['display']; ?></td>
						<td><?php echo intval($one['sort_order']); ?></td>
						<td class="op"><a href="/ajax/manage.php?action=categoryedit&id=<?php echo $one['id']; ?>" class="ajaxlink">Sửa</a> | <a href="/ajax/manage.php?action=categoryremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="sure to delete this category？">xoá</a></td>
					</tr>
					<?php }}?>
					<tr><td colspan="8"><?php echo $pagestring; ?></td></tr>
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
