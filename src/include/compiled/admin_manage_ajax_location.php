
<?php if($location=='ward'){?>
<select name="ward"  class="f-input" style="width:210px;">
	<?php echo Utility::Option($wards); ?>
</select>
<?php }?>
<?php if($location=='district'){?>
<select name="district" onchange=dochange('ward',this.value) class="f-input" style="width:210px;">
	<option selected="selected" value="">--Chọn Quận Huyện--</option>
	<?php echo Utility::Option($districts); ?>
</select>
<?php }?>
<?php if($location=='provine'){?>
<select name="province" onchange=dochange('district',this.value) class="f-input" style="width:210px;">
		<option selected="selected" value="">--chọn Phường/Xã--</option>
		<?php echo Utility::Option($provinces); ?>
</select>
<?php }?>
