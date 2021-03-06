<?php include template("manage_header");?>

<div id="bdw" class="bdw">

<div id="bd" class="cf">

<div id="partner">

	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('shippingmethod'); ?></ul>
	</div>

	<div id="content" class="clear mainwide">

        <div class="clear box">

            <div class="box-top"></div>

            <div class="box-content">

                <div class="head"><h2>Nhập thông tin phương thức</h2></div>

                <div class="sect">

                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="validator">

                    	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
	       

                        <div class="field"><label>Tên phương thức</label>
                        
                            <input type="text" size="30" name="name_info" value="<?php echo $getmethods['name']; ?>" require="true" datatype="require" maxLength="100" class="f-input" style="width:550px;" />
    
                        </div>
                        
                        <div class="field"><label>Mô tả</label>
                        
                            <textarea name="desc_info" cols="87" rows="3"><?php echo $getmethods['desc']; ?></textarea>
    
                        </div>
                        
                        <div class="field"><label>Link ảnh</label>
                        
                            <input type="text" size="30" name="linkimg_info" value="<?php echo $getmethods['linkimg']; ?>" require="true" datatype="require" maxLength="100" class="f-input" style="width:550px;" />
    
                        </div>

                       <div class="field">

                            <label>Hiển thị</label>

							<?php if($getmethods['display']=='N'){?>
							
							<input type="radio" name="display_info" value="Y" /> Có 

							<input type="radio" name="display_info" value="N" checked="checked" /> không

							<?php } else { ?>

							<input type="radio" name="display_info" value="Y" checked="checked"/> Có 

							<input type="radio" name="display_info" value="N"/> Không
							
							<?php }?>

						</div>
					   
					    <div class="field">

                            <label>Sắp xếp</label>

                            <input type="text" size="30" name="sort_info" value="<?php echo $getmethods['order_sort']; ?>" require="true" maxLength="3" class="f-input" style="width:200px;" />

                        </div>  
                        
                        <div class="act">

                            <input type="submit" value="Thêm" name="createnew" class="formbutton"/>

                            <input type="submit" value="Sửa" name="edit" class="formbutton" style="margin-left:15px;"/>

                            <input type="reset" value="Reset" id="clear" name="clear" class="formbutton" style="margin-left:15px;"/>

                        </div>

                    </form>

                    <table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">

					<tr class="forum_title_tr">
                    	<th width="50">ID</th><th width="200">Tên phương thức</th>
                        <th width="350">Mô tả</th><th width="50">Sắp xếp</th><th width="50">Hiển thị</th>
                        <th width="100">Link ảnh</th><th width="100">Thao tác</th>
                  	</tr>

					<?php if(is_array($methods)){foreach($methods AS $method=>$one) { ?>

					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">

						<td><?php echo $one['id']; ?></td>

						<td><?php echo $one['name']; ?></td>

						<td><?php echo $one['desc']; ?></td>
                        
						<td><?php echo $one['order_sort']; ?></td>
                        
						<td><?php echo $one['display']; ?></td>
                        
                        <td><?php echo $one['linkimg']; ?></td>

						<td class="op" nowrap>
                    		<a href="/manage/system/shippingmethod.php?action=edit&id=<?php echo $one['id']; ?>">Sửa</a> | <a href="/ajax/manage.php?action=methodremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Bạn có chắc xoá phương thức này không?">Xoá</a>
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