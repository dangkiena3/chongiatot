<?php include template("manage_header");?>

<div id="bdw" class="bdw">

<div id="bd" class="cf">

<div id="partner">

	<div class="dashboard" id="dashboard">

		<ul><?php echo mcurrent_partner(null); ?></ul>

	</div>

	<div id="content" class="clear mainwide">

        <div class="clear box">

            <div class="box-top"></div>

            <div class="box-content">

                <div class="head"><h2>Sửa thông tin đối tác</h2>
                <b style="margin-left:20px;font-size:16px;">(<?php echo $partner['title']; ?></b></div>

                <div class="sect">

                    <form id="login-user-form" method="post" action="/manage/partner/edit.php?id=<?php echo $partner['id']; ?>" enctype="multipart/form-data" class="validator">

					<input type="hidden" name="id" value="<?php echo $partner['id']; ?>" />

						<div class="wholetip clear"><h3>1. Thông tin đăng nhập</h3></div>

                        <div class="field">

                            <label>Tài khoản</label>

                            <input type="text" size="30" name="username" id="partner-create-username" class="f-input" value="<?php echo $partner['username']; ?>" require="true" datatype="require" />

                        </div>

                        <div class="field password">

                            <label>Mật khẩu</label>

                            <input type="text" size="30" name="password" id="settings-password" class="f-input" />

                            <span class="hint">Nếu không muốn thay đổi xin để trống</span>

                        </div>

						<div class="wholetip clear"><h3>2. Thông tin hiển thị</h3></div>

						<div class="field">

							<label>Thành phố và phân loại</label>

							<select name="city_id" class="f-input" style="width:160px;"><?php echo Utility::Option(option_category('city'), $partner['city_id'], '--chọn thành phố--'); ?></select><select name="group_id" class="f-input" style="width:160px;"><?php echo Utility::Option(option_category('partner'), $partner['group_id']); ?></select>

						</div>

                        <div class="field">

                            <label>Sắp xếp</label>

                            <input type="text" size="10" name="head" value="<?php echo abs(intval($partner['head'])); ?>" class="number"/><span class="inputtip">Số càng lớn thì được hiển thị bên trên</span>

						</div>

						<div class="field">

							<label>Hiển thị</label>

							<input type="text" size="30" name="display" id="partner-edit-display" class="number" value="<?php echo $partner['display']; ?>" maxLength="1" require="true" datatype="english" style="text-transform:uppercase;" /><span class="inputtip">Y: Hiển thị trên trang chủ N: Không hiển thị trang chủ</span>

						</div>

						<div class="field">

							<label>Hiển thị đối tác</label>

							<input type="text" size="30" name="open" id="partner-edit-open" class="number" value="<?php echo $partner['open']; ?>" maxLength="1" require="true" datatype="english" style="text-transform:uppercase;" /><span class="inputtip">Y: Hiển thị N: Không tham gia</span>

						</div>

						<div class="field">

							<label>Logo</label>

							<input type="file" size="30" name="upload_image" id="team-create-image" class="f-input" />

							<?php if($partner['image']){?><span class="hint"><?php echo team_image($partner['image']); ?></span><?php }?>

						</div>

						<div class="field">

							<label>Ảnh đối tác 1</label>

							<input type="file" size="30" name="upload_image1" id="team-create-image1" class="f-input" />

							<?php if($partner['image1']){?><span class="hint"><?php echo team_image($partner['image1']); ?></span><?php }?>

						</div>

						<div class="field">

							<label>Ảnh đối tác 2</label>

							<input type="file" size="30" name="upload_image2" id="team-create-image2" class="f-input" />

							<?php if($partner['image2']){?><span class="hint"><?php echo team_image($partner['image2']); ?></span><?php }?>

						</div>

				

                        <div class="field">

                            <label>Định vị map</label>

                            <input type="text" size="30" name="longlat" style="width:300px;cursor:point;" class="f-input" id="inputlonglat" value="<?php echo $partner['longlat']; ?>" onclick="X.misc.setgooglemap('<?php echo $partner['longlat']; ?>');" /><span class="inputtip"><a href="javascript:;" style="cursor:point;" onclick="jQuery('#inputlonglat').val('');">Huỷ định vị google map</a></span>

						</div>

				

						<div class="wholetip clear"><h3>3. Thông tin cơ bản</h3></div>

                        <div class="field">

                            <label>Tên đối tác</label>

                            <input type="text" size="30" name="title" id="partner-create-title" class="f-input" value="<?php echo $partner['title']; ?>" datatype="require" require="true" />

                        </div>

                        <div class="field">

                            <label>Địa chỉ Website</label>

                            <input type="text" size="30" name="homepage" id="partner-create-homepage" class="f-input" value="<?php echo $partner['homepage']; ?>"/>

                        </div>

                        <div class="field">

                            <label>Liên hệ</label>

                            <input type="text" size="30" name="contact" id="partner-create-contact" class="f-input" value="<?php echo $partner['contact']; ?>"/>

						</div>

                        <div class="field">

                            <label>Địa chỉ đối tác</label>

                            <input type="text" size="30" name="address" id="partner-create-address" class="f-input" value="<?php echo $partner['address']; ?>" datatype="require" require="true" />

						</div>

                        <div class="field">

                            <label>Điện thoại</label>

                            <input type="text" size="30" name="phone" id="partner-create-phone" class="f-input" value="<?php echo $partner['phone']; ?>" maxLength="20" datatype="require" />

						</div>

                        <div class="field">

                            <label>Di động</label>

                            <input type="text" size="30" name="mobile" id="partner-create-mobile" class="f-input" value="<?php echo $partner['mobile']; ?>" maxLength="20" />

						</div>

                        <div class="field">

                        <label>Khu vực</label>

                           <div style="float:left;width: 80%"><?php echo $location; ?></div>

						</div>

                        <div class="field">

                            <label>Thông tin thêm</label>

                             <div style="float:left;width: 80%"><?php echo $orderinfo; ?>

                             <!-- <textarea cols="45" rows="5" name="other" id="partner-create-other" class="f-textarea editor"><?php echo htmlspecialchars($partner['other']); ?></textarea>-->

                             </div>

						</div>

						<div class="wholetip clear"><h3>4. Thông tin ngân hàng</h3></div>

                        <div class="field">

                            <label>Tên ngân hàng</label>

                            <input type="text" size="30" name="bank_name" id="partner-create-bankname" class="f-input" value="<?php echo $partner['bank_name']; ?>"/>

                        </div>

                        <div class="field">

                            <label>Tên tài khoản</label>

                            <input type="text" size="30" name="bank_user" id="partner-create-bankuser" class="f-input" value="<?php echo $partner['bank_user']; ?>"/>

                        </div>

                        <div class="field">

                            <label>Tài khoản</label>

                            <input type="text" size="30" name="bank_no" id="partner-create-bankno" class="f-input" value="<?php echo $partner['bank_no']; ?>"/>

                        </div>

                        <div class="act">

                            <input type="submit" value="Sửa" name="commit" id="partner-submit" class="formbutton"/>

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

