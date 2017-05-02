<?php $this->display('inc/header.html', array (
)); ?>

<!-- BEGIN Content -->
<div id="main-content">
    <!-- BEGIN Main Content -->
    <div class="row-fluid">
        <div class="span12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="icon-table"></i> 教练列表</h3>
					 <?php if($this->_vars->role_id <= 2 ) {  ?>
                    <div class="btn-toolbar pull-right clearfix">
                        <div class="btn-group">
                            <a class="btn btn-circle show-tooltip" title="增加教练"
                               href="<?php echo base_url() ; ?>shop/coach/detail/"><i class="icon-plus"></i></a>
                        </div>
                    </div>
                     <?php } ?>	
                </div>
                <div class="box-content">
					<form name="form" id="pform" method="post" action="<?php echo base_url() ; ?>shop/coach/">
				         <?php if($this->_vars->role_id == 1 ) {  ?>
				         <span>分店：</span>
				          <select name="store_id" class="form-control">
				          	  <option></option>
							  <?php if(!empty($this->_vars->store) ) {  ?>						          
                       		  <?php foreach($this->_vars->store as $this->_vars->key=>$this->_vars->value ) {  ?>
                       		  <option value="<?php echo $this->_vars->key ; ?>" <?php if($this->_vars->key == $this->_vars->store_id ) {  ?>selected<?php } ?>><?php echo $this->_vars->value ; ?></option>
                       		  <?php } ?>
                       		  <?php } ?>	
						</select>
					
						<span>姓名：</span>
				        <input type="text" name="name" value="<?php echo $this->_vars->name ; ?>" class="form-control">
                        &nbsp;&nbsp;<input type="submit" class="btn btn-info" id="button" value="搜索">
                    	<?php } ?>
                    </form>                     
                    <div class="clearfix"></div>
                    <table class="table table-advance" id="table1">
                        <thead>
                        <tr>
                            <th>用户名</th>
                            <th>姓名</th>
                            <th>分店</th>
                            <th>状态</th>
                            <th style="width:100px">操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php if(!empty($this->_vars->list['data']) ) {  ?>
                        <?php foreach($this->_vars->list['data'] as $this->_vars->key => $this->_vars->value ) {  ?>
                        <tr>
                            <td> <?php echo $this->_vars->value['uname'] ; ?></td>
                            <td> <?php echo $this->_vars->value['name'] ; ?></td>
                            <td> <?php echo $this->_vars->store[$this->_vars->value['store_id']] ; ?></td>
                            <th><?php if($this->_vars->value['disabled']=='0' ) {  ?>启用<?php } else { ?>禁用<?php } ?></th>
                            <td>
                                <div class="btn-group">
                                	<div>
                                	<a class="btn btn-small show-tooltip" title="Edit"
                                       href="<?php echo base_url() ; ?>shop/coach/course/<?php echo $this->_vars->value['admin_id'] ; ?>">课程管理</a>
                                    </div>
                                    <a class="btn btn-small show-tooltip" title="Edit"
                                       href="<?php echo base_url() ; ?>shop/coach/detail/<?php echo $this->_vars->value['admin_id'] ; ?>"><i
                                            class="icon-edit"></i></a>
                                    <a class="btn btn-small btn-danger show-tooltip" title="Delete" href="<?php echo base_url() ; ?>shop/coach/del/<?php echo $this->_vars->value['admin_id'] ; ?>" onclick="return confirm('确认删除？');"><i class="icon-trash"></i></a>
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