<div class="register-popup">
    <div class="mem-register form">
        <div class="form-header">
                            <h1 class="form-title">LÀ THÀNH VIÊN MỚI?</h1>
                            <span class="form-subtitle">Đăng ký tạo tài khoản <?php echo $tenngan; ?> để mua hàng dễ dàng</span>
                        </div>
        <input id="RegisterPoint" value="" type="hidden">
        <div class="register-message" style="text-indent: 30px;">Đăng ký thành công </div>
        <iframe id="ifpost" name="ifpost" class="hide" src=""></iframe>
        <form id="RegisterForm" name="RegisterForm" method="post" action="/dang-ky/">
        <div class="info_box">
            <div class="register-content">
                <div class="reg-note">
                    <span style="float: left; margin-left: 4px; margin-top: 5px; color: red; font-size: 12px;">
                        * Vui lòng điền đầy đủ thông tin bên dưới.
                    </span>
                </div>
				<div class="formReg">
                <div class="basic_info">
                    <div class="regist_item">
                        <span class="regist_title">Họ và tên:<span class="cart_rg_requie">*</span></span><span class="regist_input"><input id="tbxFullName1" name="FullName_s" type="text" placeholder="Vui lòng nhập họ tên"></span></div>
                    <div class="regist_item">
                        <span class="regist_title">Email:<span class="cart_rg_requie">*</span></span><span class="regist_input"><input id="tbxEmailRegist1" name="Email_s" type="text" placeholder="Vui lòng nhập email"></span></div>
                    <div class="regist_item">
                        <span class="regist_title">Mật khẩu:<span class="cart_rg_requie">*</span></span><span class="regist_input"><input id="tbxPassRegist1" name="Password_s" type="password" placeholder="Vui lòng nhập mật khẩu"></span></div>
                    <div class="regist_item">
                        <span class="regist_title">Xác nhận:<span class="cart_rg_requie">*</span></span><span class="regist_input"><input id="tbxRePassRegist1" name="RePassword_s" type="password" placeholder="Vui lòng xác nhận mật khẩu"></span></div>
                    <div class="regist_item">
                        <span class="regist_title">Giới tính:<span class="cart_rg_requie">*</span></span>
                        <span class="regist_input">
                            <select class="birth_ddl" id="ddlRegistSex1" name="Gender_b" style="width: 100px;">
                                <option selected="selected" value="3">Chọn</option>
                                <option value="M">Nam</option>
                                <option value="F">Nữ</option>
                            </select>
                        </span>
                    </div>
                    <div class="regist_item">
                        <span class="regist_title">Ngày sinh:<span class="cart_rg_requie">*</span></span>
                        <span class="regist_input">
                            <select class="birth_ddl" id="ddlRegistBirthday1" name="ddlRegistBirthday" style="">
                            	<?php echo Utility::Option($option_days,'','Ngày'); ?>
                            </select>
                            <select class="birth_ddl" id="ddlRegistBirthMonth1" name="ddlRegistBirthMonth" style="margin-left: 5px;">
                            	<?php echo Utility::Option($option_months,'','Tháng'); ?>
                            </select>
                            <select class="birth_ddl" id="ddlRegistBirthYear1" name="ddlRegistBirthYear" style="margin-left: 5px;">
                            	<?php echo Utility::Option($option_years,'','Năm'); ?>
                            </select>
                        </span>
                    </div>
                </div>
                <div class="basic_info">
                    <div class="regist_item">
                        <span class="regist_title">Tỉnh thành:<span class="cart_rg_requie">*</span></span>
                        <span class="regist_input">
                            <select id="Province1" name="Province" style="width: 205px;">
                            	<?php echo Utility::Option($option_provinces,'','Chọn Thành Phố'); ?>
                            </select>
                        </span>
                    </div>
                    <div class="regist_item">
                        <span class="regist_title">Quận huyện:<span class="cart_rg_requie">*</span></span>
                        <span class="regist_input">
                            <select id="District1" name="DistrictID_s" style="width: 205px;">
                            	<option value="0">Chọn Quận Huyện</option>
                            </select>
                        </span>
                    </div>
					<div class="regist_item">
                        <span class="regist_title">Phường Xã:<span class="cart_rg_requie">*</span></span>
                        <span class="regist_input">
                            <select id="Ward1" name="WardID_s" style="width: 205px;">
                            	<option value="0">Chọn Phường Xã</option>
                            </select>
                        </span>
                    </div>
                    <div class="regist_item">
                        <span class="regist_title">Địa chỉ:<span class="cart_rg_requie">*</span></span>
                        <span class="regist_input"><input id="tbxAddress1" name="Address_s" type="text" placeholder="Vui lòng nhập địa chỉ"></span>
                    </div>
                    <div class="regist_item">
                        <span class="regist_title">Điện thoại:<span class="cart_rg_requie">*</span></span>
                        <span class="regist_input">
                            <input id="tbxPhone1" name="Mobile_s" onkeypress="blockNotNumber(event)" maxlength="15" type="text" placeholder="Vui lòng nhập số điện thoại">
                        </span>
                    </div>
                </div>
				
                </div>
				<div class="regist_control" style="position:relative">
                    	<span class="reg_loading" style="display: none; position:absolute; top:25px; left:200px">
                            <img alt="" src="/img/loading.gif">
                        </span>
                        <span class="regist_btn1" style="margin-top: 20px;"><a href="javascript:void(0)" class="btnv5 register"></a></span>
		        </div><div class="clear"></div>
				<span style="color:red;font-style:italic;font-size:13px">* Thông tin bắt buộc</span>
                <div class="clear"></div>
            </div>
            <!-- end div.register-content -->
            <div class="clear"></div>
        </div>
        <!-- end div.info_box -->
        <div class="clear"></div>
        </form>
        <div class="clear"></div>
    </div>
</div>
