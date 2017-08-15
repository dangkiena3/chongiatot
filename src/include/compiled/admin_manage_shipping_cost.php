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
		<ul><?php echo mcurrent_system('shipping_cost'); ?></ul>
	</div>

	<div id="content" class="clear mainwide">

        <div class="clear box">

            <div class="box-top"></div>

            <div class="box-content">

                <div class="head"><h2>Nhập phí giao hàng</h2></div>

                <div class="sect">

                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="validator">

                    	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
	       
                       <div class="field">

                        	<label>Tỉnh thành</label>
							
							<?php if($_GET['action']!='edit'){?>

                            <select name="province" id="province" class="f-input" style="width:210px;">
                            
                            	<?php echo Utility::Option($provinces_ad, '','--Chọn Tỉnh Thành--'); ?>

							</select>

							<?php } else { ?>
							
                            <select name="province" id="province" class="f-input" style="width:210px;">

								<?php echo Utility::Option($provinces_ad, $province_id); ?>

							</select>
							
							<?php }?>

                        </div>

                       <div class="field">

                        	<label>Quận huyện</label>
							
							<span id="sdistrict">
	
								<?php if($_GET['action']!='edit'){?>

                            	<select name="district" id="district" class="f-input" style="width:210px;">

									<option value="">--Chọn Quận Huyện--</option>
                                    
                                </select>

								<?php } else { ?>

								<select name="district" id="district" class="f-input" style="width:210px;">

									<?php echo Utility::Option($districtss, $district_id); ?>

								</select>

								<?php }?>

							</span>

                        </div>
						
                        <!--<div class="field">
                        	<label>Chọn phương thức</label>
                            <?php if(is_array($methods)){foreach($methods AS $one) { ?>
                            <?php if($one['id']==$get_shipping_costs['method_id']){?>
							<input type="radio" checked="checked" value="<?php echo $one['id']; ?>" name="method_info"><?php echo $one['name']; ?>
                            <?php } else { ?>
                            <input type="radio" value="<?php echo $one['id']; ?>" name="method_info"><?php echo $one['name']; ?>
                            <?php }?>
    						<?php }}?>
                        </div>-->

                        <div class="field">

                        	<label>Phí giao hàng</label>
                            
							<input type="text" size="30" name="cost_info" value="<?php echo $get_shipping_costs['vat']; ?>" require="true" maxLength="10" class="number" style="width:200px;" />
                        </div>
                        
                        <div class="act">
						<?php if($_GET['action']!='edit'){?>
                            <input type="submit" value="Thêm" name="createnew" class="formbutton"/>
						<?php } else { ?>
                            <input type="submit" value="Sửa" name="edit" class="formbutton" style="margin-left:15px;"/>
						<?php }?>                        
                        </div>

                    </form>

                    <table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">

					<tr class="forum_title_tr">
                    	<th width="50">ID</th>
                        <th width="250">Tên Quận Huyện</th><th width="150">Phí giao hàng</th><th width="100">Thao tác</th>
                  	</tr>

					<?php if(is_array($shipping_costs)){foreach($shipping_costs AS $cost=>$one) { ?>

					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">

						<td><?php echo $one['id']; ?></td>

			

						<td><?php echo get_name_local($one['parent_id']); ?>--><?php echo get_name_local($one['id']); ?></td>
                        
						<td><?php echo formatMoney($one['vat']); ?></td>
                        
						<td class="op" nowrap>
                    		<a href="/manage/system/shipping_cost.php?action=edit&id=<?php echo $one['id']; ?>">Sửa</a> | <a href="/ajax/manage.php?action=costremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask = "Bạn có chắc xoá khu vực này không?">Xoá</a>
                       	</td>

					</tr>

					<?php }}?>

					<tr><td colspan="6"><?php echo $pagestring; ?></tr>						

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