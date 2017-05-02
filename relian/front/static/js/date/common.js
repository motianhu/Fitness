// JavaScript Document
$(function(){
	//日历函数，用来设置生日里面的日历
	$('#star_data,#end_data').datepicker({
		dateFormat:'yy-mm-dd',//设置日期的格式中文的一般是这个格式。
		dayNamesMin:['日','一','二','三','四','五','六'],//设置日历的周期格式，以短格式显示，并且汉化
		monthNames:['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],//设置日历的月份，汉化
		showWeek:true,//显示周，今天是周几
		weekHeader:['周'],//显示中文的周
		firstDay:1,//指定日历中的周是从哪一周开始的。
		showOtherMonths:true,//将本月没有的日期显示出来，但是是灰色的不可以用的。
	});
	
	//日历函数，用来设置生日里面的日历
	$('#star_month,#end_month').datepicker({
		dateFormat:'yy-mm',//设置日期的格式中文的一般是这个格式。
		dayNamesMin:['日','一','二','三','四','五','六'],//设置日历的周期格式，以短格式显示，并且汉化
		monthNames:['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],//设置日历的月份，汉化
		showWeek:true,//显示周，今天是周几
		weekHeader:['周'],//显示中文的周
		firstDay:1,//指定日历中的周是从哪一周开始的。
		showOtherMonths:true,//将本月没有的日期显示出来，但是是灰色的不可以用的。
	});	

	//给头部nav导航条添加点击后的背景
	$('.nav ul li a').click(function(){
		$(this).addClass('nav_selected').parents().siblings().children().removeClass('nav_selected');
	})
	//给左侧的菜单栏添加点击之后的样式。
	$('.menu_span').click(function(){
		$(this).addClass('selected').parent().siblings().children().removeClass('selected');
	})
	$('.menu_span').toggle(function(){
		$(this).siblings().hide();
	},function(){
		$(this).siblings().show();
	});
	//分页功能样式设置
	//点击数字的时候设置分页的样式
	var index=0;
	var page_list_em=$('.page_list em');
	$('.page_list em').click(function(){
		index=$('.page_list em').index(this);
		$(this).addClass('page_selected').siblings().removeClass('page_selected'); 
	});
	//点击上一页的时候设置分页的样式
	$('.page_prev').click(function(){
		if(index == 0){
			return;
		}else{
			$('.page_list em').eq(index).removeClass('page_selected').prev().addClass('page_selected');
			index--;
		}
	})
	//点击下一页的时候设置分页的样式
	$('.page_next').click(function(){
		if(index < page_list_em.length-1){
			$('.page_list em').eq(index).removeClass('page_selected').next().addClass('page_selected');
			index++;	
		}else{
			return;
		}
	})
	//当选择跳转页面时的代码样式
	$("#goto_page").click(function(){
		for(var j=1; j <= page_list_em.length; j++){
			var goto_page_num = parseInt($("#goto_page_num").val());
			if(j = goto_page_num){
				var page_num = j - 1;
				$('.page_list em').eq(page_num).addClass('page_selected').siblings().removeClass('page_selected');
				index = page_num;//这里一定要注意把全局变量index赋值
				return;
			}
		}
	});

})
