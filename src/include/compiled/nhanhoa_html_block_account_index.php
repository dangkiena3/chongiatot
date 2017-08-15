<div class="personal_page"><div class="nhtop">
<div class="current-path wd">
	<p>
    <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
        <a href="<?php echo $INI['system']['wwwprefix']; ?>" itemprop="url">
            <span itemprop="title"><?php echo $INI['system']['abbreviation']; ?></span>
        </a>
    </span>
    &nbsp;&gt;&nbsp;
    <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
        <a href="/trang-ca-nhan/thong-tin-cua-toi.html" itemprop="url">
            <span itemprop="title">Thông tin của tôi</span>
        </a>
    </span>
</p>
	</div></div>
	<div class="nhmain">
    <div class="personal-nav">
        <div class="nav-bar-bg">
        </div>
        <div class="personal-bar">
            <ul><?php echo current_account2(); ?></ul>
        </div>
    </div>

    <div class="customer_box">
        <div class="change_pass_box">
            <div class="changepass_title">
                <span class="changepass_title_text">Đổi mật khẩu</span>
            </div>
            <div class="clear"></div>
            <form method="post" name="frmChangePass" id="frmChangePass">
                <input type="hidden" value="" id="hdCustomerEmail" name="hdCustomerEmail">
                <div class="changepass_content">
                    <div class="changepass_item">
                        <span class="item_l">Mật khẩu cũ:</span>
                        <span class="item_r"><input type="password" name="tbxOldPass" id="tbxOldPass"></span>
                    </div>
                    <div class="changepass_item">
                        <span class="item_l">Mật khẩu mới:</span>
                        <span class="item_r"><input type="password" name="tbxNewPass" id="tbxNewPass"></span>
                    </div>
                    <div class="changepass_item">
                        <span class="item_l">Xác nhận mật khẩu:</span>
                        <span class="item_r"><input type="password" name="tbxReNewPass" id="tbxReNewPass"></span>
                    </div>
                        
                    <div class="changepass_btn">
                        <span class="item_l">&nbsp;</span>
                        <span class="item_r_changepass"><a href="javascript:"  class="btnv5 btn_save"></a></span>
                        <span class="waiting_updatepass"><img src="/img/loading.gif" alt=""></span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </form>
        </div>
        <div class="update_profile_box">
            <div class="changepass_title">
                <span class="changepass_title_text">Thông tin cá nhân</span>
            </div>
            <div class="clear"></div>
            <form method="post" id="frmUpdateProfile" name="frmUpdateProfile">
            
            <div class="update_profile_content">
                <div class="update_item">
                    <span class="update_item_l">Họ tên:</span> <span class="update_item_r">
                        <input type="text" value="<?php echo $login_user['realname']; ?>" name="tbxFullName" id="tbxFullName"></span>                
                </div>
                <div class="update_item">
                    <span class="update_item_l">Giới tính:</span> <span class="update_item_r">
                    	<?php if($login_user['gender']=='M'){?>
                        <input type="radio" checked="checked" style="width: 20px;float: left; cursor: pointer;" value="M" name="rdGender" id="rdMale">
                        <label style="float: left;line-height: 32px; height:32px; cursor: pointer;" for="rdMale">Nam</label>
                        <input type="radio" style="width: 20px; float: left; cursor: pointer; margin-left: 10px;" value="F" name="rdGender" id="rdFeMale">
                        <label style="float: left;line-height: 32px;height:32px; cursor: pointer;" for="rdFemale">Nữ</label>
                        <?php } else { ?>
                        <input type="radio" style="width: 20px;float: left; cursor: pointer;" value="M" name="rdGender" id="rdMale">
                        <label style="float: left;line-height: 32px;height:32px; cursor: pointer;" for="rdMale">Nam</label>
                        <input type="radio" checked="checked" style="width: 20px; float: left; cursor: pointer; margin-left: 10px;" value="F" name="rdGender" id="rdFeMale">
                        <label style="float: left;line-height: 32px; height:32px;cursor: pointer;" for="rdFemale">Nữ</label>
                        <?php }?>
                    </span>
                </div>
				<div class="update_item">
                    <span class="update_item_l">Tỉnh TP:</span> <span class="update_item_r">
                        <select style="width: 255px; float: left;" id="Province">
                        	<?php echo Utility::Option($provinces, $login_user['province_id'], 'Chọn thành phố'); ?>
                		</select>
                        <input type="hidden" value="<?php echo $login_user['province_id']; ?>" name="hdProvinceSelected" id="hdProvinceSelected">
                    </span>
				</div>
                <div class="update_item">
                    <span class="update_item_l">Ngày sinh:</span> <span class="update_item_r">
                        <select style="width: 70px;" id="ddlDay"><?php echo Utility::Option($option_days,  date('d',$login_user['birthday'])); ?></select>
                        <input type="hidden" value="" name="tbxDay" id="tbxDay">
                        <span style="float: left; line-height: 32px; margin: 0px 10px;">- </span>
                        <select style="width: 70px;" id="ddlMonth"><?php echo Utility::Option($option_months,  date('m',$login_user['birthday'])); ?></select>
                        <input type="hidden" value="" name="tbxMonth" id="tbxMonth">
                        <span style="float: left; line-height: 32px; margin: 0px 10px;">- </span>
                        <select style="width: 70px;" id="ddlYear"><?php echo Utility::Option($option_years, date('Y',$login_user['birthday'])); ?></select>
                        <input type="hidden" value="" name="tbxYear" id="tbxYear">
                    </span>
                </div>
                	
				<div class="update_item">	
                    <span class="update_item_l">Quận huyện:</span> <span class="update_item_r">
                        <select style="width: 255px; float: left;" id="District">
                        	<?php echo Utility::Option($districts, $login_user['district_id'],'-chọn Quận Huyện-'); ?>
                        </select>
                        <input type="hidden" value="<?php echo $login_user['district_id']; ?>" name="hdDistrictSelected" id="hdDistrictSelected">
                    </span>
                </div>
				
                
                <div class="update_item">
                    <span class="update_item_l">Điện thoại:</span> <span class="update_item_r">
                        <input type="text" value="<?php echo $login_user['mobile']; ?>" name="tbxMobile" id="tbxMobile"></span>
                </div>
				
				<div class="update_item">	
                    <span class="update_item_l">Phường xã:</span> <span class="update_item_r">
                        <select style="width: 255px; float: left;" id="Ward">
                        	<?php echo Utility::Option($ward2s, $login_user['ward_id'],'-chọn Phường Xã-'); ?>
                        </select>
                        <input type="hidden" value="<?php echo $login_user['ward_id']; ?>" name="hdWardSelected" id="hdWardSelected">
                    </span>
                </div>
				<div class="update_item">
                    <span class="update_item_l">Số nhà, đường</span> <span class="update_item_r">
                        <input type="text" value="<?php echo $login_user['address']; ?>" name="tbxAddress" id="tbxAddress"></span>
                </div>
                <div class="update_item_btn">
                    <span class="item_l">&nbsp;</span> <span class="item_r_update"><a href="javascript:" class="btnv5 btn_save"></a></span>
                    <span style="display:none;" class="waiting_updateprofile">
                    	<img src="/img/loading.gif" alt="">
                  	</span>
                </div>
                <div class="clear"></div>
            </div>
            </form>
            <div class="clear"></div>
        </div>
        <div style="margin-top:20px;" class="change_pass_box">
            <div class="changepass_title">
                <span class="changepass_title_text">Cập nhật hình đại diện</span>
            </div>
            <div class="clear"></div>
            <form target="hiddenUpload" enctype="multipart/form-data" action="/jquery/update_avatar.php" method="post" name="frmChangeAvata" id="frmChangeAvata">
                <div class="changepass_content">
                    <div class="up_erro_msg"></div>
                    <div class="y_img">Hình của bạn</div>
                    <div class="line_img1">
                        <div class="curr_img">
                            <span class="c_img">
                                <?php if($login_user['avatar']){?>
                                <img style="width:64px;height:64px;" title="<?php echo $users['name']; ?>" src="/static/<?php echo $login_user['avatar']; ?>" alt="Ảnh cá nhân của <?php echo $login_user['name']; ?>">
                                <?php } else { ?>
                                <img style="width:64px;height:64px;" title="<?php echo $users['name']; ?>" src="/static/user/default/no_avatar.png" alt="Ảnh cá nhân của <?php echo $login_user['name']; ?>">
                                <?php }?>
                            </span>
                            <span class="del_img">
                                <a href="">Xóa ảnh</a>
                            </span>
                            <span class="change_img_waitting">
                                <img src="/img/loading.gif" alt="">
                            </span>
                        </div>
                        <div class="creat_newimg">
                            <div class="ct_new_title">Chọn một ảnh khác từ máy tính của bạn (tối đa 500KB, định dạng *.jpg,png,gif, 60px - 60px)</div>
                            <div class="upload_new">
                                <span class="file_sl"><input type="file" class="ava_file" size="35" name="fileAvata" id="fileAvata"></span>
                                <span class="btn_upl">
                                    <img src="<?php echo $template_path; ?>/upload-button04.png" alt="Cập nhật ảnh mới - <?php echo $tenngan; ?>" id="btnUploadAvata">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="line_img2">
                        <div class="ct_title2_cc">Chọn hình đại diện mặc định</div>
                        <div class="ls_img_ava">
                          	<?php if(is_array($option_avatars)){foreach($option_avatars AS $index=>$avatar) { ?>
                            <div class="ava_df_img">
                                <span class="a_i"><label for="rdAvataChoice<?php echo $index; ?>"><img src="/static/user/default/<?php echo $index; ?>.jpg" alt=""></label></span>
                                <span class="a_ch"><input type="radio" value="<?php echo $index; ?>.jpg" id="rdAvataChoice<?php echo $index; ?>" name="rdAvataChoice"></span>
                            </div>
                            <?php }}?>
                        </div>
                    </div>
                    <div class="update_item_btn">
                        <span class="item_l">&nbsp;</span> <span class="item_ava_update"><a href="javascript:"  class="btnv5 btn_save"></a></span>
                        <span class="waiting_updateprofile" style="display:none;">
                        	<img alt="" src="/img/loading.gif">
                       	</span>
                    </div>
                </div>
                <div class="clear"></div>
            </form>
            <iframe class="hide_upl" name="hiddenUpload" id="hiddenUpload"></iframe>
        
        </div>
    </div></div>
<div class="nhbot"></div>
</div>