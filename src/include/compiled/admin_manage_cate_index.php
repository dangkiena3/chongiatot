<?php include template("manage_header");?>

<script language="javascript">
 $(document).ready(function() {
  $('#province').change(function(){
   	giatri = this.value;
   	$('#sdistrict').load('/ajax/cate1.php?type=child&id=' + giatri);
  });
 });
</script>

<div id="bdw" class="bdw">

<div id="bd" class="cf">

<div id="partner">

	<div class="dashboard" id="dashboard">

		<ul><?php echo mcurrent_cate($type); ?></ul>

	</div>

	<div id="content" class="clear mainwide">

        <div class="clear box">

            <div class="box-top"></div>

            <div class="box-content">

                <div class="head"><h2>Nhập thông tin <?php echo $types[$type]; ?></h2></div>

                <div class="sect">

                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="validator">

                    	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
	       
                        <div class="field"><label>Tên</label>
						
                            <input type="text" size="30" name="name_info" value="<?php echo $getcate['name']; ?>" require="true" datatype="require" maxLength="100" class="f-input" style="width:200px;" />

                        </div>

                        <input type="hidden" size="30" name="type_info" value="<?php echo $type; ?>" require="true" datatype="require" maxLength="100" class="f-input" style="width:200px;" />



						<?php if($type=='child'){?>

                        <div class="field">

                        	<label>Danh mục cha</label>
							
							<?php if($_GET['action']=='edit'){?>

                            <select name="pid_info" class="f-input" style="width:210px;">
								
								<?php echo Utility::Option($roots, $getcate['pid']); ?>

							</select>

							<?php } else { ?>

                            <select name="pid_info" class="f-input" style="width:210px;">

								<option value="">--chọn danh mục--</option>
								
								<?php echo Utility::Option($roots, $getcate['pid']); ?>

							</select>

							<?php }?>

                        </div>

						<?php }?> 
                        
                        
						<?php if($type=='subchild'){?>  

                        <div class="field">
                        
                            <label>Danh mục cha</label>
                            
                            <?php if($_GET['action']!='edit'){?>
                        
                            <select name="province" id="province" class="f-input" style="width:210px;">
                        
                                <option value="">--chọn danh mục--</option>
                        
                                <?php echo Utility::Option($roots, get_pid_cate($getcate['pid'])); ?>
                        
                            </select>
                        
                            <?php } else { ?>
                            
                            <select name="province" id="province" class="f-input" style="width:210px;">
                        
                                <?php echo Utility::Option($roots, get_pid_cate($getcate['pid'])); ?>
                        
                            </select>
                            
                            <?php }?>
                        
                        </div>
                        
                        <div class="field">
                        
                            <label>Danh mục cấp 1</label>
                            
                            <span id="sdistrict">
                        
                                <?php if($_GET['action']!='edit'){?>
                        
                                <select name="pid_info" id="district" class="f-input" style="width:210px;">
                        
                                    <option value="">--chọn danh mục--</option>
                        
                                </select>
                        
                                <?php } else { ?>
                        
                                <select name="pid_info" id="district" class="f-input" style="width:210px;">
                        
                                    <?php echo Utility::Option($childs, $getcate['pid']); ?>
                        
                                </select>
                        
                                <?php }?>
                        
                            </span>
                        
                        </div>

						<?php }?>               

                        <div class="field">
                        
                            <label>Sắp xếp</label>

                            <input type="text" size="3" name="sort_info" value="<?php echo $getcate['sort_order']; ?>" require="true" maxLength="3" class="number" style="width:100px;" />

                            <label style="width:80px">Hiển thị</label>

							<?php if($getcate['display']=='N'){?>
							
							<input type="radio" name="display_info" value="Y" /> Có 

							<input type="radio" name="display_info" value="N" checked="checked" /> không

							<?php } else { ?>

							<input type="radio" name="display_info" value="Y" checked="checked"/> Có 

							<input type="radio" name="display_info" value="N"/> Không
							
							<?php }?>

						</div>
					    <div class="field">
                            <label>Desc</label>
                               <input type="text" size="30" name="desc" value="<?php echo $getcate['desc']; ?>" require="true" datatype="require" maxLength="300" class="f-input" style="width:500px;" />
                        </div>
						<div class="field">
                            <label>Key</label>
                               <input type="text" size="30" name="key" value="<?php echo $getcate['keyword']; ?>" require="true" datatype="require" maxLength="300" class="f-input" style="width:500px;" />
                        </div> 						
                       	<div class="field">

                            <label>Ảnh danh mục</label>

                            <input type="file" size="30" name="upload_image_info" id="cate-image-upload" class="f-input" />

                            <?php if (!empty($getcate['image_cate'])); ?> <?php echo $getcate['image_cate']; ?>

                        </div>                        
                        
                        <div class="act">

                          

                            <input type="submit" value="Sửa" name="edit" class="formbutton" style="margin-left:15px;"/>

                            <input type="reset" value="Reset" id="clear" name="clear" class="formbutton" style="margin-left:15px;"/>

                        </div>
                        

                    </form>

                    <table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">

					<tr class="forum_title_tr"><th width="50">ID</th><th width="220">Tên</th>
                    <th width="200">Tên khu vực cha</th><th width="150">Ảnh đại diện</th>
					<th width="50" nowrap>Hiển thị</th>
					<th width="50">Sắp xếp</th><th width="100">Thao tác</th></tr>

					<?php if(is_array($cates)){foreach($cates AS $cate=>$one) { ?>

					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">

						<td><?php echo $one['id']; ?></td>

						<td><?php echo $one['name']; ?></td>

						<td>
                            <?php if($type=='subchild'){?>
                             <?php echo get_name_cate(get_pid_cate($one['pid'])); ?> - 
                            <?php }?>
                        	<?php echo get_name_cate($one['pid']); ?>
                       	</td>
                        
                        <td>
                        	--
                        </td>
                        
						<td><?php echo $one['display']; ?></td>

						<td><?php echo $one['sort_order']; ?></td>

					<td class="op" nowrap><a href="/manage/cate/index2.php?type=<?php echo $type; ?>&action=edit&id=<?php echo $one['id']; ?>">Sửa</a> | <a href="/ajax/manage.php?action=cateremove88&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Bạn không thể xóa danh mục này?">Xoá</a></td>

					</tr>

					<?php }}?>

					<tr><td colspan="8"><?php echo $pagestring; ?></tr>						

                    </table>

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