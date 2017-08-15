<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_misc('backup'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>Sao lưu dữ liệu</h2>
                    <ul class="filter">
						<li class="label"> </li>
						<?php echo mcurrent_misc_backup('backup'); ?>
					</ul>
				</div>
                <div class="sect">

<form method="post">
<table width="96%" border="0" align="center" class="coupons-table">
    <tr><td width="510px">Tuỳ chọn sao lưu</td><td rowspan="11" valign="top" style="padding-left:20px"><font color="red"><b>Ghi chú</b></font><br/>Thư mục sao lưu trên server là include/data<br/>Đối với các bảng lớn, sao lưu đa khối lượng được khuyến khích mạnh mẽ. <br/> Để thực hiện sao lưu đa khối lượng, bạn phải sao lưu dữ liệu của bạn trên các máy chủ.</td></tr>
    <tr><td width="510px"><input type="radio" name="bfzl" value="quanbubiao" checked>Sao lưu tất cả, <span class="gray">sao lưu tất cả dữ liệu ra 1 file.</span></td></tr>
    <tr><td width="510px"><input type="radio" name="bfzl" value="danbiao">Sao lưu từng bảng: &nbsp;<select name="tablename"><?php echo Utility::Option($option_table, null, '--chọn bảng--'); ?></select>&nbsp;&nbsp;<span class="gray"> Sao lưu từ bảng ra 1 file.</span></td></tr>
    <tr><td width="510px"><hr style="border:1px dashed; height:1px" color="#DDDDDD"></td></tr>
    <tr><td width="510px">Chia nhỏ file sao lưu</td></tr>
    <tr><td width="510px"><input type="checkbox" name="fenjuan" value="yes">Kích thức chia nhỏ <input name="filesize" type="text" value="512" size="10"> K</td></tr>
    <tr><td width="510px"><hr style="border:1px dashed; height:1px" color="#DDDDDD"></td></tr>
    <tr><td width="510px">Chọn đường dẫn</td></tr>
    <tr><td width="510px"><input type="radio" name="weizhi" value="server" checked>Sao lưu trên server</td></tr><tr class="cells">
    <td width="510px"> <input type="radio" name="weizhi" value="localpc">Sao lưu vào máy tính</td></tr>
    <tr><td align='left' width="510px"><input type="hidden" name="action" value="back"><input type="submit" class="formbutton"d="orders-list" value="Sao lưu"></td></tr>
</table>
</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->
<?php include template("manage_footer");?>
