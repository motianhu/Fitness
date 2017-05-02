<?php $this->display('inc/header.html', array (
)); ?>
<div class="container" >
	<!--订单-->
	<div>
		<div class="weui-date">
			<div class="weui-date-rq">
				<?php foreach($this->_vars->date_num as $this->_vars->val ) {  ?>
				<div><?php echo $this->_vars->val ; ?></div>
				<?php } ?>
			</div>
			<div class="weui-date-brq">
				<div><span date="0" class="in_date">今天</span></div>
				<div>明天</div>
				<?php foreach($this->_vars->date_zn as $this->_vars->val ) {  ?>
				<div><?php echo $this->_vars->val ; ?></div>
				<?php } ?>
			</div>
		</div>
		
		<div class="tabBox" coach="<?php echo $this->_vars->coach_id ; ?>">
			<?php foreach($this->_vars->ltime as $this->_vars->k=>$this->_vars->v ) {  ?>
			<div class="box-content">
				<div  class="content-item">
					<div class="yy_time"><?php echo $this->_vars->v ; ?></div>
					<div class="yy_cz">
						<?php if(!empty($this->_vars->schedule_order) && in_array($this->_vars->v, $this->_vars->schedule_order) ) {  ?>						
						<a href="javascript:void(0);" class="yy_false">已预约</a>
						<?php } elseif(intval($this->_vars->v) <= date('H') ) {  ?>
						<a href="javascript:void(0);" class="yy_false">已结束</a>
						<?php } elseif(!empty($this->_vars->schedule_time) && in_array($this->_vars->v, $this->_vars->schedule_time) ) {  ?>
						<a href="javascript:void(0);" time="<?php echo $this->_vars->k ; ?>" class="yy_true">可预约</a>
						<?php } else { ?>
						<a href="javascript:void(0);" class="yy_false">未开放</a>
						<?php } ?>
					</div>
				</div>	
			</div>
			<?php } ?>
		</div>
	</div>
	<!--课程结束-->
</div>

<input type="hidden" id="host" value="<?php echo base_url() ; ?>">
<script type="text/javascript" src="<?php echo base_url() ; ?>static/js/jquery.min.js"></script>
<?php if(isset($this->_vars->footerJs) && !empty($this->_vars->footerJs) ) {  ?>
<?php foreach($this->_vars->footerJs as $this->_vars->key => $this->_vars->value ) {  ?>
<script type="text/javascript" src="<?php echo base_url() ; ?>static/js/<?php echo $this->_vars->value ; ?>?v=2.3"></script>
<?php } ?>
<?php } ?>
</body>
</html>
