<?php if($type=='child'){?>
<select name="group_pid" id="group_pid" class="f-input"  style="width:210px;">
	<option selected="selected" value="">--danh mục con--</option>
	<?php echo Utility::Option($childs); ?>
</select>
<?php }?>
<?php if($type=='subchild'){?>
<select name="group_id" id="group_id" class="f-input"  style="width:210px;">
	<option selected="selected" value="">--danh mục con--</option>
	<?php echo Utility::Option($childs); ?>
</select>
<?php }?>
