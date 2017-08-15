<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('cache'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
					<h2>Cài đặt Cache (chỉ hỗ trợ Memcache)</h2>
					<ul class="filter">
						<li><a href="/ajax/manage.php?action=cacheclear" class="ajaxlink">Xoá cache giao diện</a></li>
					</ul>
				</div>
                <div class="sect">
                    <form method="post">
						<div class="wholetip clear">
							<h3>Định dạng 127.0.0.1:11211:100; nếu Memcache không cài đặt, hãy để trống.</h3>
						</div>
						<div style="margin:0 20px;">
							<p>127.0.0.1 is the server IP of Memcache.</p>
							<p>11211 is the port number of Memcache.</p>
							<p>100 is the weight，which is any integer bigger than 0.</p>
						</div>
						<div class="wholetip clear"><h3>1. Cache Server</h3></div>
                        <div class="field">
                            <label>Server 1</label>
                            <input type="text" size="30" name="memcache[]" class="f-input" value="<?php echo $INI['memcache'][0]; ?>"/>
                        </div>
                        <div class="field">
                            <label>Server 2</label>
                            <input type="text" size="30" name="memcache[]" class="f-input" value="<?php echo $INI['memcache'][1]; ?>"/>
                        </div>
                        <div class="field">
                            <label>Server 3</label>
                            <input type="text" size="30" name="memcache[]" class="f-input" value="<?php echo $INI['memcache'][2]; ?>"/>
                        </div>
                        <div class="field">
                            <label>Server 4</label>
                            <input type="text" size="30" name="memcache[]" class="f-input" value="<?php echo $INI['memcache'][3]; ?>"/>
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
