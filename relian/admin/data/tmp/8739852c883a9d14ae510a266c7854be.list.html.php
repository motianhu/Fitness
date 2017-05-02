<?php $this->display('inc/header.html', array (
)); ?>

<!-- BEGIN Content -->
<div id="main-content">
    <!-- BEGIN Main Content -->
    <div class="row-fluid">
        <div class="span12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="icon-table"></i> 活动列表</h3>

                    <div class="btn-toolbar pull-right clearfix">
                        <div class="btn-group">
                            <a class="btn btn-circle show-tooltip" title="增加活动"
                               href="<?php echo base_url() ; ?>shop/activity/detail/"><i class="icon-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="box-content">
                	<form name="form" id="pform" method="post" action="<?php echo base_url() ; ?>shop/activity">
	                </form> 
                    <div class="clearfix"></div>
                    <table class="table table-advance" id="table1">
                        <thead>
                        <tr>
                            <th>活动名称</th>       
                            <th>开始时间</th>                     
                            <th>结束时间</th>
                            <th style="width:100px">操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php if(!empty($this->_vars->list['data']) ) {  ?>
                        <?php foreach($this->_vars->list['data'] as $this->_vars->value ) {  ?>
                        <tr>
                             <td><?php echo $this->_vars->value['name'] ; ?></td>
                            <td><?php echo $this->_vars->value['start_time'] ; ?></td>
                            <td><?php echo $this->_vars->value['end_time'] ; ?></td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-small show-tooltip" title="Edit"
                                       href="<?php echo base_url() ; ?>shop/activity/detail/<?php echo $this->_vars->value['id'] ; ?>"><i
                                            class="icon-edit"></i></a>
                                    <a class="btn btn-small btn-danger show-tooltip" title="Delete" href="<?php echo base_url() ; ?>shop/activity/del/<?php echo $this->_vars->value['id'] ; ?>" onclick="return confirm('确认删除？');"><i class="icon-trash"></i></a>
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