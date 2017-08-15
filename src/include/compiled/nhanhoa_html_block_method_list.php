<?php if(is_array($methods)){foreach($methods AS $one) { ?>
<li>
    <div class="thanhtoan_col1">
        <span class="thanhtoan_ico">
            <img src="/include/template/<?php echo $INI['skin']['template']; ?>/css/images/<?php echo $one['linkimg']; ?>" title="<?php echo $one['name']; ?>" alt="<?php echo $one['name']; ?>">
        </span>
    </div>
    <div class="thanhtoan_col2">
		<span class="thanhtoan_check">
            <input type="radio" value="<?php echo $one['id']; ?>" class="thanhtoan_radio" name="PayMenthod" id="rdPaymentMenthod_<?php echo $one['id']; ?>" checked="checked">
        </span>
        <span class="thanhtoan_title"><?php echo $one['name']; ?></span>
        <span class="thanhtoan_viewdetail"><?php echo $one['desc']; ?></span>
    </div>
</li>
<?php }}?>
