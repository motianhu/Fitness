<?php $this->display('inc/header.html', array (
)); ?>
<form method="post" id="myform" action="<?php echo base_url() ; ?>order/complate">
<div class="container" id="container">
	<!--订单开始-->
	<div class="content">
		<div class="weui-confirm">
			请确认订单信息
		</div>
		<div class="confirm-item">
			<div class="item-left">课程:</div>
			<div class="item-right"><?php echo $this->_vars->course_name ; ?>（<?php echo $this->_vars->coach_name ; ?>）</div>
			<input type="hidden" name="coach_id" value="<?php echo $this->_vars->coach_id ; ?>" />
		</div>
		<div class="confirm-item">
			<div class="item-left">时间:</div>
			<div class="item-right"><?php echo $this->_vars->str_date ; ?> <?php echo $this->_vars->str_time ; ?></div>
			<input type="hidden" name="date_num" value="<?php echo $this->_vars->date_num ; ?>" />
			<input type="hidden" name="time_num" value="<?php echo $this->_vars->time_num ; ?>" />
		</div>
		<div class="confirm-item">
			<div class="item-left">地点:</div>
			<div class="item-right" style="font-size:0.12rem;"><?php echo $this->_vars->addr ; ?></div>
		</div>
		<div class="confirm-item">
			<div class="item-left">人数:</div>
			<div class="item-right people_num">
				<a href="javascript:void(0);" class="on">1人</a>
				<a href="javascript:void(0);">2人</a>
				<a href="javascript:void(0);">3人</a>
			</div>
			<input type="hidden" id="people_num" name="people_num" value="1" />
		</div>
		<div class="confirm-item count_item">
			<div class="item-left">总价:</div>
			<div class="item-right total_price"><?php echo $this->_vars->price ; ?>元</div>
			<input type="hidden" name="price" value="<?php echo $this->_vars->price ; ?>" />
		</div>
		<div class="yh_item">
			<div class="confirm-item">
				<div class="item-left">Fusion VIP折后价:</div>
				<div class="count-item-right ">尚未开通 ></div>
			</div>
			<div class="confirm-item">
				<div class="item-left">代金卷:</div>
				<div class="count-item-right">2张可用,点击选择 ></div>
				<input type="hidden" id="coupon_id" name="coupon_id" value="0" />
			</div>
			<div class="confirm-item item-bottom">
				<div class="item-left">还需支付:</div>
				<div class="count-item-right pay-money" style="font-size:4.76vw;"><?php echo $this->_vars->price ; ?>元</div>
			</div>
		</div>
		
		<div class="bottom_ts">
			温馨提示：开始时间前6小时取消预约，支持全额退款;开始时间6小时内不支持退款。
		</div>
	</div>
	<!--订单结束-->
</div>
<div class="weui-tabbar">
	<a href="javascript:void(0);" class="weui-btn weui-btn_primary">提交订单</a>
</div>
</form>
<script type="text/javascript" src="<?php echo base_url() ; ?>static/js/jquery.min.js"></script>
<?php if(isset($this->_vars->footerJs) && !empty($this->_vars->footerJs) ) {  ?>
<?php foreach($this->_vars->footerJs as $this->_vars->key => $this->_vars->value ) {  ?>
<script type="text/javascript" src="<?php echo base_url() ; ?>static/js/<?php echo $this->_vars->value ; ?>?v=2.3"></script>
<?php } ?>
<?php } ?>
<script type="text/javascript">
	$('.weui-btn_primary').click(function(){
		$('#myform').submit();
	});
</script>
</body>
</html>

