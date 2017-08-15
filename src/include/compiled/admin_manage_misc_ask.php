<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_misc('ask'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>Bình luận</h2>
                    <ul class="filter">
						<li><form action="/manage/misc/ask.php" method="get">Deal:<input type="text" class="h-input" name="title" value="<?php echo htmlspecialchars($title); ?>" >&nbsp;<select name="type"><?php echo Utility::Option($option_ask, $type, 'chuyên mục'); ?></select>&nbsp;<input type="submit" value="Tìm" class="formbutton"  style="padding:1px 6px;"/><form></li>
					</ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="253">Sản phẩm</th>
					<th width="206">Khách hàng</th>
					<th width="500">Nội dung</th>
					<th width="101">Thao tác</th></tr>
					<?php if(is_array($asks)){foreach($asks AS $index=>$one) { ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
						<td><a class="deal-title" href="/team.php?id=<?php echo $one['team_id']; ?>"><?php echo $teams[$one['team_id']]['product']; ?></a></td>
						<td nowrap><?php echo $users[$one['user_id']]['username']; ?></td>
						<td><b><?php echo $one['type']=='ask'?'<font color="red">Q</font>':'<font color="blue">A</font>'; ?>:</b><?php echo htmlspecialchars($one['content']); ?></td>
						<td class="op" nowrap>
						<a href="/manage/misc/askedit.php?id=<?php echo $one['id']; ?>&r=<?php echo $currefer; ?>">Trả lời</a> | <a href="/manage/misc/askremove.php?id=<?php echo $one['id']; ?>&r=<?php echo $currefer; ?>" class="remove-record">Xoá</a>
						<br/>
						<a href="/ajax/topic.php?action=topichead&id=<?php echo $one['id']; ?>" class="ajaxlink"><?php echo $one['display']=='Y'?'Đang hiển thị':'Đang ẩn'; ?></a>
						</td>
					</tr>
					<?php }}?>
					<tr><td colspan="4"><?php echo $pagestring; ?></tr>
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
