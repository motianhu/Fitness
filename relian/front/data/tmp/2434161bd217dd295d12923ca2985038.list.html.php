<?php $this->display('inc/header.html', array (
)); ?>
<div class="container" id="container">
	<!--banner 开始-->
	<?php $this->display('inc/slide.html', array (
)); ?>
	<!--banner 结束-->
	<!--门店开始-->
	<div id="weui-tab">
		<?php foreach($this->_vars->list['data'] as $this->_vars->val ) {  ?>
		<div class="weui-tab_md">
			<div class="tab_md_bot">
				<div class="bot_co">
					<div class="md_bot_title">
						<?php echo $this->_vars->val['name'] ; ?>
					</div>
					<div class="md_bot_addr">
						<?php echo $this->_vars->val['addr'] ; ?>
					</div>
				</div>
			</div>
			<a href="<?php echo base_url();?>store/detail/<?php echo $this->_vars->val['id'] ; ?>"><img alt="" src="<?php echo $this->_vars->val['img1'] ; ?>"></a>
		</div>
		<?php } ?>
	</div>
	<div class="scroller-pullup status-success">
		<span class="pull-msg">coming soon ...</span>
	</div>
	<!--门店结束-->
</div>
<?php $this->display('inc/footer.html', array (
)); ?>