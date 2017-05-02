<?php $this->display('inc/header.html', array (
)); ?>
<div class="container" id="container">
	<div>
		<img style="height: 49vw;width:100%;" src="<?php echo $this->_vars->pic_detail ; ?>">
	</div>
	<!--课程开始-->
	<div class="content">
		<!--教练-->
		<div class="panel">
			<div class="panel_jj">
				<div class="tec_name"><?php echo $this->_vars->coach_name ; ?></div>
				<div class="tec_profile"><?php echo $this->_vars->profile ; ?></div>
			</div>
			<div class="pic"><img src="<?php echo $this->_vars->pic_persion ; ?>" /></div>
		</div>
		<!--费用地址-->
		<div class="panel">
			<div class="panel_jg">
				<p class="course_price">
					<img src="<?php echo base_url() ; ?>static/image/price.png" />
					￥<?php echo $this->_vars->price ; ?>元/次
				</p>
				<p class="course_addr">
					<?php echo $this->_vars->addr ; ?>
					<a href="<?php echo $this->_vars->addr_link ; ?>">
						<img style="float:right;" src="<?php echo base_url() ; ?>static/image/location.png" />
					</a>
				</p>
			</div>
		</div>
		<!--简介-->
		<div class="panel">
			<div class="panel_jg">
				<div class="course_price" style="font-size:3.97vw;">
					<img src="<?php echo base_url() ; ?>static/image/jj.png" />
					课程简介
				</div>
				<div class="course_jj">
				<?php echo $this->_vars->introduce ; ?>
				</div>
			</div>
		</div>
		<!--注意事项-->
		<div class="panel">
			<div class="panel_jg">
				<div class="course_price" style="font-size:3.97vw;">
					<img src="<?php echo base_url() ; ?>static/image/zy.png" />
					注意事项
				</div>
				<div class="course_jj">
					<?php echo $this->_vars->notice ; ?>
				</div>
			</div>
		</div>
	</div>
	<!--课程结束-->
</div>
<div class="page-bd-15">
	<div class="weui-share" onclick="$(this).fadeOut();$(this).removeClass('fadeOut')">
		<div class="weui-share-box">
		点击右上角发送给指定朋友或分享到朋友圈 <i></i>
		</div>
	</div> 
</div>

<div class="weui-tabbar">
	<a href="<?php echo base_url() ; ?>order/date/<?php echo $this->_vars->admin_id ; ?>" class="weui-tabbar__item weui-bar__item_on" style="webkit-flex:7;flex:7;">
		<span class="weui-tabbar__label">立即约课</span>
	</a>
	<a onclick="$('.weui-share').show().addClass('fadeIn');"  href="javascript:void(0)" class="weui-tabbar__item" style="webkit-flex:3;flex:3;background-color: #333;">
		<span class="weui-tabbar__label" style="color:#fff;">分享</span>
	</a>
</div>
<script type="text/javascript" src="<?php echo base_url() ; ?>static/js/jquery.min.js"></script>
<?php if(isset($this->_vars->footerJs) && !empty($this->_vars->footerJs) ) {  ?>
<?php foreach($this->_vars->footerJs as $this->_vars->key => $this->_vars->value ) {  ?>
<script type="text/javascript" src="<?php echo base_url() ; ?>static/js/<?php echo $this->_vars->value ; ?>?v=2.3"></script>
<?php } ?>
<?php } ?>
</body>
</html>
