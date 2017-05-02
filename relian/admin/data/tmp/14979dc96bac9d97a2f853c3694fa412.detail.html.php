<?php $this->display('inc/header.html', array (
)); ?>
<!-- BEGIN Content -->
<div id="main-content">
    <!-- BEGIN Main Content -->
    <div class="row-fluid">
        <div class="span12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="icon-comment"></i> 店铺维护</h3>

                    <div class="box-tool">
                    	<a href="<?php echo base_url() ; ?>shop/store" class="btn btn-info">返回上一级</a>
                    </div>
                </div>
                <div class="box-content">
                    <form name="addForm" id="addForm"  enctype="multipart/form-data" method="post" action="<?php echo base_url() ; ?>shop/store/save/<?php echo isset($this->_vars->result) ? $this->_vars->result['id'] : '' ; ?>">
                        <table class="table table-advance">
                            <tr>
                                <td width="100" align="right">店名：</td>
                                <td><label for="username"></label>
                                    <input type="text" name="name" id="name" required value="<?php echo isset($this->_vars->result) ? $this->_vars->result['name'] : '' ; ?>" ></td>
                            </tr>
                            <tr>
                                <td  align="right">图片：</td>
                                <td>
                                	<?php if(isset($this->_vars->result) && $this->_vars->result['img1'] != '' ) {  ?>
                                	<img style="width: 100px;" src="<?php echo $this->_vars->result['img1'] ; ?>" >
                                	<?php } ?>
                                	<input type="file" name="img1" id="inputfile">
                                	<p class="help-block">最大512KB</p>
                                </td>
                            </tr>                            
                            <tr>
                                <td width="100" align="right">电话：</td>
                                <td><label for="username"></label>
                                    <input type="text" name="tel" id="tel" required value="<?php echo isset($this->_vars->result) ? $this->_vars->result['tel'] : '' ; ?>" ></td>
                            </tr>
                            <tr>
                                <td width="100" align="right">城市：</td>
                                <td><label for="city"></label>
                                	<select name="city" id="city" class="form-control">
						          	  <option></option>
									  <?php if(!empty($this->_vars->city) ) {  ?>						          
		                      		  <?php foreach($this->_vars->city as $this->_vars->value ) {  ?>
		                      		  <option value="<?php echo $this->_vars->value['id'] ; ?>" <?php if(isset($this->_vars->result) && $this->_vars->result['city'] == $this->_vars->value['id'] ) {  ?>selected<?php } ?>><?php echo $this->_vars->value['name'] ; ?></option>
		                      		  <?php } ?>
		                      		  <?php } ?>	
									</select>
                                </td>
                            </tr>
                            <tr>
                                <td width="100" align="right">地区：</td>
                                <td><label for="area"></label>
                                	<select name="area" id="area" class="form-control">
                                		<option></option>
                                		<?php if(!empty($this->_vars->area) ) {  ?>						          
			                      		  <?php foreach($this->_vars->area as $this->_vars->val ) {  ?>
			                      		  <option value="<?php echo $this->_vars->val['id'] ; ?>" <?php if(isset($this->_vars->result) && $this->_vars->result['area'] == $this->_vars->val['id'] ) {  ?>selected<?php } ?>><?php echo $this->_vars->val['name'] ; ?></option>
			                      		  <?php } ?>
			                      		  <?php } ?>	
                                	</select>
                                </td>
                            </tr>
                            <tr>
                                <td width="100" align="right">详细地址：</td>
                                <td><label for="username"></label>
                                    <input type="text" name="addr" id="addr"  style="width:50%;"  required value="<?php echo isset($this->_vars->result) ? $this->_vars->result['addr'] : '' ; ?>" >
                                	<p class="help-block">包括城市地区</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="100" align="right">地址链接：</td>
                                <td><label for="username"></label>
                                    <input type="text" name="addr_link" id="addr_link" style="width:50%;" required value="<?php echo isset($this->_vars->result) ? $this->_vars->result['addr_link'] : '' ; ?>" ></td>
                            </tr>
                            <tr>
                                <td width="100" align="right">简介：</td>
                                <td><label for="username"></label>
                                    <textarea rows="5" style="width:50%;" name="content" id="content" ><?php echo isset($this->_vars->result) ? $this->_vars->result['content'] : '' ; ?></textarea></td>
                            </tr>
                            <tr>
                                <td width="100" align="right">注意事项：</td>
                                <td>
                                	<script id="container" name="notice" type="text/plain"><?php echo isset($this->_vars->result) ? $this->_vars->result['notice'] : '' ; ?></script>
                                </td>
                            </tr>
                            <tr>
                                <td width="100" align="right">&nbsp;</td>
                                <td><input type="submit" class="btn btn-primary" id="button" value="保存"></td>
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

    <a id="btn-scrollup" class="btn btn-circle btn-large" href="#"><i class="icon-chevron-up"></i></a>
</div>
<!-- END Content -->

<?php $this->display('inc/footer.html', array (
)); ?>