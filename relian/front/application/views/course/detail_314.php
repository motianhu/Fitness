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
<link rel="stylesheet" href="/static/css/weui.css"/>
<link rel="stylesheet" href="/static/css/example.css"/>
</head>
<body>
<div class="container" id="container">
	<div class="page article js_show">
	    <div class="page__bd" style="height: 100%;">
	        <div class="weui-tab">
	            <div class="weui-tab__panel">
					<article class="weui-article" style="height:100%;">
						<h1 style="background-color:#fff;text-align:center;padding:1em;">课程名称1(此页面待优化)</h1>
						<section style="background: #fff;height: 100%;overflow: scroll;padding:1em;">
							<p>
							作为一种非常古老的能量知识修炼方法，“瑜伽”并非只是一套流行或时髦的健身运动这么简单。现代人吸取其有益精华，发现瑜伽的好处不胜枚举。

瑜伽能加速新陈代谢，去除体内废物，形体修复、调理养颜从内及外，;瑜伽能带给你优雅气质、轻盈体态,提高人的内外在的气质；瑜伽能增强身体力量和肌体弹性，身体四肢均衡发展，使你变得越来越开朗、活力、身心愉悦; 瑜伽能预防和治疗各种身心相关的疾病，背痛、肩痛、颈痛、头痛、关节痛、失眠、消化系统紊乱、痛经、脱发等都有显著疗效;瑜伽能调节身心系统，改善血液环境，促进内分泌平衡，内在充满能量。
最重要的是：
瑜伽能消除烦恼——减压养心，释放身心，全身舒畅，心绪平静，冷静思考,达到修心养性的目的;
瑜伽能提高免疫力——增加血液循环，修复受损组织，使身体组织得到充分的营养;
瑜伽能集中注意力——是学生及压力人群提高学习及工作效率的最佳休息法、锻炼法；
瑜伽能让你跳出心灵的限制，从而更好地回归角色，并坦然迎接生活中的一切挑战。
增加活力，来处瑜伽对脑部与腺体的作用。
外观与心情的年轻：瑜伽减少面部皱纹，产生天然的“拉皮”效果。
活得更久：瑜伽影响所有长寿的条件，如脑部、腺体、脊柱与内部器官。
增加疾病抵抗力：瑜伽锻炼出一副健壮的体格，免疫能力也增加。这个加强的抵抗力可以对付从感冒到诸如癌症的各种严重病症。
改善视力与听力：正常的视力与听力主要是靠眼睛与耳朵得到良好的血液循环与神经传送。
心智情绪的改善：由于瑜伽使包括脑部在内的腺体神经系统产生回春效果，心智情绪自然会呈现积极状态。它使你更有自信，更热诚，而且比较乐观。每天的生活也会变得更有创意。
							</p>
						</section>
					</article>
	         	</div>
	             <div class="weui-tabbar">
						<a href="tel:88888888" class="weui-tabbar__item">
							<p class="weui-tabbar__label">团练</p>
						</a>
						<a href="tel:88888888" class="weui-tabbar__item weui-bar__item_on">
							<p class="weui-tabbar__label">私教</p>
						</a>
				</div>
	        </div>
	    </div>
	</div>
</div>
<script type="text/javascript" src="/static/js/zepto.min.js"></script>
<script type="text/javascript" class="js_show home">
    $(function(){
        var winH = $(window).height();
        var categorySpace = 10;

        $('.js_item').on('click', function(){
            var id = $(this).data('id');
            window.pageManager.go(id);
        });
        $('.js_category').on('click', function(){
            var $this = $(this),
                $inner = $this.next('.js_categoryInner'),
                $page = $this.parents('.page'),
                $parent = $(this).parent('li');
            var innerH = $inner.data('height');
            bear = $page;

            if(!innerH){
                $inner.css('height', 'auto');
                innerH = $inner.height();
                $inner.removeAttr('style');
                $inner.data('height', innerH);
            }

            if($parent.hasClass('js_show')){
                $parent.removeClass('js_show');
            }else{
                $parent.siblings().removeClass('js_show');

                $parent.addClass('js_show');
                if(this.offsetTop + this.offsetHeight + innerH > $page.scrollTop() + winH){
                    var scrollTop = this.offsetTop + this.offsetHeight + innerH - winH + categorySpace;

                    if(scrollTop > this.offsetTop){
                        scrollTop = this.offsetTop - categorySpace;
                    }

                    $page.scrollTop(scrollTop);
                }
            }
        });
    });</script>
</body>
</html>