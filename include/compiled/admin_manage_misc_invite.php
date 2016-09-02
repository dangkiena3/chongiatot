<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_misc('invite'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
				<?php if('index'==$s){?>
                    <h2>Lời mời đang chờ xác nhận (tổng tiền: <?php echo $summary; ?> <span class="currency"><?php echo $currency; ?></span>)</h2>
				<?php } else if('record'==$s) { ?>
                    <h2>Lời mời đã xác nhận (tổng tiền: <?php echo $summary; ?> <span class="currency"><?php echo $currency; ?></span>)</h2>
				<?php } else { ?>
                    <h2>Lời mời lỗi</h2>
				<?php }?>
					<ul class="filter"><?php echo mcurrent_misc_invite($s); ?></ul>
				</div>
				<div class="sect" style="padding:0 10px;">
					<form method="get">
						<input type="hidden" name="s" value="<?php echo $s; ?>" />
						<p style="margin:5px 0;">Người mời:<input type="text" name="iuser" value="<?php echo htmlspecialchars($iuser); ?>" class="h-input" />&nbsp;Người được mời:<input type="text" name="puser" value="<?php echo htmlspecialchars($puser); ?>" class="h-input" />&nbsp;TG mời:<input type="text" class="h-input" onFocus="WdatePicker({isShowClear:false,readOnly:true})" name="iday" value="<?php echo $iday; ?>" />&nbsp;TG thanh toán<input type="text" class="h-input" onFocus="WdatePicker({isShowClear:false,readOnly:true})" name="pday" value="<?php echo $pday; ?>" />&nbsp;<input type="submit" value="Tìm" class="formbutton"  style="padding:1px 6px;"/></p>
					<form>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="350">Deal</th><th width="150">Người mời</th><th width="150">Người được mời</th><th width="140">Thời gian mời/thanh toán</th><?php if('index'==$s){?><th width="150">Thao tác</th><?php } else { ?><th width="150">Người thực hiện</th><?php }?></tr>
					<?php if(is_array($invites)){foreach($invites AS $index=>$one) { ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="order-list-id-<?php echo $one['id']; ?>">
						<td><a class="deal-title" href="/team.php?id=<?php echo $one['team_id']; ?>" target="_blank"><?php echo $teams[$one['team_id']]['product']; ?></a></td>
						<td nowrap><a class="ajaxlink" href="/ajax/manage.php?action=userview&id=<?php echo $one['user_id']; ?>"><?php echo $users[$one['user_id']]['email']; ?></a><br/><?php echo $users[$one['user_id']]['username']; ?><br/><?php echo $one['user_ip']; ?><?php if(Utility::IsMobile($users[$one['user_id']]['mobile'])){?><br/><a href="/ajax/misc.php?action=sms&v=<?php echo $users[$one['user_id']]['mobile']; ?>" class="ajaxlink"><?php echo $users[$one['user_id']]['mobile']; ?></a><?php }?></td>
						<td nowrap><a class="ajaxlink" href="/ajax/manage.php?action=userview&id=<?php echo $one['other_user_id']; ?>"><?php echo $users[$one['other_user_id']]['email']; ?></a><br/><?php echo $users[$one['other_user_id']]['username']; ?><br/><?php echo $one['other_user_ip']; ?><?php if(Utility::IsMobile($users[$one['user_id']]['mobile'])){?><br/><a href="/ajax/misc.php?action=sms&v=<?php echo $users[$one['other_user_id']]['mobile']; ?>" class="ajaxlink"><?php echo $users[$one['other_user_id']]['mobile']; ?></a><?php }?></td>
						<td nowrap><?php echo date('Y-m-d H:i', $one['create_time']); ?><br/><?php echo date('Y-m-d H:i', $one['buy_time']); ?><br/>rebate：<?php echo $currency; ?><?php echo $one['credit']; ?></td>
						<td class="op" nowrap><?php if('index'==$s){?><a href="/ajax/manage.php?action=inviteok&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="are you sure you've got the rebate ?">confirm</a>｜<a href="/ajax/manage.php?action=inviteremove&id=<?php echo $one['id']; ?>" ask="sure to give up the rebate you're going to get?" class="ajaxlink">give up</a><?php } else { ?><?php echo $users[$one['admin_id']]['email']; ?><br/><?php echo $users[$one['admin_id']]['username']; ?><?php }?></td>
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
