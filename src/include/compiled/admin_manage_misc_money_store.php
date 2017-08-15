<?php include template("manage_header");?>
<?php $action=($s=='store')?'Top-line ':' Users withdraw cash';; ?>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="money">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_misc('money'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>Nạp tiền ngoại tuyến (tổng tiền: <?php echo abs($summary); ?> <span class="currency"><?php echo $currency; ?></span>)</h2>
                    <ul class="filter">
						<li class="label"> </li>
						<?php echo mcurrent_misc_money($s); ?>
					</ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<tr><th width="200">Email/username</th><th width="100">Hành động</th><th width="160">Tổng</th><th width="200">Thao tác</th><th width="200">Thời gian</th></tr>
					<?php if(is_array($flows)){foreach($flows AS $index=>$one) { ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?>>
							<td nowrap><?php echo $users[$one['user_id']]['email']; ?><br/><?php echo $users[$one['user_id']]['username']; ?></td>
							<td nowrap><?php echo $action; ?></td>
							<td nowrap><span class="money"><?php echo $currency; ?></span><?php echo moneyit(abs($one['money'])); ?></td>
							<td nowrap><?php echo $users[$one['admin_id']]['email']; ?><br/><?php echo $users[$one['admin_id']]['username']; ?></td>
							<td nowrap><?php echo date('Y-m-d H:i', $one['create_time']); ?></td>
						</tr>
					<?php }}?>
						<tr><td colspan="5"><?php echo $pagestring; ?></td></tr>
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
