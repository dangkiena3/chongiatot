<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="system">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('bulletin'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Thông báo hệ thống</h2></div>
                <div class="sect">
                    <form id="login-user-form" method="post" action="/manage/system/bulletin.php">
					<input type="hidden" name="id" value="<?php echo $system['id']; ?>" />
						<div class="wholetip clear"><h3>1. Thông báo website</h3></div>
                        <div class="field">
                            <label>Thông báo website</label>
                            <div style="float:left;"><?php echo $bulletin0; ?></div>
                        </div>
						<div class="wholetip clear"><h3>2. Thông báo thành phố</h3></div>
					<?php if(is_array($hotcities)){foreach($hotcities AS $one) { ?>
                        <div class="field">
                            <label><?php echo $one['name']; ?></label>
                            <div style="float:left;"><?php echo $CKEditor->editor("bulletin[1]", $INI['bulletin'][1]); ?></div>
						</div>
					<?php }}?>
                        <div class="act">
                            <input type="submit" value="Lưu" name="commit" id="system-submit" class="formbutton"/>
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
