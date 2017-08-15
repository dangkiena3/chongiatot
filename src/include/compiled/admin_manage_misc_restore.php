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
                    <h2>Phục hồi dữ liệu</h2>
                    <ul class="filter">
						<li class="label"> </li>
						<?php echo mcurrent_misc_backup('restore'); ?>
					</ul>
				</div>
                <div class="sect">

<form action="restore.php" method="post" enctype="multipart/form-data">
    <table width="96%" border="0" class="coupons-table">
    <tr><td width="17%" height="25"><input type="radio" name="restorefrom" value="server" checked>Từ máy chủ</td>
		<td width="41%" height="25"><select name="serverfile">
			<?php echo Utility::Option($bs, null, '--chọn file phục hồi--'); ?>
		</td>
		<td width="41%" rowspan="4" valign="top">
        	<ul><?php if(is_array($show)){foreach($show AS $index=>$one) { ?><li><?php echo $index+1; ?>. <?php echo $one; ?></li><?php }}?></ul>
       	</td>
    </tr>
    <tr><td height="22"><input type="radio" name="restorefrom" value="localpc">Từ máy tính của bạn</td>
    <td height="22"><input type="hidden" name="MAX_FILE_SIZE" value="1500000"><input type="file" name="myfile"></td></tr>
    <tr height="50px"><td align="left"><input type="hidden" name="action" value="restore"><input type="submit" value="Phục hồi" class="formbutton"></td></tr>
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
