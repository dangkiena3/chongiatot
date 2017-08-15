<?php 
    	$adTops = DB::LimitQuery('adsense', array(
        	'condition' => array('display'=>'Y', 'pos_ads'=>'bannertop'),
            'order' => 'ORDER BY order_sort ASC, id DESC',
        ));
    ; ?>

<div class="best_of_best_deal">
    <div class="bob_content" id="slider">
	<a href="javascript:void(0)" class="bob_btn bob_prev" id="bob_prev"></a>
            <a href="javascript:void(0)" class="bob_btn bob_next" id="bob_next"></a>
        <ul>
        	<?php if(is_array($adTops)){foreach($adTops AS $one) { ?>
            <li style="float: left;" class="lislider">
                <div class="dealItem">
                <a href="<?php echo $one['url']; ?>" target="_blank"><img src="<?php echo team_image($one['image']); ?>" alt="<?php echo $one['name']; ?>" height="305px" width="779px"/></a>
                </div>
            </li>
            <?php }}?>
        </ul>
    </div> 
    <script type="text/javascript">
        $(function () {
            $("#slider").easySlider({ auto: true, continuous: true, pause: 4000, speed: 500,
                prevId: 'bob_prev',
                prevText: '',
                nextId: 'bob_next',
                nextText: ''
            });
        });
    </script>
</div>