<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_market('down'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
					<h2>tuỳ chọn tải về</h2>
					<ul class="filter"><?php echo mcurrent_market_down('downorder'); ?></ul>
				</div>
                <div class="sect">
                    <form method="post" target="_blank" class="validator">
                        <div class="field">
                            <label>Deal ID</label>
							<input type="text" name="team_id" require="true" datatype="number" class="number" /><span class="inputtip">Xin nhập deal ID</span>
						</div>

                        <div class="field">
                            <label>Trạng thái</label>
							<div style="padding-top:8px;"><input type="checkbox" name="state[]" value="pay" checked />Đã thanh toán<input type="checkbox" name="state[]" value="unpay" checked>Chưa thanh toán</div>
						</div>

                        <div class="field">
                            <label>Cổng thanh toán</label>
							<div style="padding-top:8px;"><input type="checkbox" name="service[]" value="alipay" checked />&nbsp;AliPay&nbsp;&nbsp;<input type="checkbox" name="service[]" value="tenpay" checked />&nbsp;Tenpay&nbsp;&nbsp;<input type="checkbox" name="service[]" value="chinabank" checked />&nbsp;China Bank&nbsp;&nbsp;<input type="checkbox" name="service[]" value="bill" checked />&nbsp;Quick MOney&nbsp;&nbsp;<input type="checkbox" name="service[]" value="cash" checked />&nbsp;Pay in cash&nbsp;&nbsp;<input type="checkbox" name="service[]" value="credit" checked>&nbsp;Pay with balance</div>
						</div>

                        <div class="act">
                            <input type="submit" value="Tải về" name="commit" class="formbutton"/>
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
