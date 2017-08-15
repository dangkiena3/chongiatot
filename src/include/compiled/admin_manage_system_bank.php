<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('bank'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Cấu hình ngân hàng</h2></div>
                <div class="sect">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="validator">
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
						<div class="wholetip clear"><h3>Thông tin ngân hàng</h3></div>
  	                    <div class="field">
                            <label>Code</label>
                            <input type="text" size="30" name="code" value="<?php echo $getbank['first_element']; ?>" require="true" datatype="require" maxLength="3" class="f-input" style="width:100px;" />
                            <span class="inputtip"><font color="red">Ví dụ: VIB</font></span>
                        </div>  
                        <div class="field">
                            <label>Tên viết tắc</label>
                            <input type="text" size="30" name="shortname" value="<?php echo $getbank['bankname_short']; ?>" require="true" datatype="require" maxLength="20" class="f-input" style="width:300px;" />
                            <span class="inputtip"><font color="red">Ví dụ: VIBank</font></span>
                        </div>
                        <div class="field">
                            <label>Tên đầy đủ</label>
                            <input type="text" size="30" name="longname" value="<?php echo $getbank['bankname_long']; ?>" require="true" datatype="require" maxLength="100" class="f-input" style=width:300px;" />
                             <span class="inputtip"><font color="red">Ví dụ: NGÂN HÀNG TMCP ẬP KHẨU VIỆT NAM</font></span>
                        </div>
                        <div class="field">
                            <label>Logo</label>
                            <input type="file" size="30" name="upload_logo" id="bank-logo-upload" class="f-input" />
                            <?php if (!empty($getbank['logo'])); ?> <?php echo $getbank['logo']; ?>
                        </div>                        
                        <div class="wholetip clear"><h3>Thông tin tài khoản</h3></div>
                        <div class="field">
                            <label>Tên tài khoản</label>
                             <input type="text" size="30" name="accname" value="<?php echo $getbank['bankacc']; ?>" require="true" datatype="require" maxLength="100" class="f-input" style="width:300px;" />
                       </div>
                        <div class="field">
                            <label>Số tài khoản</label>
                             <input type="text" size="30" name="accnumber" value="<?php echo $getbank['bankcode']; ?>" require="true" datatype="require" maxLength="20" class="f-input" style="width:300px;" />
                       </div>
                        <div class="act">
                            <input type="submit" value="Thêm mới" name="createnew" class="formbutton"/>
                            <input type="submit" value="Sửa" name="edit" class="formbutton"/>
                            <input type="reset" value="Xoá" id="clear" name="clear" class="formbutton"/>
                        </div>
                    </form>
                    <table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr class="forum_title_tr"><th width="40">ID</th><th>Logo</th><th width="50">Code</th><th width="80" nowrap>Tên viết tắc</th><th width="200">Tên đầy đủ</th><th width="200">Tên tài khoản</th><th width="140">Số tài khoản</th><th>action</th></tr>
					<?php if(is_array($banks)){foreach($banks AS $bank=>$one) { ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
						<td><?php echo $one['id']; ?></td>
						<td><img src="../../static/<?php echo $one['image']; ?>"></td>
						<td><?php echo $one['first_element']; ?></td>
						<td><?php echo $one['bankname_short']; ?></td>
						<td><?php echo $one['bankname_long']; ?></td>
						<td><?php echo $one['bankacc']; ?></td>
						<td><?php echo $one['bankcode']; ?></td>
					<td class="op" nowrap><a href="/manage/system/bank.php?action=edit&id=<?php echo $one['id']; ?>">Sửa</a> | <a href="/ajax/manage.php?action=bankremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Bạn có chắc muốn xóa thông tin ngân hàng này?">Xoá</a></td>
					</tr>
					<?php }}?>
					<tr><td colspan="8"><?php echo $pagestring; ?></tr>						
                    </table>
                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
	</div>
<div id="sidebar">
</div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->
<?php include template("manage_footer");?>