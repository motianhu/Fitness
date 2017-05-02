<?php $this->display('inc/header.html', array (
)); ?>

<!-- BEGIN Content -->
<div id="main-content">
    <!-- BEGIN Main Content -->
    <div class="row-fluid">
        <div class="span12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="icon-table"></i> 订单管理</h3>

                </div>
                <div class="box-content">
                	<form name="form" id="pform" method="post" action="<?php echo base_url() ; ?>shop/user">
	                </form> 
                    <div class="clearfix"></div>
                    <div class="clearfix"></div>
                    <table class="table table-advance" id="table1">
                        <thead>
                        <tr>
                            <th>标识</th>                            
                            <th>昵称</th>
                            <th>会员卡号</th>
                            <th>是否开通</th>
                            <th>余额</th>
                            <th>关注时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php if(!empty($this->_vars->list['data']) ) {  ?>
                        <?php foreach($this->_vars->list['data'] as $this->_vars->value ) {  ?>
                        <tr>
                            <td><?php echo $this->_vars->value['openid'] ; ?></td>
                            <td><?php echo $this->_vars->value['nickname'] ; ?></td>
                            <td><?php echo $this->_vars->value['no'] ; ?></td>
                            <td><?php echo $this->_vars->value['is_open']=='1'?'是':'否' ; ?></td>
                            <td><?php echo $this->_vars->value['balance'] ; ?></td>
                            <td><?php echo $this->_vars->value['subscribe_time'] ; ?></td>
                            <td>
                            	<div class="btn-group">
                                    <a class="btn btn-small show-tooltip" title="view"
                                       href="<?php echo base_url() ; ?>shop/user/detail/<?php echo $this->_vars->value['user_id'] ; ?>"><i
                                            class="icon-hand-up"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php } ?>
                        </tbody>
                    </table>
                    <?php if(isset($this->_vars->pages) ) {  ?>
                    <div class="page"><?php echo $this->_vars->pages ; ?></div>
                    <?php } ?>
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