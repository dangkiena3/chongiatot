<?php if($type=='child'){?>
<select name="group_id" class="f-input"  style="width:160px;">
	<option selected="selected" value="">--danh mục con--</option>
	<?php echo Utility::Option($childs); ?>
</select>
<?php }?>
