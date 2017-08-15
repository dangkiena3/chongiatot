<div class="cart_login">
    <div style="cursor:pointer;" class="cart_title">
        <h1 style="cursor:pointer;" class="c_title_text">đăng nhập</h1>
		<div class="form-subtitle">Bạn đã có tài khoản tại <?php echo $tenngan; ?>, vui lòng đăng nhập để tiến hành mua hàng</div>
    </div>
    <div class="info_box">       
        <div class="info_box_content_nh">
            <div class="login_user" style="width:340px">
                <span class="email_lg email_pass_t" style="width:70px">Email:</span> <span class="email_input">
                    <input type="text" name="tbxEmail" id="tbxEmail" placeholder="Vui lòng nhập email">
                </span><span class="error_email"></span>
            </div>
            <div class="login_pass">
                <span class="pass_lg email_pass_t">Mật khẩu:</span>
                <span class="pass_input"><input type="password" name="tbxPass" id="tbxPass" placeholder="Vui lòng nhập mật khẩu"></span> <span class="error_pass"></span>
            </div>
            <div class="login_control">
            	<span class="loss_password">
				<a href="/quen-mat-khau.html">Quên mật khẩu</a>				
				</span> 
				<span class="loss_password mt10">
				<input type="checkbox" name="cbPop_Remember" id="cbPop_Remember"> Lưu lại mật khẩu
				</span>
                <span class="loginbtn"><a class="btnv5 login" href="Javascript:"></a></span>
            </div>
        </div>
		<div class="buyNow"><a href="/ThanhToan"></a></div>
    </div>
    <!-- end div.info_box -->
</div>
