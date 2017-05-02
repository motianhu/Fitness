<?php $this->display('inc/header.html', array (
)); ?>
<div class="container" id="container">
	<div class="order_detail">
		<div class="top_info">
			<div class="course-coach"><?php echo $this->_vars->course_name ; ?> (<?php echo $this->_vars->coach_name ; ?>)</div>
			<div class="date-time"><?php echo date('Y月m日',strtotime($this->_vars->date)) ; ?>  <?php echo $this->_vars->time ; ?>~<?php echo intval($this->_vars->time)+1 ; ?>:00</div>
		
			<div><img class="pic_persion" src="<?php echo $this->_vars->pic_persion ; ?>" /></div>
			<div class="store_name"><?php echo $this->_vars->store_name ; ?></div>
			<div class="people_num">人数：<?php echo $this->_vars->num ; ?>人</div>
		</div>
		
		<div class="top_info">
			<div class="n_info">
				<div>
					<div class="info_title">地址:</div>
					<div>
						<?php echo $this->_vars->addr ; ?>
						<a href="<?php echo $this->_vars->addr_link ; ?>">
						<img style="float:right;width:4vw;" src="<?php echo base_url() ; ?>static/image/location.png" />
						</a>
					</div>
				</div>
				
				<div>
					<div class="info_title">注意事项:</div>
					<div><?php echo $this->_vars->notice ; ?></div>
				</div>
				
				<hr />
				<div style="text-align:center;">6小时外每月可取消两次,超出扣费0.5次私教课程</div>
				<?php if($this->_vars->status < 2 ) {  ?>
				<div style="text-align:center;margin-top: 2vw;">
					<a href="javascript:;" class="cancel_order">取消预约</a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<!--BEGIN dialog-->
<div class="js_dialog" id="Dialog" style="display: none;">
    <div class="weui-mask"></div>
    <div class="weui-dialog weui-skin_android">
        <div class="weui-dialog__hd"><strong class="weui-dialog__title">取消预约提示</strong></div>
        <div class="weui-dialog__bd">
        	6小时外每月可取消两次,超出扣费0.5次私教课程,确定取消该订单吗?
        </div>
        <div class="weui-dialog__ft">
            <a href="javascript:;" class="weui-dialog__btn weui-dialog__btn_default">取消</a>
            <a href="<?php echo base_url() ; ?>order/cancel/<?php echo $this->_vars->order_id ; ?>" class="weui-dialog__btn weui-dialog__btn_primary">确认</a>
        </div>
    </div>
</div>
<!--END dialog-->
<script type="text/javascript" src="<?php echo base_url() ; ?>static/js/jquery.min.js"></script>
<script type="text/javascript">
	$('.cancel_order').on('click', function(){
        $('#Dialog').fadeIn(200);
        return false;
    });
	$('.weui-dialog__btn').on('click',function(){
		$('#Dialog').fadeOut(200);
	})
</script>
</body>
</html>