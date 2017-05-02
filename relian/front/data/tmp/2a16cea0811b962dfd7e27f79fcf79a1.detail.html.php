<?php $this->display('inc/header.html', array (
)); ?>
<div class="container" id="container">
	<div class="card">
		<div class="headimg">
			<img src="<?php echo $this->_vars->headimgurl ; ?>" />
		</div>
		<div class="cardno">
			<div>NO：xxx</div>
			<div>余额：尚未开通</div>
		</div>
		<div class="nickname">
			<?php echo $this->_vars->nickname ; ?>
		</div>
		<div class="open_card">
			<a href="#">开通</a>
		</div>
	</div>	
	<div class="ncon">
		<div class="item_card">
			<div class="card_left">
				<img src="<?php echo base_url();?>static/image/height.png" />身高(cm):
			</div>
			<div class="card_right"><?php echo $this->_vars->height ; ?></div>
		</div>
		
		<div class="item_card">
			<div class="card_left">
				<img src="<?php echo base_url();?>static/image/weight.png" />体重(kg):
			</div>
			<div class="card_right"><?php echo $this->_vars->weight ; ?></div>
		</div>
		
		<div class="item_card">
			<div class="card_left">
				<img src="<?php echo base_url();?>static/image/fat.png" />体脂百分比:
			</div>
			<div class="card_right"><?php echo $this->_vars->fat ; ?>%</div>
		</div>
		
		<div class="item_card">
			<div class="card_left">
				<img src="<?php echo base_url();?>static/image/skeletal.png" />骨骼肌含量:
			</div>
			<div class="card_right"><?php echo $this->_vars->bones ; ?>%</div>
		</div>
	</div>	
</div>
<?php $this->display('inc/footer.html', array (
)); ?>
