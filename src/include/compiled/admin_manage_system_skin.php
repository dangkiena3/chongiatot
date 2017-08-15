<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('skin'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Skin hệ thống</h2></div>
                <div class="sect">
                    <form method="post">
                        <div class="field">
                            <label>Giao diện</label>
							<select name="skin[template]" class="f-input" style="width:200px;"><?php echo Utility::Option(ZSystem::GetTemplateList(), $INI['skin']['template']); ?></select>
							<span class="hint">Among the templates installed under [<?php echo DIR_ROOT; ?>/template] directory, only the default one supports the switch of multiple themes</span>
                        </div>
                        <div class="field">
                            <label>Theme</label>
							<select name="skin[theme]" class="f-input" style="width:200px;"><?php echo Utility::Option(ZSystem::GetThemeList(), $INI['skin']['theme']); ?></select>
							<span class="hint">Among the themes installed under the directory [<?php echo WWW_ROOT; ?>/static/theme] , only the default one support the switch between themes</span>
                        </div>
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
