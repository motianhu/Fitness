<?php $this->display('inc/header.html', array (
)); ?>
<!-- BEGIN Content -->
<div id="main-content">
    <!-- BEGIN Main Content -->
    <div class="row-fluid">
        <div class="span12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="icon-comment"></i> 教练管理</h3>

                    <div class="box-tool">
                    	<a href="<?php echo base_url() ; ?>shop/coach/" class="btn btn-info">返回上一级</a>
                    </div>
                </div>
                <div class="box-content">
                    <form name="addForm" id="addForm" enctype="multipart/form-data" method="post" action="<?php echo base_url() ; ?>shop/coach/save/<?php echo isset($this->_vars->result) ? $this->_vars->result['admin_id'] : '' ; ?>">
                        <table class="table table-advance">
                        	<tr>
                                <td  align="right">门店：</td>
                                <td><label for="username"></label>
                                   <select name="store_id" class="form-control">
									  <?php if(!empty($this->_vars->store) ) {  ?>						          
	                        		  <?php foreach($this->_vars->store as $this->_vars->key=>$this->_vars->value ) {  ?>
	                        		  <option <?php if(isset($this->_vars->result) && $this->_vars->result['store_id'] == $this->_vars->key ) {  ?>selected<?php } ?> value="<?php echo $this->_vars->key ; ?>"><?php echo $this->_vars->value ; ?></option>
	                        		  <?php } ?>
	                        		  <?php } ?>	
									</select>
                                </td>
                            </tr>
                            <tr>
                                <td  align="right">登录名：</td>
                                <td><label for="username"></label>
                                    <input type="text" name="uname" id="uname" required value="<?php echo isset($this->_vars->result) ? $this->_vars->result['uname'] : '' ; ?>" ></td>
                            </tr>
                            <tr>
                                <td  align="right">密码：</td>
                                <td><label for="username"></label>
                                    <input type="password" name="passwd" id="passwd" <?php if(! isset($this->_vars->result) ) {  ?>required<?php } ?> ></td>
                            </tr>
                            <tr>
                                <td  align="right">姓名：</td>
                                <td><label for="username"></label>
                                    <input type="text" name="name" id="name" value="<?php echo isset($this->_vars->result) ? $this->_vars->result['name'] : '' ; ?>" ></td>
                            </tr>
                            <tr>
                                <td  align="right">头像：</td>
                                <td>
                                	<?php if(isset($this->_vars->result) && $this->_vars->result['pic_persion'] != '' ) {  ?>
                                	<img style="width: 100px;" src="<?php echo $this->_vars->result['pic_persion'] ; ?>" class="img-circle">
                                	<?php } ?>
                                	<input type="file" name="pic_persion" id="inputfile">
                                	<p class="help-block">最大200KB</p>
                                </td>
                            </tr>
                            <tr>
                                <td  align="right">详情图：</td>
                                <td>
                                	<?php if(isset($this->_vars->result) && $this->_vars->result['pic_detail'] != '' ) {  ?>
                                	<img style="width: 100px;" src="<?php echo $this->_vars->result['pic_detail'] ; ?>" class="img-thumbnail">
                                	<?php } ?>
                                	<input type="file" name="pic_detail" id="inputfile">
                                	<p class="help-block">最大512KB</p>
                                </td>
                            </tr>
                            <tr>
                                <td  align="right">个人简介：</td>
                                <td><label for="username"></label>
                                	<textarea rows="5" style="width:80%;" name="profile" id="profile" ><?php echo isset($this->_vars->result) ? $this->_vars->result['profile'] : '' ; ?></textarea></td>
                            </tr>
                            <tr>
                                <td  align="right">课程价格：</td>
                                <td><label for="username"></label>
                                    <input type="text" name="price" id="price" value="<?php echo isset($this->_vars->result) ? $this->_vars->result['price'] : '' ; ?>" ></td>
                            </tr>
                            <tr>
                                <td  align="right">课程简介：</td>
                                <td><textarea rows="5"  style="width:80%;" name="introduce" id="introduce" ><?php echo isset($this->_vars->result) ? $this->_vars->result['introduce'] : '' ; ?></textarea></td>
                            </tr>
                            <tr>
                                <td  align="right">注意事项：</td>
                                <td><script id="notice" name="notice" type="text/plain"><?php echo isset($this->_vars->result) ? $this->_vars->result['notice'] : '' ; ?></script></td>
                            </tr>
                            <tr>
                                <td  align="right">是否禁用：</td>
                                <td><label for="username"></label>
                                    <input type="radio" name="disabled" value="0" <?php if(! isset($this->_vars->result) || $this->_vars->result['disabled']=='0' ) {  ?>checked<?php } ?>>否
                                    <input type="radio" name="disabled" value="1" <?php if(isset($this->_vars->result) && $this->_vars->result['disabled']=='1' ) {  ?>checked<?php } ?>>是
                                </td>
                            </tr> 
                            <tr>
                                <td  align="right">&nbsp;</td>
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