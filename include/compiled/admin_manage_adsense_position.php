<?php include template("manage_header");?>



<div id="bdw" class="bdw">

<div id="bd" class="cf">

<div id="partner">

	<div class="dashboard" id="dashboard">

		<ul><?php echo current_adsense('position'); ?></ul>

	</div>

	<div id="content" class="clear mainwide">

        <div class="clear box">

            <div class="box-top"></div>

            <div class="box-content">

                <div class="head"><h2>Nhập thông tin quảng cáo</h2></div>

                <div class="sect">

                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="validator">

                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

						<div class="wholetip clear"><h3>Xin điền thông tin</h3></div>
                        
                        <div class="field">

                            <label>Tên</label>

                            <input type="text" size="30" name="name_info" value="<?php echo $getadsense['name']; ?>" require="true" datatype="require" maxLength="100" class="f-input" style="width:400px;" />

                            <span class="inputtip"><font color="red">Website mua chung</font></span>

                        </div>

  	                    <div class="field">

                            <label>Vị trí</label>
                            <select name="pos_info" class="f-input" style="width:160px;">
                            	<?php echo Utility::Option($ads_position,$getadsense['pos_ads'],'-Chọn vị trí-'); ?>
                            </select>
                            
                            <label>Sắp xếp</label>
                            
                            <input type="text" size="3" name="sort_info" value="<?php echo $getadsense['order_sort']; ?>" maxLength="3" class="f-input" style="width:90px;" />
                        </div>  

                        
                        <div class="field">

                            <label>Liên kết</label>

                            <input type="text" size="30" name="url_info" value="<?php echo $getadsense['url']; ?>" require="true" datatype="require" maxLength="100" class="f-input" style="width:500px;" />

                            <span class="inputtip"><font color="red">vd: http://<?php echo $_SERVER['SERVER_NAME']; ?></font></span>

                        </div>

                        <div class="field">

                            <label>Ảnh</label>

                            <input type="file" size="30" name="upload_image" id="slider-image-upload" class="f-input" style="width:287px"/>
                            
                            <label style="width:70px">Hiển thị</label>

							<?php if($getadsense['display']=='N'){?>
							
							<input type="radio" name="display_info" value="Y" /> Có 

							<input type="radio" name="display_info" value="N" checked="checked" /> không

							<?php } else { ?>

							<input type="radio" name="display_info" value="Y" checked="checked"/> Có 

							<input type="radio" name="display_info" value="N"/> Không
							
							<?php }?>

                            <?php if(!empty($getadsense['image'])){?>
                            <span class="hint"><?php echo $getadsense['image']; ?></span>
                            <?php }?>

                        </div>                        

                        <div class="act">
						<?php if($_GET['action']!='edit'){?>
                            <input type="submit" value="Thêm mới" name="createnew" class="formbutton"/>
						<?php } else { ?>
                            <input type="submit" value="Sửa" name="edit" class="formbutton"/>
						<?php }?>
                        </div>

                    </form>

                    <table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">

					<tr class="forum_title_tr">
                        <th>ID</th><th nowrap="nowrap">Ảnh</th><th width="50">Sắp xếp</th>
                        <th width="200" nowrap>Tên</th><th width="450">Liên kết</th>
                        <th width="30">H.thị</th><th width="90">Vị trí</th><th width="80">Thao tác</th>
                    </tr>

					<?php if(is_array($adsenses)){foreach($adsenses AS $index=>$one) { ?>

					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">

						<td><?php echo $one['id']; ?></td>

						<td><img src="<?php echo team_image($one['image']); ?>" width="200"></td>

						<td><?php echo $one['order_sort']; ?></td>

						<td><?php echo $one['name']; ?></td>

						<td><?php echo $one['url']; ?></td>
                        
                        <td><?php echo $one['display']; ?></td>
                        
                        <td><?php echo $ads_position[$one['pos_ads']]; ?></td>
                        

					<td class="op" nowrap><a href="/manage/adsense/position.php?action=edit&id=<?php echo $one['id']; ?>">Sửa</a> | <a href="/ajax/manage.php?action=adsremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Bạn có chắc muốn xóa thông tin trình ảnh này?">xóa</a></td>

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