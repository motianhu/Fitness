<?php $this->display('inc/header.html', array (
)); ?>
<div class="container" id="container">
	<div class="content">
		<div class="nothing"></div>
		<div class="tel_img">
			<img alt="" src="<?php echo base_url() ; ?>static/image/tel.png">
		</div>
		<div class="ts_msg">
			<div>您的订单信息已提交成功</div>
			<div>请致电门店进行最终确认</div>
		</div>
		<div class="tel-num">
			0755-83926657
		</div>
	</div>
</div>
<div class="weui-tabbar">
	<a href="tel:075584034980" class="weui-btn weui-btn_primary">拨号</a>
</div>
<script type="text/javascript" src="<?php echo base_url() ; ?>static/js/jquery.min.js"></script>
<?php if(isset($this->_vars->footerJs) && !empty($this->_vars->footerJs) ) {  ?>
<?php foreach($this->_vars->footerJs as $this->_vars->key => $this->_vars->value ) {  ?>
<script type="text/javascript" src="<?php echo base_url() ; ?>static/js/<?php echo $this->_vars->value ; ?>?v=2.3"></script>
<?php } ?>
<?php } ?>
</body>
</html>