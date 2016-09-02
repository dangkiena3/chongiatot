<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('pay'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Thanh toán</h2></div>
                <div class="sect">
                    <form method="post">
					<?php $index=0;; ?>
					<div class="wholetip clear"><h3><?php echo ++$index; ?> .BAOKIM.VN (Để trống nếu không hỗ trợ)</h3></div>
					<!-- baokim -->
					<div class="field">
                            <label>baokim acc/Email</label>
                            <input type="text" size="30" name="paypal[baokim_email]" class="f-input" value="<?php echo $INI['paypal']['baokim_email']; ?>"/>
                    </div>
					<!-- baokim/End -->
					<div class="wholetip clear"><h3><?php echo ++$index; ?> .NGANLUONG.VN (Để trống nếu không hỗ trợ)</h3></div>
					<!-- nganluong -->
					<div class="field">
                            <label>nganluong acc/Email</label>
                            <input type="text" size="30" name="paypal[nganluong_email]" class="f-input" value="<?php echo $INI['paypal']['nganluong_email']; ?>"/>
                    </div>
					<!-- nganluong/End -->					
					<!-- Paypal -->
						<div class="wholetip clear"><h3><?php echo ++$index; ?> .Paypal</h3></div>
                        <div class="field">
                            <label>Account Email</label>
                            <input type="text" size="30" name="paypal[mid]" class="f-input" value="<?php echo $INI['paypal']['mid']; ?>" style="width:200px;" /><span class="inputtip">Email of paypal account.</span>
                        </div>
                        <div class="field">
                            <label>Location</label>
                            <input type="text" size="30" name="paypal[loc]" class="f-input" value="<?php echo $INI['paypal']['loc']; ?>" style="width:200px;"/><span class="inputtip">Location, such as: US,CA,UK</span>
                        </div>
					<!-- Paypal/End -->
						<div class="wholetip clear"><h3><?php echo ++$index; ?>. Thanh toán tại nhà</h3></div>
                        <div class="field">
                            <label>Phí</label>
                            <div style="float:left;"><input type="text" class="f-input" style="width: 100px;" name="other[phi]" value="<?php echo formatMoney($INI['other']['phi'],0); ?>">&nbsp;&nbsp;&nbsp;<?php echo $currency; ?></div>
                        </div>
					<!-- other -->
						<div class="wholetip clear"><h3><?php echo ++$index; ?> Ghi chú thanh toán</h3></div>
                        <div class="field">
                            <label>Ghi chú</label>
                            <div style="float:left;"><textarea cols="35" rows="5" name="other[pay]" class="f-textarea editor"><?php echo htmlspecialchars($INI['other']['pay']); ?></textarea></div>
                        </div>
                        <div class="act">
                            <input type="submit" value="Lưu" name="commit" class="formbutton"/>
                        </div>
					<!-- other/End -->
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
