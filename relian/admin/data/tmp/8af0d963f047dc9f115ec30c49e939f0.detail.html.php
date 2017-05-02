<?php $this->display('inc/header.html', array (
)); ?>
<!-- BEGIN Content -->
<div id="main-content">
    <!-- BEGIN Main Content -->
    <div class="row-fluid">
        <div class="span12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="icon-comment"></i> 查看订单详情</h3>

                    <div class="box-tool">
                    	<a href="<?php echo base_url() ; ?>shop/order" class="btn btn-info">返回上一级</a>
                    </div>
                </div>
                <div class="box-content">
                        <table class="table table-advance">
                        	<tr>
                                <td width="100" align="right">订单号：</td>
                                <td><?php echo isset($this->_vars->result) ? $this->_vars->result['order_sn'] : '' ; ?></td>
                            </tr>
                            <tr>
                                <td width="100" align="right">下单人：</td>
                                <td><?php echo isset($this->_vars->result) ? $this->_vars->result['nickname'] : '' ; ?></td>
                            </tr>
                            <tr>
                                <td width="100" align="right">门店：</td>
                                <td><?php echo isset($this->_vars->result) ? $this->_vars->result['store_name'] : '' ; ?></td>
                            </tr>
                            <tr>
                                <td width="100" align="right">课程：</td>
                                <td><?php echo isset($this->_vars->result) ? $this->_vars->result['course_name'] : '' ; ?></td>
                            </tr>
                            <tr>
                                <td width="100" align="right">教练：</td>
                                <td><?php echo isset($this->_vars->result) ? $this->_vars->result['coach_name'] : '' ; ?></td>
                            </tr>
                            <tr>
                                <td width="100" align="right">时间：</td>
                                <td>
                                	<?php if(isset($this->_vars->result) ) {  ?>
                                	<?php echo $this->_vars->result['date'] ; ?> <?php echo $this->_vars->result['time'] ; ?>
                                	<?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="100" align="right">人数：</td>
                                <td><?php echo isset($this->_vars->result) ? $this->_vars->result['num'] : '' ; ?></td>
                            </tr>
                            <tr>
                                <td width="100" align="right">总价：</td>
                                <td><?php echo isset($this->_vars->result) ? $this->_vars->result['total'] : '' ; ?></td>
                            </tr>
                            <tr>
                                <td width="100" align="right">折后价：</td>
                                <td><?php echo isset($this->_vars->result) ? $this->_vars->result['discount'] : '' ; ?></td>
                            </tr>
                            <tr>
                                <td width="100" align="right">代金卷：</td>
                                <td><?php echo isset($this->_vars->result) ? $this->_vars->result['coupon_id'] : '' ; ?></td>
                            </tr>
                            <tr>
                                <td width="100" align="right">支付金额：</td>
                                <td><?php echo isset($this->_vars->result) ? $this->_vars->result['payment'] : '' ; ?></td>
                            </tr>
                            <tr>
                                <td width="100" align="right">状态：</td>
                                <td><?php echo isset($this->_vars->status[$this->_vars->result['status']])?$this->_vars->status[$this->_vars->result['status']]:'未知状态' ; ?></td>
                            </tr>
                        </table>
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