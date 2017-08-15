<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_team($selector); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
				
                    <h2>Sản phẩm</h2>: <span style="color:red; font-size:18px; font-weight:bold"><?php echo $count; ?></span>
                    <ul class="filter">
                        <li>
                        <form method="get">
							ID: <input type="text" name="id" class="h-input" value="<?php echo htmlspecialchars($id); ?>" >&nbsp;&nbsp;
                            Tên sản phẩm: <input type="text" name="ptitle" class="h-input" value="<?php echo htmlspecialchars($ptitle); ?>" >&nbsp;&nbsp;
							<select style="width:160px;" name="active" class="h-input">
							<option value="">Tất cả</option>
							<option value="0">Hiển thị</option>
							<option value="1">Đang ẩn</option>
							</select>
							<input type="submit" value="Tìm" class="formbutton"  style="padding:1px 6px;"/>
                        </form>
                        </li>
                    </ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="20">ID</th><th width="350">Tên deal</th><th width="70">Xem</th>
					<th width="80" nowrap>Chuyên mục</th><th width="100">Hiển thị</th>
					<th width="50">L.Mua</th><th width="60" nowrap>Giá</th><th width="140">Thao tác</th></tr>
					<?php if(is_array($teams)){foreach($teams AS $index=>$one) { ?>
					<?php $oldstate = $one['state']; ?>
					<?php $one['state'] = team_state($one); ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
						<td><?php echo $one['id']; ?></a></td>
						<td  style="text-align:left;">						
							<a class="deal-title" href="<?php echo rewrite_team_id($one['id']); ?>" target="_blank" title="<?php echo $one['title']; ?>"><?php echo $one['product']; ?></a>
						</td>
                        <td nowrap><?php echo $one['view']; ?></td>
						<td nowrap>                        	
                            <strong><?php echo get_name_cate($one['group_ppid']); ?></strong>
                            <?php if($one['group_ppid']!=$one['group_pid']){?>
							<br />--<?php echo get_name_cate($one['group_pid']); ?>
                            <?php }?>
                        </td>
						<td nowrap><a href="/ajax/manage.php?action=teamactive&p=<?php echo $one['active']?'0':'1'; ?>&id=<?php echo $one['id']; ?>" class="ajaxlink"><img src="/img/<?php echo $one['active']?'un':''; ?>check.png"></a></td>
						<td nowrap><?php echo $one['now_number']; ?></td>
						<td nowrap><?php echo formatMoney($one['team_price']); ?><?php echo $currency; ?><br/><span style="text-decoration:line-through"><?php echo formatMoney($one['market_price']); ?><?php echo $currency; ?></span></td>
						<td class="op" nowrap>						
						<a href="/manage/team/edit.php?id=<?php echo $one['id']; ?>">Sửa</a> | 
						<a href="/ajax/manage.php?action=teamremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Bạn có chắc xoá deal này không?" >Xoá</a></td>
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
