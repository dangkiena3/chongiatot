<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi-vn" lang="vi-vn" dir="ltr"> 
<head> 
<title>Lỗi truy cập phát sinh...</title>
<meta http-equiv=content-type content="text/html; charset=UTF-8" /> 
<link rel="stylesheet" href="/App/templates/system/css/error.css" type="text/css" /> 
<style>
* {
	font-family: helvetica, arial, sans-serif;
	font-size: 12px;
	color: #5F6565;
}

html {
	height: 100%;
	margin-bottom: 1px;
}

body {
	margin: 0px;
	padding: 0px;
	height: 100%;
	margin-bottom: 1px;
	background: #FFFFFF;
	font-family: helvetica, arial, sans-serif;
	font-weight: normal;
	padding-top: 0px;
	margin-top: 0px;
}

table, td, th, div, pre, blockquote, ul, ol, dl, address,.componentheading,.contentheading,.contentpagetitle,.sectiontableheader,.newsfeedheading {
	font-family: helvetica, arial, sans-serif;
	font-weight: normal;
}

#outline {
	width: 814px;
	margin: 0px;
	padding: 0px;
	padding-top: 60px;
	padding-bottom: 60px;
	background: #FFFFFF;
}
#errorboxoutline {
	width: 600px;
	margin: 0px;
	padding: 0px;
	border: 1px solid #000000;
}
#errorboxheader {
	width: 600px;
	margin: 0px;
	padding: 0px;
	background: #8C1515;
	color: #FFFFFF;
	font-weight: bold;
	font-size: 12px;
	line-height: 22px;
	text-align: center;
	border-bottom: 1px solid #000000;
}
#errorboxbody {
	margin: 0px;
	padding: 10px;
	text-align: left;
}
#techinfo {
	margin: 10px;
	padding: 10px;
	text-align: left;
	border: 1px solid #CCCCCC;
	color: #CCCCCC;
}
#techinfo p {
	color: #CCCCCC;
}
</style>
</head> 
<body> 
<?php
$code	=	$_REQUEST['code'];
if(!empty($code) && $code=='404') // get code 404 khong tim thay
{
	$errorCode	=	"404";
	$errorMessager	=	"Không tìm thấy trang";
	$errorDescript	=	"
		<div id='errorboxbody'> 
			<p><strong>Bạn không có khả năng truy cập trang này vì:</strong></p> 
				<ol> 
					<li>Một <strong>mục đánh dấu/ưa thích quá cũ</strong></li> 
					<li>Một công cụ tìm kiếm đã <strong>quá cũ</strong></li> 
					<li><strong>Gõ sai địa chỉ</strong></li> 
					<li>Bạn không có quyền truy cập trang này</li> 
					<li>Tài nguyên được yêu cầu <strong>không được tìm thấy</strong></li> 
					<li>Một lỗi đã xảy ra khi thực hiện yêu cầu của bạn.</li> 
				</ol> 
			<p><strong>Xin hãy thử một trong những trang sau:</strong></p> 
			<p> 
				<ul> 
					<li><a href='../' title='Đến trang chủ'>Trang chủ</a></li> 
				</ul> 
			</p> 
			<p>Nếu tình trạng diễn ra tiếp tục, hãy liên hệ vói người quản trị hệ thống của trang web!</p> 
			<div id='techinfo'> 
			<p>Không tim thấy trang này</p> 
			<p> 
			</p> 
			</div> 
			</div> 
	";
	?>
	<div align="center"> 
		<div id="outline"> 
			<div id="errorboxoutline"> 
				<div id="errorboxheader"><?php echo $errorCode ?> - <?php echo $errorMessager ?></div> 
				<?php  echo $errorDescript ?>
			</div>
		</div>
	</div>
<?php }?>
<?php 
if(!empty($code) && $code=='401') // can chung thuc user & pass
{
	$errorCode	=	'401';
	$errorMessager	=	'Tài nguyên cần chứng thực người dùng';
	$errorDescript	=	""; 
	?>
	<div align="center"> 
		<div id="outline"> 
			<div id="errorboxoutline"> 
				<div id="errorboxheader"><?php echo $errorCode ?> - <?php echo $errorMessager ?></div> 
				<?php  echo $errorDescript ?>
			</div>
		</div>
	</div>
<?php } ?>
<?php 
if(!empty($code) && $code=='403') // can chung thuc user & pass
{
	$errorCode	=	'403';
	$errorMessager	=	'Quyền truy cập bị giới hạn';
	$errorDescript	=	"Bạn không có quyền truy cập vào khu vực này."; 
	?>
	<div align="center"> 
		<div id="outline"> 
			<div id="errorboxoutline"> 
				<div id="errorboxheader"><?php echo $errorCode ?> - <?php echo $errorMessager ?></div>
					<div id='errorboxbody'> 
						<?php  echo $errorDescript ?>
					</div>
			</div>
		</div>
	</div>
<?php } ?>
<?php 
if(!empty($code) && $code=='500') // can chung thuc user & pass
{
	$errorCode	=	'500';
	$errorMessager	=	'Server cấu hình sai ???';
	$errorDescript	=	"Có thể thông số cấu hình của server bị sai<br>Hãy liên hệ đến webmaster để chúng tôi khắc phục lổi này."; 
	?>
	<div align="center"> 
		<div id="outline"> 
			<div id="errorboxoutline"> 
				<div id="errorboxheader"><?php echo $errorCode ?> - <?php echo $errorMessager ?></div>
					<div id='errorboxbody'> 
						<?php  echo $errorDescript ?>
					</div>
			</div>
		</div>
	</div>
<?php } ?>
</body></html>