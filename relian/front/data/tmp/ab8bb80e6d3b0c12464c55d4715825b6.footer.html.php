
<div class="weui-tabbar">
	<a href="<?php echo base_url() ; ?>store" class="weui-tabbar__item<?php if($this->_vars->uri_string == '' || stristr($this->_vars->uri_string,'store') ) {  ?> weui-bar__item_on<?php } ?>">
		<span class="weui-tabbar__label">门店</span>
	</a>
	<a href="<?php echo base_url() ; ?>course" class="weui-tabbar__item<?php if(stristr($this->_vars->uri_string,'course') ) {  ?> weui-bar__item_on<?php } ?>">
		<span class="weui-tabbar__label">课程</span>
	</a>
	<a href="<?php echo base_url() ; ?>order" class="weui-tabbar__item<?php if(stristr($this->_vars->uri_string,'order') ) {  ?> weui-bar__item_on<?php } ?>">
		<span class="weui-tabbar__label">我的预约</span>
	</a>
	<a href="<?php echo base_url() ; ?>card" class="weui-tabbar__item<?php if(stristr($this->_vars->uri_string,'card') ) {  ?> weui-bar__item_on<?php } ?>">           
		<span class="weui-tabbar__label">会员卡</span>
	</a>
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