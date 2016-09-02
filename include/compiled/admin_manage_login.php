<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="manage">
    <div id="content" class="manage">
        <div class="box">
            <div class="box-top"></div>
            <div class="box-content">
                                <div class="head"><h2>Đăng nhập quản trị</h2></div>
                <div class="sect">
                    <form id="manage-user-form" method="post" action="/manage/login.php" class="validator">
                        <div class="field">
                            <label for="manage-login">Tên đăng nhập</label>
                            <input type="text" size="30" name="username" id="manage-username" class="f-input" datatype="require" require="true" />
                        </div>
                        <div class="field">
                            <label for="manage-password">Mật khẩu</label>
                            <input type="password" size="30" name="password" id="manage-password" class="f-input" datatype="require" require="true" />
                        </div>
                        <div class="act">
                            <input type="submit" value="Đăng nhập" name="commit" id="login-submit" class="formbutton"/>
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
