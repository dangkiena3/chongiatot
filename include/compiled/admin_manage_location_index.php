<?php include template("manage_header");?>
<script language="javascript">
 $(document).ready(function() {
  $('#province').change(function(){
   	giatri = this.value;
   	$('#sdistrict').load('/ajax/location.php?location=district&id=' + giatri);
  });
 });
</script>


<div id="bdw" class="bdw">

<div id="bd" class="cf">

<div id="partner">

	<div class="dashboard" id="dashboard">

		<ul><?php echo mcurrent_location($local); ?></ul>

	</div>

	<div id="content" class="clear mainwide">

        <div class="clear box">

            <div class="box-top"></div>

            <div class="box-content">

                <div class="head"><h2>Nhập thông tin <?php echo $cates[$local]; ?></h2></div>

                <div class="sect">

                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="validator">

                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
	       

                        <div class="field"><label>Tên</label>
						
                            <input type="text" size="30" name="name_info" value="<?php echo $getlocation['name']; ?>" require="true" datatype="require" maxLength="100" class="f-input" style="width:200px;" />

                        </div>

						
                        <input type="hidden" size="30" name="local_info" value="<?php echo $local; ?>" require="true" datatype="require" maxLength="100" class="f-input" style="width:200px;" />



						<?php if($local=='district'){?>
                        <div class="field">

                        	<label>Tỉnh thành</label>
							
							<?php if($_GET['action']=='edit'){?>

                            <select name="pid_info" class="f-input" style="width:210px;">
								
								<?php echo Utility::Option($provinces, $getlocation['pid']); ?>

							</select>

							<?php } else { ?>

                            <select name="pid_info" class="f-input" style="width:210px;">

								<option value="">--chọn tỉnh thành--</option>
								
								<?php echo Utility::Option($provinces, $getlocation['pid']); ?>

							</select>

							<?php }?>

                        </div>
						<?php }?> 

						<?php if($local=='ward'){?>  

                       <div class="field">

                        	<label>Tỉnh thành</label>
							
							<?php if($_GET['action']!='edit'){?>

                            <select name="province" id="province" class="f-input" style="width:210px;">

								<option value="">--chọn tỉnh thành--</option>

								<?php echo Utility::Option($provinces, get_pid_local($getlocation['pid'])); ?>

							</select>

							<?php } else { ?>
							
                            <select name="province" id="province" class="f-input" style="width:210px;">

								<?php echo Utility::Option($provinces, get_pid_local($getlocation['pid'])); ?>

							</select>
							
							<?php }?>

                        </div>

                       <div class="field">

                        	<label>Quận huyện</label>
							
							<span id="sdistrict">
	
								<?php if($_GET['action']!='edit'){?>

                            	<select name="pid_info" id="district" class="f-input" style="width:210px;">

									<option value="">--chọn quận huyện--</option>

								</select>

								<?php } else { ?>

								<select name="pid_info" id="district" class="f-input" style="width:210px;">

									<?php echo Utility::Option($districts, $getlocation['pid']); ?>

								</select>

								<?php }?>

							</span>

                        </div>

						<?php }?>               

                        <div class="field">

                            <label>Hiển thị</label>

							<?php if($getlocation['display']=='N'){?>
							
							<input type="radio" name="display_info" value="Y" /> Có 

							<input type="radio" name="display_info" value="N" checked="checked" /> không

							<?php } else { ?>

							<input type="radio" name="display_info" value="Y" checked="checked"/> Có 

							<input type="radio" name="display_info" value="N"/> Không
							
							<?php }?>

						</div>
					   
					    <div class="field">

                            <label>Sắp xếp</label>

                            <input type="text" size="30" name="sort_info" value="<?php echo $getlocation['sort_order']; ?>" require="true" maxLength="3" class="f-input" style="width:200px;" />

                        </div>  
                        
                        <div class="act">

                            <input type="submit" value="Thêm" name="createnew" class="formbutton"/>

                            <input type="submit" value="Sửa" name="edit" class="formbutton" style="margin-left:15px;"/>

                            <input type="reset" value="Reset" id="clear" name="clear" class="formbutton" style="margin-left:15px;"/>

                        </div>

                    </form>

                    <table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">

					<tr class="forum_title_tr">
                    	<th width="50">ID</th><th width="200">Tên</th><th width="250">Tên khu vực cha</th><th width="250">Phí giao hàng</th>
                        <th width="50" nowrap>Hiển thị</th>
                        <th width="80">Sắp xếp</th><th width="150">Thao tác</th>
                  	</tr>

					<?php if(is_array($locations)){foreach($locations AS $location=>$one) { ?>

					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">

						<td><?php echo $one['id']; ?></td>

						<td><?php echo $one['name']; ?></td>

						<td>						
						<?php echo get_name_local($one['pid']); ?>
						<?php if($local=='ward'){?>
						 - <?php echo get_name_local(get_pid_local($one['pid'])); ?>
						<?php }?>
						</td>
                        
						<td><?php echo formatMoney($one['ship'],0); ?></td>
                        
						<td><?php echo $one['display']; ?></td>

						<td><?php echo $one['sort_order']; ?></td>

					<td class="op" nowrap><a href="/manage/location/index.php?local=<?php echo $local; ?>&action=edit&id=<?php echo $one['id']; ?>">Sửa</a> | <a href="/ajax/manage.php?action=locationremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Bạn có chắc xoá khu vực này không?">Xoá</a></td>

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