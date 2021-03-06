<?php include template("manage_header");?>
<script language=Javascript>
function Inint_AJAX() {
	try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
	try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
	try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
	alert("XMLHttpRequest not supported");
	return null;
};

function dochange(src, val) {
 	var req = Inint_AJAX();
 	req.onreadystatechange = function () {
      if (req.readyState==4) {
           if (req.status==200) {
                document.getElementById(src).innerHTML=req.responseText;
           }
      }
 };
 req.open("GET", "/ajax/cate.php?type="+src+"&id="+val);
 req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
 req.send(null);
}
</script>
<script language="javascript">
 $(document).ready(function() {
  $('#parent').change(function(){
   	giatri = this.value;
   	$('#group_pid').load('/ajax/cate2.php?type=child&id=' + giatri);
  });
  $('#group_pid').change(function(){
   	giatri = this.value; 
   	$('#group_id').load('/ajax/cate2.php?type=subchild&id=' + giatri);
  });
 });
</script>
<div id="bdw" class="bdw">

<div id="bd" class="cf">

<div id="leader">

	<div class="dashboard" id="dashboard"><ul><?php echo mcurrent_team('edit'); ?></ul></div>

	<div id="content" class="clear mainwide">

        <div class="clear box">

            <div class="box-top"></div>

            <div class="box-content">

                <div class="head">

				<?php if($team['id']){?>

					<h2>Chỉnh sửa</h2>

					<ul class="filter"><?php echo current_manageteam('edit', $team['id']); ?></ul>

				<?php } else { ?>

					<h2>Thêm mới</h2>

				<?php }?>

				</div>

                <div class="sect">

				<form id="-user-form" method="post" action="/manage/team/edit.php?id=<?php echo $team['id']; ?>" enctype="multipart/form-data" class="validator">

					<input type="hidden" name="id" value="<?php echo $team['id']; ?>" />

					<div class="wholetip clear"><h3>1. Thông tin cơ bản</h3></div>

					<div class="field">

						<label>Danh mục</label>

						<select id="parent" name="group_ppid" class="f-input" style="width:160px;">
                        	<?php echo Utility::Option($roots, $team['group_ppid'],'--chọn danh mục--'); ?>
                      	</select>
						<?php if($team['id']){?>
						<span id="child">                       
                        	<select name="group_pid" id="group_pid" class="f-input" style="width:160px;">
                            <?php echo Utility::Option($childs, $team['group_pid'],'--danh mục con--'); ?>
                            </select>
                       	</span>
						<?php } else { ?>
						<span id="child">                       
                        	<select name="group_pid" id="group_pid" class="f-input" style="width:160px;">
                            <option value="">--chọn danh mục--</option>
                            </select>
                       	</span>
						<?php }?>
                       
					</div>

					
                    
					<div class="field">

						<label>Tên sản phẩm</label>

						<input type="text" size="30" name="product" id="team-create-product" class="f-input" value="<?php echo $team['product']; ?>" datatype="require" require="true" />

					</div>
                    
					<div class="field">

						<label>Mô tả deal</label>

						<input type="text" size="30" name="title" id="team-create-title" class="f-input" value="<?php echo htmlspecialchars($team['title']); ?>" datatype="require" require="true" style="width:670px;" />

					</div>
					<div class="field">

						<label>Tags</label>

						<input type="text" size="30" name="tag" id="team-create-tag" class="f-input" value="<?php echo htmlspecialchars($team['tag']); ?>" datatype="require" require="true" style="width:670px;" />
					
					</div>
                    <div class="field">
                    
                        <label>Hình thức giao</label>
                        <?php if($team['delivery_type']=='product'){?>
                        <input type="radio" checked="checked" value="product" name="delivery_type">Giao sản phẩm
                        <input type="radio" value="voucher" name="delivery_type">Giao voucher
                        <?php } else { ?>
                        <input type="radio" value="product" name="delivery_type">Giao sản phẩm
                        <input type="radio" checked="checked" value="voucher" name="delivery_type">Giao voucher
                        <?php }?>
						
                   	</div>
                    <div class="field">
						<label>Deal HOT</label>
						<input  type="checkbox" name='hot' <?php echo $team['hot']?'checked' : ''; ?> />&nbsp;(check là có)
					</div>
					<div style="background: #FFFFBF;float: left;width: 100%;">
					<div class="field">

						<label>Giá gốc</label>

						<input type="text" size="10" name="market_price" id="team-create-market-price" class="number" value="<?php echo moneyit($team['market_price']); ?>" datatype="money" require="true" />

						<label>Giá giảm</label>

						<input type="text" size="10" name="team_price" id="team-create-team-price" class="number" value="<?php echo moneyit($team['team_price']); ?>" datatype="double" require="true" />

					
					</div>					
					
					
                    
					</div>
		
                    </div>
                    
					<div class="act"><input type="submit" value="Lưu" name="commit" id="leader-submit" class="formbutton" /></div>
                 

					<div class="field">

						<label>Điểm nổi bật</label>

						<div style="float:left; width: 80%;"><?php echo $notice; ?></div>


					</div>                    


					<input type="hidden" name="guarantee" value="Y" />

					<input type="hidden" name="system" value="Y" />

					<div class="wholetip clear"><h3>2. Thông tin deal</h3></div>

					<div class="field">

						<label>Đối tác</label>

						<select name="partner_id" datatype="require" require="require" class="f-input" style="width:200px;"><?php echo Utility::Option($partners, $team['partner_id'], '--chọn đối tác--'); ?></select><span class="inputtip">Đây chỉ là tuỳ chọn</span>

					</div>
                    
					<div class="field">
						<label>Ảnh sản phẩm</label>
						<input type="file" size="30" name="upload_image" id="team-create-image" cclass="f-input" style="width:287px;" />

						<?php if($team['image']){?><span class="hint"><?php echo team_image($team['image']); ?></span><?php }?>

					</div>
					<div class="field">

						<label>Ảnh sản phẩm 1</label>

						<input type="file" size="30" name="upload_image1" id="team-create-image1" class="f-input" style="width:287px;" />

						<?php if($team['image1']){?>
                        <span class="hint" id="team_image_1"><?php echo team_image($team['image1']); ?>&nbsp;&nbsp;<a href="javascript:;" onclick="X.team.imageremove(<?php echo $team['id']; ?>, 1);">delete</a></span>
                        <?php }?>

					</div>

					<div class="field">

						<label>Ảnh sản phẩm 2</label>

						<input type="file" size="30" name="upload_image2" id="team-create-image2" class="f-input" />

						<?php if($team['image2']){?>
                        <span class="hint" id="team_image_2"><?php echo team_image($team['image2']); ?>&nbsp;&nbsp;<a href="javascript:;" onclick="X.team.imageremove(<?php echo $team['id']; ?>, 2);">delete</a></span>
                        <?php }?>

					</div>

					<!-- them hinh cho deal 4-5 -->

					<div class="field">

						<label>Ảnh sản phẩm 3</label>

						<input type="file" size="30" name="upload_image3" id="team-create-image3" class="f-input" style="width:287px;" />

						<?php if($team['image3']){?>
                        <span class="hint" id="team_image_3"><?php echo team_image($team['image3']); ?>&nbsp;&nbsp;<a href="javascript:;" onclick="X.team.imageremove(<?php echo $team['id']; ?>, 3);">xóa</a></span>
                        <?php }?>

					</div>

					<div class="field">

						<label>Ảnh sản phẩm 4</label>

						<input type="file" size="30" name="upload_image4" id="team-create-image4" class="f-input" />

						<?php if($team['image4']){?>
                        <span class="hint" id="team_image_4"><?php echo team_image($team['image4']); ?>&nbsp;&nbsp;<a href="javascript:;" onclick="X.team.imageremove(<?php echo $team['id']; ?>, 4);">xóa</a>
                        <?php }?>

					</div>										
					<div class="field">

						<label>Ảnh sản phẩm 5</label>

						<input type="file" size="30" name="upload_image15" id="team-create-image15" class="f-input" />

						<?php if($team['image15']){?>
                        <span class="hint" id="team_image_15"><?php echo team_image($team['image15']); ?>&nbsp;&nbsp;<a href="javascript:;" onclick="X.team.imageremove(<?php echo $team['id']; ?>, 15);">xóa</a>
                        <?php }?>

					</div>	
					<!-- end -->		

					
						
						
					<div class="act"><input type="submit" value="Lưu" name="commit" id="leader-submit" class="formbutton" /></div>
					<div class="field">

						<label>Thông tin chi tiết</label>

						<div style="float:left; width: 80%;"><?php echo $detail; ?></div>

					</div>

					<div class="wholetip clear"><h3>3. Thông tin SEO</h3></div>
                    
					<div class="field">
						<label>SEO Tiêu đề</label>
						<input type="text" size="30" name="seo_title" id="team-create-title" class="f-input" value="<?php echo $team['seo_title']; ?>" />
					</div>
					<div class="field">
						<label>SEO từ khoá</label>
						<input type="text" size="30" name="seo_keyword" id="team-create-keyword" class="f-input" value="<?php echo $team['seo_keyword']; ?>" />
					</div>
					<div class="field">
						<label>SEO mô tả</label>
						<div style="float:left;"><textarea cols="45" rows="5" name="seo_description" id="team-create-description" class="f-textarea"><?php echo htmlspecialchars($team['seo_description']); ?></textarea></div>
					</div>
                 
					<div class="act"><input type="submit" value="Lưu" name="commit" id="leader-submit" class="formbutton" /></div>

				</form>

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



<script type="text/javascript">

window.x_init_hook_teamchangetype = function(){

	X.team.changetype("<?php echo $team['team_type']; ?>");

};

window.x_init_hook_page = function() {

	X.team.imageremovecall = function(v) {

		jQuery('#team_image_'+v).remove();

	};

	X.team.imageremove = function(id, v) {

		return !X.get(WEB_ROOT + '/ajax/misc.php?action=imageremove&id='+id+'&v='+v);

	};

};

</script>

<?php include template("manage_footer");?>

