<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_user('index'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>Danh sách khách hàng</h2>
				</div>
				<div class="tool_s">
					<form action="/manage/user/index.php" method="get">
						<p>Tên người dùng:<input type="text" name="uname" class="h-input" value="<?php echo htmlspecialchars($uname); ?>" >
						Email:<input type="text" name="like" class="h-input" value="<?php echo htmlspecialchars($like); ?>" >
						Số điện thoại:<input type="text" name="mobile" class="h-input" value="<?php echo htmlspecialchars($mobile); ?>" >
						<!--&nbsp;<select name="ucity" style="width:120px;"><?php echo Utility::Option(option_category('city'), $ucity, 'Tất cả thành phố'); ?></select>-->
						<input type="submit" value="Tìm" class="formbutton"  style="padding:1px 6px;"/></p>
					<form>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="20">ID</th><th width="160">Email/Tên người dùng</th><th width="130" nowrap>Địa chỉ</th><th width="80">Số dư TK</th><th width="40">Nick Yahoo</th><th width="120">IP/tg đăng ký</th></th><th width="100">Số điện thoại</th><th width="120">Thao tác</th></tr>
					<?php if(is_array($users)){foreach($users AS $index=>$one) { ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
						<td><?php echo $one['id']; ?></td>
						<td><?php echo $one['email']; ?><br/><?php echo $one['username']; ?><?php if(Utility::IsMobile($one['mobile'])){?>&nbsp;&raquo;&nbsp;<a href="/ajax/misc.php?action=sms&v=<?php echo $one['mobile']; ?>" class="ajaxlink">SMS</a><?php }?></td>
						<td><?php echo $one['address'].', '.get_name_local($one['district_id']).', '.get_name_local($one['province_id']); ?></td>
						<td><?php echo formatMoney($one['money']); ?> <?php echo $currency; ?></td>
						<td ><?php echo mb_strimwidth($one['ym'],0,15,'..'); ?></td>
						<td><?php echo $one['ip']; ?><br/><?php echo date('H:i, d-m-Y', $one['create_time']); ?></td>
						<td><?php echo $one['realname']?$one['realname']:'----';; ?><br /><?php echo $one['mobile']; ?></td>
						<td class="op"><a href="/ajax/manage.php?action=userview&id=<?php echo $one['id']; ?>" class="ajaxlink">Chi tiết</a> | <a href="/manage/user/edit.php?id=<?php echo $one['id']; ?>">sửa</a></td>
					</tr>
					<?php }}?>
					<tr><td colspan="8"><?php echo $pagestring; ?></tr>
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
