<?php $this->display('inc/header.html', array (
)); ?>
<div class="container" id="container">
	<div>
		<img style="height: 49vw;width:100%;" src="<?php echo $this->_vars->img1 ; ?>">
	</div>
	<!--课程开始-->
	<div class="content">
		<!--简介-->
		<div class="panel">
			<div class="panel_jg">
				<div class="course_price" style="font-size:3.97vw;">
					门店简介
				</div>
				<div class="course_jj">
					<?php echo $this->_vars->content ; ?>
				</div>
			</div>
		</div>
		<!--地址-->
		<div class="panel">
			<div class="panel_jg">
				<div class="course_price" style="font-size:3.97vw;">
					门店地址
				</div>
				<p class="course_addr">
					<?php echo $this->_vars->addr ; ?>
					<a href="<?php echo $this->_vars->addr_link ; ?>">
						查看地图<img style="float:right;height: 3vw; margin:0 1vw;" src="<?php echo base_url() ; ?>static/image/location.png" />
					</a>
				</p>
			</div>
		</div>
		<!--注意事项-->
		<div class="panel">
			<div class="panel_jg">
				<div class="course_price" style="font-size:3.97vw;">
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
<?php $this->display('inc/footer.html', array (
)); ?>