var host = $('#host').val();
$(".weui-date-brq div").each(function(i){
	$(this).click(function(){
		$('.in_date').parent('div').html($('.in_date').html());
		$(this).html('<span  date="'+i+'" class="in_date">'+$(this).text()+'</span>');
		//取预约数据
		var coach_id = $('.tabBox').attr('coach');
		
		$.get(host+'index.php/order/get_schedule_by_date',{coach_id:coach_id,data_num:i},function(content){
			$('.tabBox').html(content);
		});
	});
});

$('.tabBox').on('click','.yy_true',function(){
	var time_num = $(this).attr('time');
	var date_num = $('.in_date').attr('date');
	var coach_id = $('.tabBox').attr('coach');
	var course_id = $('.tabBox').attr('course');
	
	var url = host+"index.php/order/confirm?coach_id="+coach_id+"&date_num="+date_num+"&time_num="+time_num;
	window.location.href=url;
});



$('.people_num a').each(function(i){
	$(this).click(function(){
		$(this).addClass('on').siblings().removeClass('on');
		$('#people_num').val(i+1);
		var total_price = parseInt($("input[name='price']").val()) * (i+1);
		$('.total_price').html(total_price+'元');
		$('.pay-money').html(total_price+'元');
	});
});
