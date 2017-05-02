<?php $this->display('inc/header.html', array (
)); ?>
<!-- BEGIN Content -->
<div id="main-content">
	<!-- BEGIN Main Content -->
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-title">
					<h3>
						<i class="icon-comment"></i> 菜单管理
					</h3>
					<div class="box-tool">
                    	<a href="<?php echo base_url() ; ?>sys/menu" class="btn btn-info">返回上一级</a>
                    </div>
				</div>
				<div class="box-content">
					<form name="addMenuForm" enctype="multipart/form-data" action='<?php echo base_url() ; ?>sys/menu/save/<?php echo isset($this->_vars->detail) ? $this->_vars->detail['menu_id'] : '' ; ?>' id="addMenuForm" method="post">
						<table class="table table-advance" id='customer_info' style="">
							<tr>
								<td width="100" align="right">菜单名称：</td>
								<td><label for="customer_name"></label> <?php if(isset($this->_vars->detail) ) {  ?>
									<input type="text" name="menu_name" class='required'
									id="menu_name" required
									value="<?php echo isset($this->_vars->detail) ? $this->_vars->detail['menu_name'] : '' ; ?>">
									<?php } else { ?> <input type="text" name="menu_name"
									class='required' id="menu_name" required value=""> <?php } ?></td>
							</tr>
							<tr>
								<td width="100" align="right">parent_id：</td>
								<td><label for="legal_person"></label> <?php if(isset($this->_vars->detail) ) {  ?>
									<input type="text" name="parent_id" class='required'
									id="parent_id" required
									value="<?php echo isset($this->_vars->detail) ? $this->_vars->detail['parent_id'] : '' ; ?>">
								<?php } else { ?> <input type="text" name="parent_id"
									id="parent_id" class='required' required value=""> <?php } ?></td>
							</tr>
							<tr>
								<td width="100" align="right">model：</td>
								<td><label for="legal_person"></label> <?php if(isset($this->_vars->detail) ) {  ?>
									<input type="text" name="model" class='required'
									id="model" required
									value="<?php echo isset($this->_vars->detail) ? $this->_vars->detail['model'] : '' ; ?>">
								<?php } else { ?> <input type="text" name="model"
									id="model" class='required' required value=""> <?php } ?></td>
							</tr>
							<tr>
								<td width="100" align="right">ctrl：</td>
								<td><label for="legal_person"></label> <?php if(isset($this->_vars->detail) ) {  ?>
									<input type="text" name="ctrl" class='required'
									id="ctrl" required
									value="<?php echo isset($this->_vars->detail) ? $this->_vars->detail['ctrl'] : '' ; ?>">
								<?php } else { ?> <input type="text" name="ctrl"
									id="ctrl" class='required' required value=""> <?php } ?></td>
							</tr>
							<tr>
								<td width="100" align="right">&nbsp;</td>
								<td>
									<input type="submit" class="btn btn-primary" id="button" value="保存"> 
								</td>
							</tr>
						</table>


					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- END Main Content -->

	<?php $this->display('inc/copyright.html', array (
)); ?>

	<a id="btn-scrollup" class="btn btn-circle btn-large" href="#"><i
		class="icon-chevron-up"></i></a>
</div>
<!-- END Content -->

<?php $this->display('inc/footer.html', array (
)); ?>