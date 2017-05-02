<?php $this->display('inc/header.html', array (
)); ?>
<div class="container" id="container">
	<div class="activity">
		<?php echo $this->_vars->content ; ?>
	</div>
</div>
<input type="hidden" id="host" value="<?php echo base_url() ; ?>">
<?php if(isset($this->_vars->footerJs) && !empty($this->_vars->footerJs) ) {  ?>
<?php foreach($this->_vars->footerJs as $this->_vars->key => $this->_vars->value ) {  ?>
<script type="text/javascript" src="<?php echo base_url() ; ?>static/js/<?php echo $this->_vars->value ; ?>?v=2.3"></script>
<?php } ?>
<?php } ?>
</body>
</html>