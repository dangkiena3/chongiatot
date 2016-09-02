<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="help">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_misc('index'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>Trang quản trị website</h2>
				</div>
                <div class="sect">
					<div class="wholetip clear"><h3>Thống kê hôm nay</h3></div>
					<div style="margin:0 20px;">
						<p>Người dùng đăng ký mới: <b><?php echo $user_today_count; ?></b></p>
						<p>Số đơn hàng: <b><?php echo $order_today_count; ?></b></p>
						<p>Số lượng SP: <b><?php echo $order_num_today; ?></b></p>
						<p>Mới đặt:<b><?php echo $moidat; ?></b> | Đã xác nhận:<b><?php echo $xacnhan; ?></b> | Đang giao:<b><?php echo $dangiao; ?></b> | Đã giao:<b><?php echo $dagiao; ?></b> | Đã hủy:<b><?php echo $huy; ?></b></p>
					</div>
					<div class="wholetip clear"><h3>Thông kê chung</h3></div>
					<div style="margin:0 20px;">
						<p>Tổng số sản phẩm là <b><?php echo $team_count; ?></b></p>
						<p>Tổng số người dùng đăng ký là <b><?php echo $user_count; ?></b></p>
						<p>Tổng số đơn hàng là <b><?php echo $order_count; ?></b></p>
						<p>Tổng số email đăng ký nhận tin khuyến mãi mỗi ngày là <b><?php echo $subscribe_count; ?></b> người</p>
					</div>
				</div>
			</div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("manage_footer");?>
