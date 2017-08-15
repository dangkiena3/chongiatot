<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('page'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Chỉnh sửa trang tĩnh</h2></div>
                <div class="sect">
                    <form method="post">
						<div class="field">
							<label style="width: 130px;">Chọn trang</label>
							<select name="id" id="manage_system_page_id" class="f-input" onchange="X.manage.loadpage(this.options[this.selectedIndex].value);"><?php echo Utility::Option($pages, $id, '-'); ?></select>
						</div>
					<?php if($content||$id){?>
						<div class="field">
							<label style="width:70px">Nội dung</label>
							<div style="float:left;width: 95%">
							<?php echo $value_textArea; ?>
							</div>
						</div>
					<?php }?>
                        <div class="act">
                            <input type="submit" value="Lưu" name="commit" class="formbutton"/>
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
