<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_order('down'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
					<h2>Tải đơn hàng</h2>
				</div>
                <div class="sect">
                    <form method="post" target="" class="validator">
					<div class="field"><input type="radio" name="type" value="chkid" checked>
                            <label>ID bắt đầu</label>
							<input type="text" size="30" maxlength="10" name="beginid" require="true" class="number" />

                            <label>ID kết thúc</label>
							<input type="text" size="30" maxlength="10" name="endid" require="true" class="number" />
                        
                    </div>
					<hr style="width:800px">
                        <div class="field"><input type="radio" name="type" value="chktime">
                            <label>Thời gian bắt đầu</label>
							<input type="text" size="30" maxlength="30" name="begintime" require="true" class="number" value="<?php echo date('d-m-Y',strtotime('-1 days')); ?>"  onFocus="WdatePicker({isShowClear:false,readOnly:true})" />

                            <label>Thời gian kết thúc</label>
							<input type="text" size="30" maxlength="30" name="endtime" require="true" class="number" value="<?php echo date('d-m-Y',$daytime); ?>"  onFocus="WdatePicker({isShowClear:false,readOnly:true})" />
                        
                        </div>

                        <div class="field">
                            <label>Tình trạng đơn hàng</label>
                            <div style="padding-top:8px;">
                            	<?php if(is_array($tracking)){foreach($tracking AS $index=>$one) { ?>
                                <input type="checkbox" name="order_state[]" value="<?php echo $index; ?>" checked /><?php echo $one; ?>
                                <?php }}?>
                          	</div>
                        </div>
                        

                        <div class="act">
                            <input type="submit" value="Tải về" name="commit" class="formbutton" />
                            <input type="reset" value="Làm lại" name="reset" class="formbutton" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
	</div>

</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("manage_footer");?>
