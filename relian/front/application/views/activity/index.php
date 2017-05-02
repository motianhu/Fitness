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
</head>
<body>
<div class="container" id="container">
	<div class="page tabbar js_show">
	    <div class="page__bd" style="height: 100%;">
	        <div class="weui-tab">
		            <div class="weui-tab__panel">
						<div class="weui-tab_banner">
							<img alt="" src="<?php echo base_url();?>static/img/hd1.png">
						</div>
						<div style="padding:6px;margin-bottom:8px;">
							<div class="weui-tab_md">
								<img alt="" src="<?php echo base_url();?>static/img/hd2.png">
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
<script type="text/javascript" src="<?php echo base_url();?>/static/js/zepto.min.js"></script>
<script type="text/javascript" class="tabbar js_show">
    $(function(){
        $('.weui-tabbar__item').on('click', function () {
            $(this).addClass('weui-bar__item_on').siblings('.weui-bar__item_on').removeClass('weui-bar__item_on');
        }); 
    });
</script>
</body>
</html>