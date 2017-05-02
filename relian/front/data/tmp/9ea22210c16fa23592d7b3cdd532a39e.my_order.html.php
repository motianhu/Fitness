<?php $this->display('inc/header.html', array (
)); ?>
<div class="container" id="container">
	<div>
		<div class="p_order_rq">
			<div class="order_rq">
				<div class="rq_num"><?php echo $this->_vars->train_cnt ; ?></div>
				<div class="rq_unit">累计训练/次</div>
			</div>
			<div class="order_rq">
				<div class="rq_num"><?php echo $this->_vars->train_minute ; ?></div>
				<div class="rq_unit">累计时长/分钟</div>
			</div>
			<div class="order_rq">
				<div class="rq_num"><?php echo $this->_vars->train_day ; ?></div>
				<div class="rq_unit">累计天数</div>
			</div>
		</div>
		<?php if(empty($this->_vars->order) ) {  ?>
		<div class="weui-btn_yuyue">
			<a href="<?php echo base_url() ; ?>course">预约课程</a>
		</div>
		<?php } else { ?>
			<div class="loadmore">
			<?php foreach($this->_vars->order as $this->_vars->val ) {  ?>
			<div class="<?php echo $this->_vars->val['status']=='2'?'no_img':'yes_img' ; ?> ycard">
				<div><img src="<?php echo $this->_vars->val['pic_persion'] ; ?>" /></div>
				<div class="order-info">
					<div><?php echo date('Y年m月d日',strtotime($this->_vars->val['date'])) ; ?>  <?php echo $this->_vars->val['time'] ; ?>~<?php echo intval($this->_vars->val['time'])+1 ; ?>:00</div>
					<div style="text-align:right;"><?php echo $this->_vars->val['store_name'] ; ?></div>
				</div>
				<div class="people-num"><?php echo $this->_vars->val['num'] ; ?>人</div>
				<div class="course-coach"><?php echo $this->_vars->val['course_name'] ; ?>(<?php echo $this->_vars->val['coach_name'] ; ?>)</div>
				<div>
					<?php if(in_array($this->_vars->val['status'],array('2','4')) ) {  ?>
					<a class="cc" href="javascript:void(0);"><?php echo $this->_vars->status_arr[$this->_vars->val['status']] ; ?></a>
					<?php } else { ?>
					<a class="yy" href="<?php echo base_url() ; ?>order/detail/<?php echo $this->_vars->val['order_id'] ; ?>">详情</a>
					<?php } ?>
				</div>
			</div>	
			<?php } ?>
			</div>
		<?php } ?>
	</div>
</div>
<?php $this->display('inc/footer.html', array (
)); ?>