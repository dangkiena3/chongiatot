<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="leader">
	<div class="dashboard" id="dashboard"><ul><?php echo mcurrent_team('team'); ?></ul></div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
				<?php if($team['id']){?>
					<h2>Sửa deal</h2>
					<ul class="filter"><?php echo current_manageteam('editzz', $team['id']); ?></ul>
				<?php } else { ?>
					<h2>Tạo deal mới</h2>
				<?php }?>
				</div>
                <div class="sect">
				<form id="-user-form" method="post" action="/manage/team/editzz.php?id=<?php echo $team['id']; ?>" enctype="multipart/form-data" class="validator">
					<input type="hidden" name="id" value="<?php echo $team['id']; ?>" />
					<div class="wholetip clear"><h3>1. Thông tin Zigzag</h3></div>
					<div class="field">
						<label>Sắp xếp</label>
						<input type="text" size="10" name="sort_order" id="team-create-sort_order" class="number" value="<?php echo $team['sort_order'] ? $team['sort_order'] : 0; ?>" datatype="number"/><span class="inputtip">Số càng lớn thì độ ưu tiên hiển thị càng cao.</span>
					</div>
					<div class="field">
						<label>Sử dụng thẻ</label>
						<input type="text" size="10" name="card" id="team-create-card" class="number" value="<?php echo moneyit($team['card']); ?>" require="true" datatype="money" />
						<span class="inputtip">Giá trị lớn nhất có thể mua hàng</span>
					</div>
					<div class="field">
						<label>Lời mời giảm giá</label>
						<input type="text" size="10" name="bonus" id="team-create-bonus" class="number" value="<?php echo moneyit($team['bonus']); ?>" require="true" datatype="money" />
						<span class="inputtip">Số tiền bạn nhận được khi mời bạn bè mua hàng</span>
					</div>
					<div class="field">
						<label>Giảm giá</label>
						<input type="text" size="10" name="credit" id="team-create-credit" class="number" value="<?php echo moneyit($team['credit']); ?>" datatype="money" require="true" />
						<span class="inputtip">Người tiêu dùng có được trong số dư tài khoản khi được giảm giá đơn vị là <?php echo $currency; ?></span>
					</div>
					<div class="field">
						<label>Số lượng mua sỉ</label>
						<input type="text" size="10" name="farefree" id="team-create-farefree" class="number" value="<?php echo intval($team['farefree']); ?>" maxLength="6" datatype="money" require="true" />
						<span class="inputtip">Số lượng mua mà người mua được giao hàng miễn phí</span>
					</div>
					<div class="act"><input type="submit" value="Xác nhận" name="commit" id="leader-submit" class="formbutton" /></div>
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

<?php include template("manage_footer");?>
