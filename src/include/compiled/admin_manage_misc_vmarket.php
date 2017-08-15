<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_misc('vmarket'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>Quản lý tin đăng</h2>
                    <ul class="filter">
                        <li>
                        <form method="get">
                            Tiêu đề<input type="text" name="vtitle" value="<?php echo htmlspecialchars($vtitle); ?>" class="h-input"/>
                            email<input type="text" name="vemail" class="h-input" value="<?php echo htmlspecialchars($vemail); ?>" >
                            <select style="width:100px;" name="vtype" class="h-input">
                                <?php echo Utility::Option($vmarket_type,'','Loại tin đăng'); ?>
                            </select>
                            <select style="width:100px;" name="state" class="h-input">
                                <?php echo Utility::Option($vmarket_state,'','Trạng thái'); ?>
                            </select>
                            <input type="submit" value="Tìm" class="formbutton"  style="padding:1px 6px;"/>
                        </form>
                        </li>
                    </ul>
                </div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr class="forum_title_tr">
                        <th width="20">ID</th>
                        <th width="150">Tiêu đề</th>
                        <th width="230">Nội dung</th>
                        <th width="130">Người dùng</th>
                        <th width="40" nowrap>Loại tin</th>
                        <th width="80" nowrap>Ngày đăng</th>
                        <th width="20" nowrap>Đ.xem</th>
                        <th width="30" nowrap>B.Luận</th>
                        <th width="50" nowrap>Thao tác</th>
                  	</tr>
					<?php if(is_array($vms)){foreach($vms AS $index=>$one) { ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="order-list-id-<?php echo $one['id']; ?>">
						<td><?php echo $one['id']; ?></td>
						<td><?php echo $one['title']; ?></td>
						<td><?php echo $one['content']; ?></td>
						<td><a href="/ajax/manage.php?action=userview&id=<?php echo $one['user_id']; ?>" class="ajaxlink"><?php echo $users[$one['user_id']]['realname']; ?><br/><?php echo $users[$one['user_id']]['mobile']; ?></a></td>
						<td><?php echo $vmarket_type[$one['vtype']]; ?></td>
						<td style="text-align:center">
                        	Lúc <?php echo date('H:i:s', $one['create_time']); ?><br />
                            <?php echo date('d-m-Y', $one['create_time']); ?>
                      	</td>
						<td><?php echo $one['view']; ?></td>
                        <td><?php echo $one['comment']; ?></td>
						<td class="op" nowrap style="text-align:center">
                        <?php if($one['state']=='pending'){?>
                        <a href="/ajax/xuly.php?action=xacnhan_vmarket&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Bạn có chắc đã xác nhận tin rao này không?">Xác nhận</a>
                        <a href="/ajax/xuly.php?action=huy_vmarket&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Bạn có chắc hủy tin rao này hay không?">Hủy</a>
                        <?php } else if($one['state']=='confirmed') { ?>
                        Đã xác nhận
                        <?php } else { ?>
                        Đã hủy
                        <?php }?>
                        </td>
					</tr>
					<?php }}?>
					<tr><td colspan="10"><?php echo $pagestring; ?></tr>
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
