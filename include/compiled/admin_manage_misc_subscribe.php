<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_misc('subscribe'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>Danh sách đăng ký nhận email</h2>
					<ul class="filter">
						<li><form action="/manage/misc/subscribe.php" method="get">
                        <!--Thành phố:<input type="text" name="cs" value="<?php echo htmlspecialchars($cs); ?>" class="h-input" />-->&nbsp;Email:<input type="text" name="like" value="<?php echo htmlspecialchars($like); ?>" class="h-input" />&nbsp;<input type="submit" value="Tìm" class="formbutton"  style="padding:1px 6px;"/><form></li>
					</ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th>STT</th><th width="250">Địa chỉ email</th><th width="250">Thời gian đăng ký</th><th width="300">Mật mã</th><th width="80">Thao tác</th></tr>
					<?php if(is_array($subscribes)){foreach($subscribes AS $index=>$one) { ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
                    	<td><?php echo $count-$index; ?></td>
						<td nowrap><?php echo $one['email']; ?></td>
                        <td><?php echo Utility::HumanTime($one['create_time']); ?></td>
						<td nowrap><?php echo $one['secret']; ?></td>
						<td style="text-align:center" class="op" nowrap><a ask="Bạn có muốn xoá không?" href="/ajax/manage.php?action=subscriberemove&id=<?php echo $one['id']; ?>" class="ajaxlink">Xoá</a></td>
					</tr>
					<?php }}?>
					<tr><td colspan="6"><?php echo $pagestring; ?></tr>
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
