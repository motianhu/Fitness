<?php $this->display('inc/header.html', array (
)); ?>
<!-- BEGIN Content -->
<div id="main-content">
    <!-- BEGIN Main Content -->
    <div class="row-fluid">
        <div class="span12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="icon-comment"></i> 会员管理</h3>

                    <div class="box-tool">
                    	<a href="<?php echo base_url() ; ?>shop/user" class="btn btn-info">返回上一级</a>
                    </div>
                </div>
                <div class="box-content">
                	 <form name="addForm" method="post" action="<?php echo base_url() ; ?>shop/user/save/<?php echo $this->_vars->result['user_id'] ; ?>">
                        <table class="table table-advance">
                            <tr>
                                <td width="100" align="right">标识：</td>
                                <td><?php echo isset($this->_vars->result) ? $this->_vars->result['openid'] : '' ; ?></td>
                            </tr>
                            <tr>
                                <td width="100" align="right">昵称：</td>
                                <td><?php echo isset($this->_vars->result) ? $this->_vars->result['nickname'] : '' ; ?></td>
                            </tr>
                            <tr>
                                <td width="100" align="right">头像：</td>
                                <td>
                                	<?php if(isset($this->_vars->result) && $this->_vars->result['headimgurl'] != '' ) {  ?>
                                	<img style="width: 100px;" src="<?php echo $this->_vars->result['headimgurl'] ; ?>" class="img-circle">
                                	<?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="100" align="right">会员卡号：</td>
                                <td><?php echo isset($this->_vars->result) ? $this->_vars->result['no'] : '' ; ?></td>
                            </tr>
                            <tr>
                                <td width="100" align="right">手机：</td>
                                <td><?php echo isset($this->_vars->result) ? $this->_vars->result['phone'] : '' ; ?></td>
                            </tr>
                            <tr>
                                <td width="100" align="right">余额：</td>
                                <td><?php echo isset($this->_vars->result) ? $this->_vars->result['balance'] : '' ; ?></td>
                            </tr>
                            <tr>
                                <td width="100" align="right">关注时间：</td>
                                <td><?php echo isset($this->_vars->result) ? $this->_vars->result['subscribe_time'] : '' ; ?></td>
                            </tr>
                            <tr>
                                <td width="100" align="right">身高(cm)：</td>
                                <td><label for="height"></label>
                                    <input type="text" name="height" id="height" required value="<?php echo isset($this->_vars->result) ? $this->_vars->result['height'] : '' ; ?>" ></td>
                            </tr>
                            <tr>
                                <td width="100" align="right">体重(kg)：</td>
                                <td><label for="weight"></label>
                                    <input type="text" name="weight" id="weight" required value="<?php echo isset($this->_vars->result) ? $this->_vars->result['weight'] : '' ; ?>" ></td>
                            </tr>
                            <tr>
                                <td width="100" align="right">体脂百分比(%)：</td>
                                <td><label for="fat"></label>
                                    <input type="text" name="fat" id="fat" required value="<?php echo isset($this->_vars->result) ? $this->_vars->result['fat'] : '' ; ?>" ></td>
                            </tr>
                            <tr>
                                <td width="100" align="right">骨骼肌含量(%)：</td>
                                <td><label for="bones"></label>
                                    <input type="text" name="bones" id="bones" required value="<?php echo isset($this->_vars->result) ? $this->_vars->result['bones'] : '' ; ?>" ></td>
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