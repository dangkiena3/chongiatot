<?php include template("manage_html_header");?>
<script type="text/javascript" src="/static/js/xheditor/xheditor.js"></script> 
<div id="hdw">
	<div id="hd">
		<div id="logo">
			<a href="/index.php" class="link" target="_blank">
				<?php if(empty($INI['system']['logourl'])){?>
				<img src="/img/w_logo.png" alt="<?php echo $INI['system']['sitename']; ?>" height="70" />
				<?php } else { ?>
				<img src="/include/template/<?php echo $INI['skin']['template']; ?>/css/images/<?php echo $INI['system']['logourl']; ?>" alt="<?php echo $INI['system']['sitename']; ?>" />
				<?php }?>
			</a>
        </div>
		<div class="guides">
			<div class="city">
				<h2>Trang quản trị</h2>
			</div>
			<div id="guides-city-change" class="change"><?php echo $login_user['realname']; ?></div>
		</div>
		<ul class="nav cf"><?php echo current_backend('super'); ?></ul>
		<?php if(is_manager()){?><div class="vcoupon">&raquo;&nbsp;<a href="/manage/logout.php">Đăng xuất</a></div><?php }?>
	</div>
</div>

<?php if($session_notice=Session::Get('notice',true)){?>
<div class="sysmsgw" id="sysmsg-success"><div class="sysmsg"><p><?php echo $session_notice; ?></p><span class="close">Đóng</span></div></div> 
<?php }?>
<?php if($session_notice=Session::Get('error',true)){?>
<div class="sysmsgw" id="sysmsg-error"><div class="sysmsg"><p><?php echo $session_notice; ?></p><span class="close">Đóng</span></div></div> 
<?php }?>
