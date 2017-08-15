<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
	<?php if(!$pagetitle||$request_uri=='index'){?>
	<title><?php echo $INI['system']['sitetitle']; ?></title>
	<?php } else if($team) { ?>
	<title><?php echo $pagetitle; ?> <?php echo $team['seo_title']?' - '.$team['seo_title']:''; ?> - <?php echo $INI['system']['sitename']; ?></title>
	<?php } else { ?>
	<title><?php echo $pagetitle; ?> - <?php echo $INI['system']['sitename']; ?></title>
	<?php }?>
	<?php if($seo_description){?>
	<meta name="description" content="<?php echo $seo_description; ?>" />
	<?php } else if($teamid) { ?>
	<meta name="description" content="<?php echo $team['title']; ?>" />
	<?php } else { ?>
	<meta name="description" content="<?php echo $INI['system']['description']; ?>" />
	<?php }?>
	<?php if($seo_keyword){?>
	<meta name="keywords" content="<?php echo $seo_keyword; ?>" />
	<?php } else { ?>
	<meta name="keywords" content="<?php echo $INI['system']['keyword']; ?>" />
    <meta content="all" name="robots"/>
    <meta name="robots" content="all, index, follow"/>
	<meta name="author" content="NhanHoa Media" />
	<meta name="googlebot" content="all, index, follow"/>
	<?php }?>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<meta property="fb:admins" content="100001759460157">
	<meta property="fb:app_id" content="664560366934403"/>
	<link href="<?php echo $INI['system']['wwwprefix']; ?>/feed.php?ename=<?php echo $city['ename']; ?>" rel="alternate" title="subscription update" type="application/rss+xml" />
	<link rel="shortcut icon" href="/static/icon/favicon_mb.ico" />
    <link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/general.css" type="text/css" media="screen" charset="utf-8" />
	<?php if(!$pagetitle || $request_uri=='index'){?>
	<link rel="canonical" href="http://chongiatot.vn/"/>
	<?php } else if($team) { ?>
	<link rel="canonical" href="http://chongiatot.vn<?php echo rewrite_team_id($id); ?>"/>
	<?php } else { ?>
	<link rel="canonical" href="http://chongiatot.vn<?php echo $_SERVER['REQUEST_URI']; ?>"/>
	<?php }?>
	<script type="text/javascript">var WEB_ROOT = '<?php echo WEB_ROOT; ?>';</script>
	<script type="text/javascript">var LOGINUID = <?php echo abs(intval($login_user_id)); ?>;</script>
	<script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/general.js" type="text/javascript"></script>
	<script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/reg.js" type="text/javascript"></script>
    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/jquery.jcarousel.min.js" type="text/javascript"></script>
    <?php if($page_type=='login'){?>
	<script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/detail.js" type="text/javascript"></script>
	<?php }?>
    <?php if($page_type=='home'){?>
    <link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/home.css" type="text/css" media="screen" charset="utf-8" />
	<script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/home.js" type="text/javascript"></script>
    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/jcookie.js" type="text/javascript"></script>
   <?php }?>
    <?php if($page_type=='article'){?>
    <link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/article.css" type="text/css" media="screen" charset="utf-8" />
    <?php }?>
	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/reg.css" type="text/css" media="screen" charset="utf-8" />
    <?php if($page_type=='detail'){?>
	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/shipping.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/detail.css" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/nivo-slider.css" type="text/css" media="screen" charset="utf-8" />
	<script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/detail.js" type="text/javascript"></script>
	<script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/shipping.js" type="text/javascript"></script>
	<script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/jquery.nivo.slider.js" type="text/javascript"></script>
	<script type="text/javascript" src="/static/js/jquery.sticky-kit.min.js"></script>
	<script type="text/javascript" src="/static/jssor/jssor.core.js"></script>
    <script type="text/javascript" src="/static/jssor/jssor.utils.js"></script>
    <script type="text/javascript" src="/static/jssor/jssor.slider.js"></script>
	 <script>
        jssor_slider1_starter = function (containerId) {
            var _SlideshowTransitions = [
            //Zoom- in
            {$Duration: 1200, $Zoom: 1, $Easing: { $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseOutQuad }, $Opacity: 2 },
                //Zoom+ out
            {$Duration: 1000, $Zoom: 11, $SlideOut: true, $Easing: { $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 },
                //Rotate Zoom- in
            {$Duration: 1200, $Zoom: 1, $Rotate: true, $During: { $Zoom: [0.2, 0.8], $Rotate: [0.2, 0.8] }, $Easing: { $Zoom: $JssorEasing$.$EaseSwing, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseSwing }, $Opacity: 2, $Round: { $Rotate: 0.5} },
                //Rotate Zoom+ out
            {$Duration: 1000, $Zoom: 11, $Rotate: true, $SlideOut: true, $Easing: { $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.8} },

                //Zoom HDouble- in
            {$Duration: 1200, $Cols: 2, $Zoom: 1, $FlyDirection: 1, $Assembly: 2049, $ChessMode: { $Column: 15 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $ScaleHorizontal: 0.5, $Opacity: 2 },
                //Zoom HDouble+ out
            {$Duration: 1200, $Cols: 2, $Zoom: 21, $SlideOut: true, $FlyDirection: 1, $Assembly: 2049, $ChessMode: { $Column: 15 }, $Easing: { $Left: $JssorEasing$.$EaseInExpo, $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear }, $ScaleHorizontal: 4, $Opacity: 2 },

                //Rotate Zoom- in L
            {$Duration: 1200, $Zoom: 1, $Rotate: true, $During: { $Left: [0.2, 0.8], $Zoom: [0.2, 0.8], $Rotate: [0.2, 0.8] }, $FlyDirection: 1, $Easing: { $Left: $JssorEasing$.$EaseSwing, $Zoom: $JssorEasing$.$EaseSwing, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseSwing }, $ScaleHorizontal: 0.6, $Opacity: 2, $Round: { $Rotate: 0.5} },
                //Rotate Zoom+ out R
            {$Duration: 1000, $Zoom: 11, $Rotate: true, $SlideOut: true, $FlyDirection: 2, $Easing: { $Left: $JssorEasing$.$EaseInExpo, $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $ScaleHorizontal: 4, $Opacity: 2, $Round: { $Rotate: 0.8} },
                //Rotate Zoom- in R
            {$Duration: 1200, $Zoom: 1, $Rotate: true, $During: { $Left: [0.2, 0.8], $Zoom: [0.2, 0.8], $Rotate: [0.2, 0.8] }, $FlyDirection: 2, $Easing: { $Left: $JssorEasing$.$EaseSwing, $Zoom: $JssorEasing$.$EaseSwing, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseSwing }, $ScaleHorizontal: 0.6, $Opacity: 2, $Round: { $Rotate: 0.5} },
                //Rotate Zoom+ out L
            {$Duration: 1000, $Zoom: 11, $Rotate: true, $SlideOut: true, $FlyDirection: 1, $Easing: { $Left: $JssorEasing$.$EaseInExpo, $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $ScaleHorizontal: 4, $Opacity: 2, $Round: { $Rotate: 0.8} },

                //Rotate HDouble- in
            {$Duration: 1200, $Cols: 2, $Zoom: 1, $Rotate: true, $FlyDirection: 5, $Assembly: 2049, $ChessMode: { $Column: 15 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseOutQuad, $Rotate: $JssorEasing$.$EaseInCubic }, $ScaleHorizontal: 0.5, $ScaleVertical: 0.3, $Opacity: 2, $Round: { $Rotate: 0.7} },
                //Rotate HDouble- out
            {$Duration: 1000, $Cols: 2, $Zoom: 1, $Rotate: true, $SlideOut: true, $FlyDirection: 5, $Assembly: 2049, $ChessMode: { $Column: 15 }, $Easing: { $Left: $JssorEasing$.$EaseInExpo, $Top: $JssorEasing$.$EaseInExpo, $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $ScaleHorizontal: 0.5, $ScaleVertical: 0.3, $Opacity: 2, $Round: { $Rotate: 0.7} },
                //Rotate VFork in
            {$Duration: 1200, $Rows: 2, $Zoom: 11, $Rotate: true, $FlyDirection: 6, $Assembly: 2049, $ChessMode: { $Row: 28 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseOutQuad, $Rotate: $JssorEasing$.$EaseInCubic }, $ScaleHorizontal: 4, $ScaleVertical: 2, $Opacity: 2, $Round: { $Rotate: 0.7} },
                //Rotate HFork in
            {$Duration: 1200, $Cols: 2, $Zoom: 11, $Rotate: true, $FlyDirection: 5, $Assembly: 2049, $ChessMode: { $Column: 19 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseOutQuad, $Rotate: $JssorEasing$.$EaseInCubic }, $ScaleHorizontal: 1, $ScaleVertical: 2, $Opacity: 2, $Round: { $Rotate: 0.8} }
            ];

            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlayInterval: 1500,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 3,                                //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, default value is 3

                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 600,                                //Specifies default duration (swipe) for slide in milliseconds

                $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                    $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                    $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                    $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                    $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                },

                $DirectionNavigatorOptions: {                       //[Optional] Options to specify and enable direction navigator or not
                    $Class: $JssorDirectionNavigator$,              //[Requried] Class to create direction navigator instance
                    $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                },

                $ThumbnailNavigatorOptions: {                       //[Optional] Options to specify and enable thumbnail navigator or not
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange thumbnails, default value is 1
                    $SpacingX: 12,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $SpacingY: 10,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                    $DisplayPieces: 4,                             //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 156,                          //[Optional] The offset position to park thumbnail
                    $Orientation: 2                                //[Optional] Orientation to arrange thumbnails, 1 horizental, 2 vertical, default value is 1
                }
            };

            var jssor_slider1 = new $JssorSlider$(containerId, options);
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider1.$SetScaleWidth(Math.max(Math.min(parentWidth, 960), 300));
                else
                    $JssorUtils$.$Delay(ScaleSlider, 30);
            }

            ScaleSlider();
            $JssorUtils$.$AddEvent(window, "load", ScaleSlider);

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $JssorUtils$.$OnWindowResize(window, ScaleSlider);
            }
            //responsive code end
        };
    </script>

    <?php }?>
    <?php if($page_type=='cart'){?>
	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/giohang.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/thanhtoantip.css" type="text/css" media="screen" charset="utf-8" />
    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/giohang.js" type="text/javascript"></script>
    <?php }?>
    <?php if($page_type=='news'){?>
	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/news.css" type="text/css" media="screen" charset="utf-8" />
    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/news.js" type="text/javascript"></script>
    <?php }?>
    <?php if($page_type=='search'){?>
	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/search.css" type="text/css" media="screen" charset="utf-8" />
    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/search.js" type="text/javascript"></script>
    <?php }?>
    <?php if($page_type=='profile'){?>
	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/profile.css" type="text/css" media="screen" charset="utf-8" />
    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/profile.js" type="text/javascript"></script>
    <?php }?>
    <?php if($page_type=='wishlist'){?>
	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/wishlist.css" type="text/css" media="screen" charset="utf-8" />
    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/wishlist.js" type="text/javascript"></script>
   <?php }?>
    <?php if($page_type=='category'){?>
	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/category.css" type="text/css" media="screen" charset="utf-8" />
    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/category.js" type="text/javascript"></script>
    <?php }?>
    <?php if($page_type=='recent'){?>
	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/recent.css" type="text/css" media="screen" charset="utf-8" />
    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/recent.js" type="text/javascript"></script>
    <?php }?>
    <?php if($page_type=='checkout'){?>
	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/checkout.css" type="text/css" media="screen" charset="utf-8" />
    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/checkout.js" type="text/javascript"></script>
    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/checkout2.js" type="text/javascript"></script>
    <?php }?>
    <?php if($page_type=='updatepass'){?>
	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/updatepass.css" type="text/css" media="screen" charset="utf-8" />
    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/updatepass.js" type="text/javascript"></script>
    <?php }?>
    <?php if($page_type=='order_success'){?>
	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/tksman.css" type="text/css" media="screen" charset="utf-8" />
   <?php }?>
    <?php if($page_type=='myorder'){?>
	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/myorder.css" type="text/css" media="screen" charset="utf-8" />
   <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/myorder.js" type="text/javascript"></script>
    <?php }?>
    <?php if($page_type=='mymoney'){?>
	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/mymoney.css" type="text/css" media="screen" charset="utf-8" />
    <script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/mymoney.js" type="text/javascript"></script>
    <?php }?>
    <?php if($page_type=='vmarket'){?>
	<script src="/include/template/<?php echo $INI['skin']['template']; ?>/js/vmarket.js" type="text/javascript"></script>
	<link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/vmarket.css" type="text/css" media="screen" charset="utf-8" />
    <?php }?>
    <link rel="stylesheet" href="/include/template/<?php echo $INI['skin']['template']; ?>/css/sbottom_slider.css" type="text/css" media="screen" charset="utf-8" />
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-77710019-2', 'chongiatot.vn');
  ga('send', 'pageview');

</script>
	<?php echo Session::Get('script',true);; ?>
</head>
<body>
