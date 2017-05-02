<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width,initial-scale=1,user-scalable=0">
<title>热炼私坊健身</title>
<link rel="stylesheet" href="<?php echo base_url();?>/static/css/weui.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>/static/css/example.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>/static/css/default.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>/static/css/style.css"/>
<style type="text/css">		
* {
	margin:0;
	padding:0;
	list-style:none;
}
body {
	background:#fff;
	font:normal 12px/22px 宋体;
	width:100%;
}
img {
	border:0;
}
a {
	text-decoration:none;
	color:#333;
}
a:hover {
	color:#1974A1;
}
#footer {
	text-align:center;
}
.fullSlide {
	width:100%;
	position:relative;
	height:66px;
	background:#000;
}
.fullSlide .bd {
	margin:0 auto;
	position:relative;
	z-index:0;
	overflow:hidden;
}
.fullSlide .bd ul {
	width:100% !important;
}
.fullSlide .bd li {
	width:100% !important;
	height:66px;
	overflow:hidden;
	text-align:center;
	background-size:contain !important;
}
.fullSlide .bd li a {
	display:block;
	height:66px;
}
.fullSlide .hd {
	width:100%;
	position:absolute;
	z-index:1;
	bottom:0;
	left:0;
	height:16px;
	line-height:30px;
}
.fullSlide .hd ul {
	text-align:center;
}
.fullSlide .hd ul li {
	cursor:pointer;
	display:inline-block;
	*display:inline;
	zoom:1;
    width: 8px;
    height: 8px;
    background: #ddd;
    border-radius: 100%;
	margin:1px;
	overflow:hidden;
	filter:alpha(opacity=50);
	opacity:0.5;
	line-height:999px;
}
.fullSlide .hd ul .on {
	background:#e25353;
}

</style>
</head>
<body>
<div class="container" id="container">
	<div class="page tabbar js_show">
	    <div class="page__bd" style="height: 100%;">
	        <div class="weui-tab">
		            <div class="weui-tab__panel">
						<div class="weui-tab_banner">
						<div class="fullSlide">
						  <div class="bd">
						    <ul>
						      <li style="background:url(<?php echo base_url();?>static/img/hdp.png) center 0 no-repeat;"><a href="<?php echo base_url();?>index.php/Activity/index"></a></li>
						      <li style="background:url(<?php echo base_url();?>static/img/hdp2.png) center 0 no-repeat;"><a href="<?php echo base_url();?>index.php/Activity/index"></a></li>
						    </ul>
						  </div>
						  <div class="hd">
						    <ul>
						    </ul>
						  </div>
						</div>
							<img alt="" src="<?php echo base_url();?>static/img/logo.png">
						</div>
						<div style="padding:6px;">
							<div class="weui-tab_md">
								<img alt="" src="<?php echo base_url();?>static/img/md1.png">
							</div>
							<div class="weui-tab_md">
								<img alt="" src="<?php echo base_url();?>static/img/md2.png">
							</div>
						</div>
		            </div>
	                <div class="weui-tabbar">
						<a href="javascript:;" class="weui-tabbar__item weui-bar__item_on">
							<p class="weui-tabbar__label">门店</p>
						</a>
						<a href="<?php echo base_url();?>index.php/Course" class="weui-tabbar__item">
							<p class="weui-tabbar__label">课程</p>
						</a>
						<a href="<?php echo base_url();?>index.php/Order" class="weui-tabbar__item">
							<p class="weui-tabbar__label">我的预约</p>
						</a>
						<a href="<?php echo base_url();?>index.php/Card" class="weui-tabbar__item">           
							<p class="weui-tabbar__label">会员卡</p>
						</a>
					</div>
	        </div>
	    </div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>/static/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/static/js/superslide.2.1.js"></script>
<script type="text/javascript">
	$(".fullSlide").hover(function() {
	    jQuery(this).find(".prev,.next").stop(true, true).fadeTo("show", 0.5)
	},
	function() {
	    $(this).find(".prev,.next").fadeOut()
	});
	$(".fullSlide").slide({
	    titCell: ".hd ul",
	    mainCell: ".bd ul",
	    effect: "fold",
	    autoPlay: true,
	    autoPage: true,
	    trigger: "click",
	    startFun: function(i) {
	        var curLi = jQuery(".fullSlide .bd li").eq(i);
	        if ( !! curLi.attr("_src")) {
	            curLi.css("background-image", curLi.attr("_src")).removeAttr("_src")
	        }
	    }
	});
	
    $(function(){
        $('.weui-tabbar__item').on('click', function () {
            $(this).addClass('weui-bar__item_on').siblings('.weui-bar__item_on').removeClass('weui-bar__item_on');
        });
        $('.weui-tab_md').each(function(i){
			$(this).click(function(){
				window.location.href="<?php echo base_url();?>index.php/Store/detail/"+i;
			});
        });
    });
</script>
</body>
</html>