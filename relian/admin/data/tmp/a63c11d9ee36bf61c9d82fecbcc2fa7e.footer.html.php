<input type="hidden" id="host" value="<?php echo base_url() ; ?>">
<script type="text/javascript" src="<?php echo base_url() ; ?>static/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url() ; ?>static/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url() ; ?>static/assets/bootstrap/bootstrap.min.js"></script>

<!--page specific plugin scripts-->


<!--flaty scripts-->
<script src="<?php echo base_url() ; ?>static/js/flaty.js"></script>
<?php if(isset($this->_vars->footerJs) && !empty($this->_vars->footerJs) ) {  ?>
<?php foreach($this->_vars->footerJs as $this->_vars->key => $this->_vars->value ) {  ?>
<script type="text/javascript" src="<?php echo base_url() ; ?>static/js/<?php echo $this->_vars->value ; ?>?v=2.0"></script>
<?php } ?>
<?php } ?>
<script type="text/javascript">
	$('.page a').each(function(){
		$(this).click(function(){
			$('#pform').attr('action',$(this).attr('href')).submit();
			return false;
		});
	});
</script>
</body>
</html>