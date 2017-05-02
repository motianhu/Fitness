<?php $this->display('inc/header.html', array (
)); ?>

<!-- BEGIN Content -->
<div id="main-content">
    <!-- BEGIN Main Content -->
    <div class="row-fluid">
        <div class="span12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="icon-table"></i> 用户管理</h3>
                    <div class="btn-toolbar pull-right clearfix">
                        <div class="btn-group">
                            <a class="btn btn-circle show-tooltip" title="增加用户"
                               href="<?php echo base_url() ; ?>sys/admin/detail"><i class="icon-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="box-content">
						<form name="form" id="pform" method="post" action="<?php echo base_url() ; ?>sys/admin/index/">
						          角色：
						          <select name="role">
						          <option value="0"></option>
						          <?php if(!empty($this->_vars->admin_role) ) {  ?>						          
                        		  <?php foreach($this->_vars->admin_role as $this->_vars->key => $this->_vars->value ) {  ?>
                        		  <option value="<?php echo $this->_vars->key ; ?>"  <?php if($this->_vars->key == $this->_vars->role_id ) {  ?>selected<?php } ?>><?php echo $this->_vars->value['role_name'] ; ?></option>
                        		  <?php } ?>
                        		  <?php } ?>	
						          </select>
						         用户名：<input type="text" name="uname" class="search_input" value="<?php echo $this->_vars->uname ; ?>" />
		                        &nbsp;&nbsp;<input type="submit" class="btn" id="button" value="搜索">
	                    </form>                     
                    <div class="clearfix"></div>
                    <table class="table table-advance" id="table1">
                        <thead>
                        <tr>
                            <th>角色</th>
                            <th>用户名</th>
                            <th>真实姓名</th>
                            <th>状态</th>
                            <th style="width:100px">操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php if(!empty($this->_vars->list['data']) ) {  ?>
                        <?php foreach($this->_vars->list['data'] as $this->_vars->key => $this->_vars->value ) {  ?>
                        <tr>
                            <td> <?php echo $this->_vars->admin_role[$this->_vars->value['role_id']]['role_name'] ; ?></td>
                            <td> <?php echo $this->_vars->value['uname'] ; ?></td>
                            <td> <?php echo $this->_vars->value['name'] ; ?></td>
                            <th><?php if($this->_vars->value['disabled']=='0' ) {  ?>启用<?php } else { ?>禁用<?php } ?></th>
                            <td>
                                <div class="btn-group">
                                	<?php if($this->_vars->value['role_id'] != 3 ) {  ?>
                                    <a class="btn btn-small show-tooltip" title="Edit"
                                       href="<?php echo base_url() ; ?>sys/admin/detail/<?php echo $this->_vars->value['admin_id'] ; ?>"><i
                                            class="icon-edit"></i></a>
                                    <a class="btn btn-small btn-danger show-tooltip" title="Delete" href="<?php echo base_url() ; ?>sys/admin/del/<?php echo $this->_vars->value['admin_id'] ; ?>" onclick="return confirm('确认删除？');"><i class="icon-trash"></i></a>
                                	<?php } ?>
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