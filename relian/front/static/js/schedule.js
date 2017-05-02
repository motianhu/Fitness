//更改分店
$('#store').change(function(){
	var store_id = $('#store').val();
	var coach_url = $('#coach').attr('url')+store_id;
	
	if(store_id){
		$.getJSON(coach_url,function(data){
			var html = '<option></option>';
			if($.isEmptyObject(data)){
				alert("未获取到门店教练列表.");
			}else{
				$.each(data,function(index,value){
					html = html + "<option value='"+value.admin_id+"'>"+value.name+"</option>";
				});
			}
			$('#coach').html(html);
		});
	}else{
		$('coach').empty();
	}	
});

//更改教练，更新数据
$('#coach').change(function(){
	var d = new Date();
	var newdate = d.getFullYear()+"-" + (d.getMonth()+1) + "-" + d.getDate();
	$('#start_date').val(newdate);
	
	$('.frq').each(function(i){
		var c = new Date(newdate);
		c.setTime(c.getTime()+24*60*60*1000*i);
		$(this).val(c.getFullYear()+"-" + (c.getMonth()+1) + "-" + c.getDate());
		if(i == 0){
			//不可设置当天各当天以前的课程
			$(this).parent().parent().find("input[type='checkbox']").prop("disabled", true);
		}
	});
	change_schedule(newdate);
})

//默认当天开始
$('.frq').each(function(i){
	var d = new Date();
	d.setTime(d.getTime()+24*60*60*1000*i);
	$(this).val(d.getFullYear()+"-" + (d.getMonth()+1) + "-" + d.getDate());
	if(i == 0){
		//不可设置当天各当天以前的课程
		$(this).parent().parent().find("input[type='checkbox']").prop("disabled", true);
	}
});
//更改开始日期,更新数据
function change_start_date(dp){
	var olddate = dp.cal.getDateStr();
	var newdate = dp.cal.getNewDateStr();
	var date = new Date();
	if(olddate != newdate){
		$('.frq').each(function(i){
			var d = new Date(newdate);
			d.setTime(d.getTime()+24*60*60*1000*i);
			//不可设置当天各当天以前的课程
			if(date.getTime() >= d.getTime()){
				$(this).parent().parent().find("input[type='checkbox']").prop("disabled", true);
			}else{
				$(this).parent().parent().find("input[type='checkbox']").prop("disabled", false);
			}
			$(this).val(d.getFullYear()+"-" + (d.getMonth()+1) + "-" + d.getDate());
		});
		change_schedule(newdate);
	}
}
//更新排课数据
function change_schedule(newdate){
	var store_id = $('#store').val();
	var coach_id = $('#coach').val();
	var date_url = $('#start_date').attr('url');

	$.getJSON(date_url,{store_id:store_id,coach_id:coach_id,start_date:newdate},function(data){
		$(".sep7 input[type='checkbox']").each(function(){
			$(this).prop('checked',false);
		});
		if( ! $.isEmptyObject(data)){
			$.each(data,function(index,value){
				$.each(value,function(i,v){
					var j = parseInt(index)+1;
					$("input[name='k"+j+"time[]']").each(function(){
						if($(this).val() == v.ktime){
							$(this).prop('checked',true);
						}
					});
				})
			});
		}
	});	
}
//全选
$('.select_all').click(function(){
	if($(this).is(':checked')) {
		$(this).next('.checkbox').find('input').prop("checked", true);
	}else{
		$(this).next('.checkbox').find('input').prop("checked", false);
	}
});