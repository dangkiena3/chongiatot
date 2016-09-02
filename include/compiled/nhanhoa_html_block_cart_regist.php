<div style="display:inline;" class="cart_regist">
    <div style="cursor:pointer;" class="cart_title">
        <h1 class="c_title_text">đăng ký thành viên mới</h1>
		<div class="form-subtitle">Nếu bạn lần đầu tiên mua hàng tại <?php echo $tenngan; ?>, vui lòng đăng ký tài khoản để tiến hành mua hàng</div>
    </div>
    <div style="display: none;" class="info_box">
        <div class="info_box_top">
            <img src="<?php echo $template_path; ?>/order_box_top.png" alt=""></div>
        <div class="info_box_content">
            <div class="regist_note">
                <span style="float: left; margin-left: 4px; margin-top: 5px; color: #22272C; font-size: 12px;">
                    * Vui lòng điền đầy đủ thông tin bên dưới.</span></div>
            <div class="basic_info">
                <div class="regist_item">
                    <span class="regist_title">Họ và tên:<span class="cart_rg_requie">*</span></span><span class="regist_input"><input type="text" name="tbxFullName" id="tbxFullName" placeholder="Vui lòng nhập họ tên"></span></div>
                <div class="regist_item">
                    <span class="regist_title">Email:<span class="cart_rg_requie">*</span></span>
                    <span class="regist_input"><input type="text" name="tbxEmailRegist" id="tbxEmailRegist" placeholder="Vui lòng nhập email"></span>
               	</div>
                <div class="regist_item">
                    <span class="regist_title">Mật khẩu:<span class="cart_rg_requie">*</span></span>
                    <span class="regist_input"><input type="password" name="tbxPassRegist" id="tbxPassRegist" placeholder="Vui lòng nhập mật khẩu"></span>
             	</div>
                <div class="regist_item">
                    <span class="regist_title">Xác nhận:<span class="cart_rg_requie">*</span></span>
                    <span class="regist_input"><input type="password" name="tbxRePassRegist" id="tbxRePassRegist" placeholder="Vui lòng xác nhận mật khẩu"></span>
               	</div>
                <div class="regist_item">
                    <span class="regist_title">Giới tính:<span class="cart_rg_requie">*</span></span>
                    <span class="regist_input">
                        <select style="width: 100px;" name="ddlRegistSex" id="ddlRegistSex" class="">
                            <option value="N">Chọn</option>
                            <option value="M">Nam</option>
                            <option value="F">Nữ</option>
                        </select>
                    </span>
                </div>
                <div class="regist_item">
                    <span class="regist_title">Ngày sinh:<span class="cart_rg_requie">*</span></span>
                    <span class="regist_input">
                        <select name="ddlRegistBirthday" id="ddlRegistBirthday" class="birth_ddl">
                            <?php echo Utility::Option($option_days,'','Ngày'); ?>
                        </select>
                        <select style="margin-left: 5px;" name="ddlRegistBirthMonth" id="ddlRegistBirthMonth" class="birth_ddl">
                            <?php echo Utility::Option($option_months,'','Tháng'); ?>
                        </select>
                        <select style="margin-left: 5px;" name="ddlRegistBirthYear" id="ddlRegistBirthYear" class="birth_ddl">
                            <?php echo Utility::Option($option_years,'','Năm'); ?>
                        </select>
                    </span>
                </div>
            </div>
            <div class="basic_info">
                <div class="regist_item">
                    <span class="regist_title">Tỉnh thành:<span class="cart_rg_requie">*</span></span>
                    <span class="regist_input">
                        <select style="width: 205px;" name="Province" id="Province">
                            <?php echo Utility::Option($option_provinces,'','Chọn Tỉnh Thành'); ?>
                        </select>
                    </span>
                </div>
                <div class="regist_item">
                    <span class="regist_title">Quận huyện:<span class="cart_rg_requie">*</span></span>
                    <span class="regist_input">
                        <select style="width: 205px;" name="District" id="District">
                        	<option selected="selected" value="0">Chọn Quận Huyện</option>
                        </select>
                    </span>
                </div>
				<div class="regist_item">
                    <span class="regist_title">Phường xã:<span class="cart_rg_requie">*</span></span>
                    <span class="regist_input">
                        <select style="width: 205px;" name="Ward" id="Ward">
                        	<option selected="selected" value="0">Chọn Phường Xã</option>
                        </select>
                    </span>
                </div>
                <div class="regist_item">
                    <span class="regist_title">Địa chỉ:<span class="cart_rg_requie">*</span></span>
                    <span class="regist_input"><input type="text" name="tbxAddress" id="tbxAddress" placeholder="Vui lòng nhập địa chỉ"></span>
                </div>
                <div class="regist_item">
                    <span class="regist_title">Điện thoại:<span class="cart_rg_requie">*</span></span>
                    <span class="regist_input">
                        <input type="text" maxlength="15" onkeypress="blockNotNumber(event)" name="tbxPhone" id="tbxPhone" placeholder="Vui lòng nhập số điện thoại">
                    </span>
                </div>
                <div class="regist_control" style="position:relative">
                    <span class="reg_loading" style="display: none; position:absolute; top:15px; left:100px">
                        <img alt="" src="/img/loading.gif">
                    </span>
                    <span style="margin-top: 5px;" class="regist_btn"><a class="btnv5 register" href="Javascript:"></a></span>
                </div>
            </div>
        </div>
        <!-- end div.info_box_content -->
        <div class="info_box_bottom"><img src="<?php echo $template_path; ?>/order_box_bottom.png" alt=""></div>
    </div>
    <!-- end div.info_box -->
</div>
