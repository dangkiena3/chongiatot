<div class="current-path wd">
	<a class="aHome" href="/mua-hang-gia-goc.html"></a>
	<p>
    <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
        <a href="<?php echo $INI['system']['wwwprefix']; ?>" itemprop="url">
            <span itemprop="title"><?php echo $INI['system']['abbreviation']; ?></span>
        </a>
    </span>
    &nbsp;&gt;&nbsp;
    <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
        <a href="/quen-mat-khau.html" itemprop="url">
            <span itemprop="title">Lấy lại mật khẩu</span>
        </a>
    </span>
</p>
	</div>
<div class="clear"></div>	
<div id="boxes">
    <div id="dialog" class="window">
        <div class="classic-popup">
            <div class="forgot-top">
                <span class="forgot-title">
                    Lấy lại mật khẩu
                </span>
               
            </div>
            <div class="huongdan">Vui lòng nhập email mà bạn đã dùng để đăng ký và nhận hướng dẫn thay đổi mật khẩu
            </div>
            <div class="forgotform">
                <form id="frmgetpass" name="frmgetpass" method="post">
                <div class="forgot-item">
                    <span class="forgot-item-title">Nhập Email:</span> 
                    <span class="forgot-item-input"><input id="tbxForGotEmail" value="" name="tbxForGotEmail" style="width: 370px;" type="text"/></span>
                </div>
                <div class="forgot-item">
                    <span class="forgot-item-title">Mã xác nhận:</span> 
                    <span class="forgot-item-input">
                        <input type="text" id="tbxForGotCaptcha" name="tbxForGotCaptcha" style="width: 220px;" maxlength="5" />
                    </span> 
                    <span class="cpt_img">
                    	<img id="cptGopYImg" alt="captcha" src="/captcha/captcha.php" title="Nhập mã xác nhận vào ô bên trái"/>
                        <img src="<?php echo $template_path; ?>/refreshcaptcha.png" alt="<?php echo $tenngan; ?> captcha" style="cursor:pointer;margin-top:7px;margin-left:5px;" id="btnRefreshFeedBackCaptcha"/>
                	</span>
                </div>
                </form>
                <div class="forgot-item">
                    <span class="forgot-item-title">&nbsp;</span> 
                    <span class="forgot-item-btn"><a href="#" class="btnv5 btn_send"></a></span>
                    <span class="fwaiting"><img alt="loading" src="/img/loading.gif"/></span>
                </div>
            </div>
        </div>
    </div>
</div>
