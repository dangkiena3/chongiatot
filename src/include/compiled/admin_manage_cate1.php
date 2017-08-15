<?php if($type=='child'){?>
<select name="pid_info" class="f-input"  style="width:210px;">
	<option selected="selected" value="">--danh mục con--</option>
	<?php echo Utility::Option($childs); ?>
</select>
<?php }?>
