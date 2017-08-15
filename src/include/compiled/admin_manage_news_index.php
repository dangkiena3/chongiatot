<?php include template("manage_header");?>

<div id="bdw" class="bdw">

<div id="bd" class="cf">

<div id="partner">

	<div id="content" class="clear mainwide">

        <div class="clear box">

            <div class="box-top"></div>

            <div class="box-content">

                <div class="head">
                  <h2>quản lý tin tức</h2></div>

                <div class="sect">

                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="validator">

                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

						<div class="wholetip clear"><h3>Xin điền đầy đủ thông tin</h3></div>
                        
                        <div class="field">
                        	<label>Chuyên mục</label>
                            <select name="cate_id_info" class="f-city"><?php echo Utility::Option($cate_news, $getnews['cate_id']); ?></select>
                        </div>
                        <div class="field">
                        	<label>Tiêu đề</label>
                            <input type="text" name="title_info" value="<?php echo $getnews['title']; ?>" require="true" datatype="require" class="f-input" style="width:608px;" />
                        </div>
                        <div class="field">
                        	<label>Mô tả</label>
                        	<textarea style="width:600px; height:70px;" name="news_desc_info" class="f-textarea"><?php echo htmlspecialchars($getnews['news_desc']); ?></textarea>
                        </div>
                        
                       	<div class="field">

                            <label>Ảnh đại diện</label>

                            <input type="file" size="30" name="upload_image_info" id="news-image-upload" class="f-input" />

                            <?php if (!empty($getnews['image'])); ?> <?php echo $getnews['image']; ?>

                        </div>                        

                        <div class="field">
                        
                            <label>Chi tiết</label>
                            
                            <div style="width: 80%; float:left;"><?php echo $detail; ?></div>
                            
                        </div>

  	                    <div class="field">

                            <label>Sắp xếp</label>

                            <input type="text" size="3" name="sort_order_info" value="<?php echo $getnews['sort_order']; ?>" require="true" datatype="require" maxLength="3" class="f-input" style="width:100px;" />

                            <span class="inputtip"><font color="red">Số càng lớn thì độ ưu tiên càng cao</font></span>

                        </div>
                        
  	                    <div class="field">

                            <label>Từ khóa</label>

                            <input type="text" size="128" name="keyword_s_info" value="<?php echo $getnews['keyword_s']; ?>" require="true" datatype="require" maxLength="128" class="f-input" style="width:400px;" />

                            <span class="inputtip"><font color="red">Các từ khóa cách nhau dấu , hoặc ;</font></span>

                        </div>  

                        <div class="field">
                        	<label>Hiển thị</label>
                            <?php if($getnews['display']='Y'){?>
                        	<input type="radio" checked="checked" value="Y" name="display_info">Có
                        	<input type="radio" value="N" name="display_info">không
                            <?php } else { ?>
                            <input type="radio" value="Y" name="display_info">Có
                        	<input type="radio" checked="checked" value="N" name="display_info">không
                            <?php }?>

                        </div>                        
                        <div class="act">

                            <input type="submit" value="Thêm mới" name="createnew" class="formbutton"/>

                            <input type="submit" value="Sửa" name="edit" class="formbutton"/>

                            <input type="reset" value="Làm lại" id="clear" name="clear" class="formbutton"/>

                        </div>

                    </form>

                    <table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">

					<tr class="forum_title_tr"><th>ID</th><th>Sắp xếp</th><th width="120">Ảnh</th><th width="300">Tiêu đề/mô tả</th>
					<th width="120" nowrap>Chuyên mục</th>
                    <th width="150" nowrap>Ngày tạo</th>
					<th width="50">Hiển thị</th><th width="80">Thao tác</th></tr>

					<?php if(is_array($newss)){foreach($newss AS $news=>$one) { ?>

					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">

						<td><?php echo $one['id']; ?></td>
                        
						<td><?php echo $one['sort_order']; ?></td>
                        
                     	<td><img src="/static/<?php echo $one['image']; ?>" width="120" height="80"></td>

						<td><span style="font-weight:bold"><?php echo $one['title']; ?></span><br /><span style="font-style:italic"><?php echo $one['news_desc']; ?></span></td>

						<td><?php echo get_name_cates($one['cate_id']); ?></td>
                        
                        <td><?php echo date('H:i, d-m-Y',$one['create_time']); ?></td>
                        
                        <td><?php echo $one['display']; ?></td>

					<td class="op" nowrap><a href="/manage/news/index.php?action=edit&id=<?php echo $one['id']; ?>">Sửa</a> | <a href="/ajax/manage.php?action=newsremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Are you sure delete this news item?">xoá</a></td>

					</tr>

					<?php }}?>

					<tr><td colspan="8"><?php echo $pagestring; ?></tr>						

                    </table>

                </div>

            </div>

            <div class="box-bottom"></div>

        </div>

	</div>


</div>

</div> <!-- bd end -->

</div> <!-- bdw end -->

<?php include template("manage_footer");?>