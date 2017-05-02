var first = 0;
var onTouch = $("#leftTabBox .hd .on").index();
TouchSlide({
	slideCell:"#leftTabBox",
	effect:"left",
	endFun:function(i,c){
		var tar = $("#leftTabBox .hd li:eq("+i+")");
		if(first > 0 && onTouch != i){
			tar.show().siblings('li').hide();
			$("#leftTabBox .hd li:eq("+onTouch+")").show();
			onTouch = $("#leftTabBox .hd .on").index();
		}
		first = 1;
	}
});

$('.con').each(function(i){
	$(this).click(function(){
		window.location.href=$(this).attr('_url');
	});
});



$('#course-area').on('click','.course_item',function(){
	var area_id = $(this).attr('key');
	window.location.href=$('#host').val()+'index.php/course/index/'+area_id
});

$('#course-item').on('click','.course_item',function(){
	var course_id  = $(this).attr('key');
	$('#s_course').html($(this).html());
	if(course_id > 0){
		$('.bd .t').each(function(){
			$(this).hide();
			var strs = new Array();
			strs = $(this).attr('course-id').split(',');
			for(i=0;i<strs.length;i++){
				if(strs[i] == course_id){
					$(this).show();
				}
			}
		});
	}else{
		$('.bd .t').show();
	}
});