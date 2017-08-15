<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('option'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Cài đặt tuỳ chọn</h2></div>
                <div class="sect">
                    <form method="post">
						<div class="wholetip clear"><h3>1. Tuỳ chọn danh mục</h3></div>
						<div class="field">
                            <label>Danh mục 1</label>
							<select name="option[cate_name1]" class="f-input" style="width:150px;">
                            	<?php echo Utility::Option($cate, $INI['option']['cate_name1'],'Tắt'); ?>
                           	</select>
                            <label>Số lượng sản phẩm</label>
                            <input type="text" size="3" name="option[cate_quantity1]" class="number" value="<?php echo $INI['option']['cate_quantity1']; ?>" style="width:140px"/>
                        </div>
						<div class="field">
                            <label>Danh mục 2</label>
							<select name="option[cate_name2]" class="f-input" style="width:150px;">
                            	<?php echo Utility::Option($cate, $INI['option']['cate_name2'],'Tắt'); ?>
                           	</select>
                            <label>Số lượng sản phẩm</label>
                            <input type="text" size="3" name="option[cate_quantity2]" class="number" value="<?php echo $INI['option']['cate_quantity2']; ?>" style="width:140px"/>
                        </div>
						<div class="field">
                            <label>Danh mục 3</label>
							<select name="option[cate_name3]" class="f-input" style="width:150px;">
                            	<?php echo Utility::Option($cate, $INI['option']['cate_name3'],'Tắt'); ?>
                           	</select>
                            <label>Số lượng sản phẩm</label>
                            <input type="text" size="3" name="option[cate_quantity3]" class="number" value="<?php echo $INI['option']['cate_quantity3']; ?>" style="width:140px"/>
                        </div>
						<div class="field">
                            <label>Danh mục 4</label>
							<select name="option[cate_name4]" class="f-input" style="width:150px;">
                            	<?php echo Utility::Option($cate, $INI['option']['cate_name4'],'Tắt'); ?>
                           	</select>
                            <label>Số lượng sản phẩm</label>
                            <input type="text" size="3" name="option[cate_quantity4]" class="number" value="<?php echo $INI['option']['cate_quantity4']; ?>" style="width:140px"/>
                        </div>
						<div class="field">
                            <label>Danh mục 5</label>
							<select name="option[cate_name5]" class="f-input" style="width:150px;">
                            	<?php echo Utility::Option($cate, $INI['option']['cate_name5'],'Tắt'); ?>
                           	</select>
                            <label>Số lượng sản phẩm</label>
                            <input type="text" size="3" name="option[cate_quantity5]" class="number" value="<?php echo $INI['option']['cate_quantity5']; ?>" style="width:140px"/>
                        </div>
						<div class="field">
                            <label>Danh mục 6</label>
							<select name="option[cate_name6]" class="f-input" style="width:150px;">
                            	<?php echo Utility::Option($cate, $INI['option']['cate_name6'],'Tắt'); ?>
                           	</select>
                            <label>Số lượng sản phẩm</label>
                            <input type="text" size="3" name="option[cate_quantity6]" class="number" value="<?php echo $INI['option']['cate_quantity6']; ?>" style="width:140px"/>
                        </div>
						<div class="field">
                            <label>Danh mục 7</label>
							<select name="option[cate_name7]" class="f-input" style="width:150px;">
                            	<?php echo Utility::Option($cate, $INI['option']['cate_name7'],'Tắt'); ?>
                           	</select>
                            <label>Số lượng sản phẩm</label>
                            <input type="text" size="3" name="option[cate_quantity7]" class="number" value="<?php echo $INI['option']['cate_quantity7']; ?>" style="width:140px"/>
                        </div>
						<div class="field">
                            <label>Danh mục 8</label>
							<select name="option[cate_name8]" class="f-input" style="width:150px;">
                            	<?php echo Utility::Option($cate, $INI['option']['cate_name8'],'Tắt'); ?>
                           	</select>
                            <label>Số lượng sản phẩm</label>
                            <input type="text" size="3" name="option[cate_quantity8]" class="number" value="<?php echo $INI['option']['cate_quantity8']; ?>" style="width:140px"/>
                        </div>
						<div class="field">
                            <label>Danh mục 9</label>
							<select name="option[cate_name9]" class="f-input" style="width:150px;">
                            	<?php echo Utility::Option($cate, $INI['option']['cate_name9'],'Tắt'); ?>
                           	</select>
                            <label>Số lượng sản phẩm</label>
                            <input type="text" size="3" name="option[cate_quantity9]" class="number" value="<?php echo $INI['option']['cate_quantity9']; ?>" style="width:140px"/>
                        </div>
						<div class="field">
                            <label>Danh mục 10</label>
							<select name="option[cate_name10]" class="f-input" style="width:150px;">
                            	<?php echo Utility::Option($cate, $INI['option']['cate_name10'],'Tắt'); ?>
                           	</select>
                            <label>Số lượng sản phẩm</label>
                            <input type="text" size="3" name="option[cate_quantity10]" class="number" value="<?php echo $INI['option']['cate_quantity10']; ?>" style="width:140px"/>
                        </div><!--
						<div class="wholetip clear"><h3>2. Top menu</h3></div>
						<div class="field">
                            <label>C.mục thông báo</label>
							<select class="f-input" style="width:150px" name="option[notify_cate]"><?php echo Utility::Option($cate_notify, $INI['option']['notify_cate'],'Tắt'); ?></select>
                        </div>
						<div class="field">
                            <label>C.mục tin tức</label>
							<select class="f-input" style="width:150px" name="option[news_cate]"><?php echo Utility::Option($cate_notify, $INI['option']['news_cate'],'Tắt'); ?></select>
                        </div>
						<div class="field">
                            <label>C.mục khuyến mãi</label>
							<select class="f-input" style="width:150px" name="option[promotion_cate]"><?php echo Utility::Option($cate_notify, $INI['option']['promotion_cate'],'Tắt'); ?></select>
                        </div>
                        
						<div class="field">
                            <label>Phần mua cuối trang</label>
							<select class="f-input" style="width:150px" name="option[ft_buy]"><?php echo Utility::Option($option_yn, option_yesv('ft_buy')); ?></select>
                        </div>

						<div class="wholetip clear"><h3>3. Hiển thị</h3></div>
						<div class="field">
                            <label>Hiển thị deal thất bại</label>
							<select class="f-input" style="width:150px" name="option[displayfailure]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('displayfailure')); ?></select><span class="inputtip">Trong deal gần đây hiển thị deal thất bại</span>
                        </div>
						<div class="field">
                            <label>Hiển thị comment</label>
							<select name="option[cmt_display]" class="f-input" style="float:left; width:150px"><?php echo Utility::Option($option_yn, option_yesv('cmt_display')); ?></select>
                            <input type="text" class="number" name="option[cmt_quantity]" value="<?php echo $INI['option']['cmt_quantity']; ?>" style="margin-left:15px;"/>
                        </div>
                        <div class="wholetip clear"><h3>4. Quảng cáo</h3></div>
						<div class="field">
                            <label>Quảng cáo giữa</label>
							<select name="option[pop_center_display]" class="f-input" style="float:left; width:150px"><?php echo Utility::Option($option_yn, option_yesv('pop_center_display')); ?></select>
                            <label>Chiều rộng x cao</label>
                            <input type="text" class="number" name="option[pop_center_width]" value="<?php echo $INI['option']['pop_center_width']; ?>" style="margin-left:15px;"/>
                            <input type="text" class="number" name="option[pop_center_height]" value="<?php echo $INI['option']['pop_center_height']; ?>" style="margin-left:15px;"/>
                        </div>
                        
						<div class="field">
                            <label>Quảng cáo trái phải</label>
							<select name="option[ads_left_right]" class="f-input" style="float:left; width:150px"><?php echo Utility::Option($option_ads_lr, $INI['option']['ads_left_right']); ?></select>
                        </div>
                        

						<div class="wholetip clear"><h3>5. Hiển thị theo thể loại</h3></div>
                        <div class="field">
                            <label>Thể loại trang chính</label>
							<select class="f-input" style="width:150px" name="option[cateteam]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('cateteam')); ?></select><span class="inputtip">Để hiển thị mục thể loại trang chính hoặc không</span>
						</div>
						<div class="field">
                            <label>Thể loại gần đây</label>
							<select class="f-input" style="width:150px" name="option[cateteam_cur]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('cateteam_cur')); ?></select><span class="inputtip">Để hiển thị thể loại trang deal gần đây hoặc không</span>
						</div>
						<div class="wholetip clear"><h3>5. Tuỳ chọn đăng ký</h3></div>
						<div class="field">
                            <label>Email</label>
							<select class="f-input" style="width:150px" name="option[emailverify]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('emailverify')); ?></select><span class="inputtip">Khi người dùng đăng ký gửi email xác nhận đến họ</span>
                        </div>
						<div class="field">
                            <label>Mobile</label>
							<select class="f-input" style="width:150px" name="option[needmobile]" style="float:left;"><?php echo Utility::Option($option_yn, option_yesv('needmobile')); ?></select><span class="inputtip">Khi người dùng đăng ký gửi email xác nhận đến họ</span>
                        </div>
-->
						<div class="act">
                            <input type="submit" value="Lưu" name="commit" class="formbutton" />
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
