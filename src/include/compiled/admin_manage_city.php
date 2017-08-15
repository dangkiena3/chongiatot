<?php if($type=='child'){?>
<select name="quan" id="quan" class="f-input"  style="width:160px;">
	<option selected="selected" value="">--Chọn Quận Huyện--</option>
	<?php echo Utility::Option($childs); ?>
</select>
<?php }?>
<?php if($type=='subchild'){?>
<select name="phuong" id="phuong" class="f-input"  style="width:160px;">
	<option selected="selected" value="">--Chọn Phường Xã--</option>
	<?php echo Utility::Option($childs); ?>
</select>
<?php }?>
<?php if($type=='none'){?>
<select name="phuong" id="phuong" class="f-input"  style="width:160px;">
	<option selected="selected" value="">--Chọn Phường Xã--</option>
</select>
<?php }?>
