<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="user">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_user(null); ?><li class="current"><a href="/manage/user/edit.php?id=<?php echo $user['id']; ?>">Sửa thông tin KH</a><span></span></li></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Sửa thông tin khách hàng</h2><b style="margin-left:20px;font-size:16px;">（<?php echo $user['email']; ?>/<?php echo $user['username']; ?>）</b></div>
                <div class="sect">
                    <form id="login-user-form" method="post" action="/manage/user/edit.php?id=<?php echo $user['id']; ?>">
					<input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
						<div class="wholetip clear">
						  <h3>1.&nbsp;Thông tin tài khoản</h3></div>
                        <div class="field">
                            <label>Email người dùng</label>
                            <input type="text" size="30" name="email" id="user-edit-email" class="f-input" value="<?php echo $user['email']; ?>" readonly />
						</div>
						<div class="field">
                            <label>Tên người dùng</label>
                            <input type="text" size="30" name="username" id="user-edit-username" class="f-input" value="<?php echo $user['username']; ?>" />
                        </div>
						<div class="field">
                            <label>Họ tên</label>
                            <input type="text" size="30" name="realname" id="user-edit-realname" class="f-input" value="<?php echo $user['realname']; ?>" />
                        </div>
						<div class="field">
                            <label>Yahoo mesenger</label>
                            <input type="text" size="30" name="ym" id="user-edit-ym" class="f-input" value="<?php echo $user['ym']; ?>" />
                        </div>
                        
                        <div class="field password">
                            <label>Mật mã</label>
                            <input type="text" size="30" name="password" id="settings-password" class="f-input" />
                            <span class="hint">If you're not going to change your password, keep it blank</span>
                        </div>
						<div class="wholetip clear"><h3>2.&nbsp;Thông tin cơ bản</h3></div>
                        
                        <div class="field">
                            <label>Địa chỉ</label>
                            <input type="text" size="30" name="address" id="user-edit-address" class="f-input" value="<?php echo $user['address']; ?>"/>
						</div>
                        <div class="field">
                            <label>Số điện thoại</label>
                            <input type="text" size="30" name="mobile" id="user-edit-mobile" class="number" value="<?php echo $user['mobile']; ?>" maxLength="11" />
						</div>
						<div class="wholetip clear">
						  <h3>3.&nbsp;Thông tin thêm</h3></div>
                        <div class="field">
                            <label>Email xác nhận</label>
                            <input type="text" size="30" name="secret" id="user-edit-secret" class="f-input" value="<?php echo $user['secret']; ?>"/>
                            <span class="hint">Nếu đã xác nhận thì ô này trống</span>
                        </div>
						<?php if($login_user_id==1&&$user['id']>1){?>
                        <div class="field">
                            <label>Quản lý</label>
                            <input type="text" size="30" name="manager" id="user-edit-manager" class="number" value="<?php echo $user['manager']; ?>" maxLength="1" require="true" datatype="require" style="text-transform:uppercase;" /><span class="inputtip">Y:yes N:no</span>
						</div>
						<?php }?>
                        <div class="act">
                            <input type="submit" value="Thay đổi" name="commit" id="user-submit" class="formbutton"/>
                        </div>
                    </form>
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
