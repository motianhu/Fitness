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
                     <form name="form" id="pform" method="post" action="<?php echo base_url() ; ?>shop/order/index/" style="margin-bottom:8px;">
				         <?php if($this->_vars->role_id == 1 ) {  ?>
				         <span>分店：</span>
				          <select name="store_id" class="form-control" style="width:150px;">
				          	  <option></option>
							  <?php if(!empty($this->_vars->store) ) {  ?>						          
                       		  <?php foreach($this->_vars->store as $this->_vars->key=>$this->_vars->value ) {  ?>
                       		  <option value="<?php echo $this->_vars->key ; ?>" <?php if($this->_vars->key == $this->_vars->store_id ) {  ?>selected<?php } ?>><?php echo $this->_vars->value ; ?></option>
                       		  <?php } ?>
                       		  <?php } ?>	
						</select>
						<?php } ?>
						 <?php if($this->_vars->role_id <= 2 ) {  ?>
						<span>教练：</span>
						<input type="text" name="coach_name" value="<?php echo $this->_vars->coach_name ; ?>"  style="width:120px;" />
						<?php } ?>
						<span>日期：</span>
						<input type="text" name="date"  style="width:120px;" value="<?php echo $this->_vars->date ; ?>" class="Wdate search_time" onClick="WdatePicker({readOnly:true,dateFmt:'yyyy-MM-dd'})" />								
						<span>开始时间：</span>
						<input type="text" name="time"  style="width:120px;" value="<?php echo $this->_vars->time ; ?>" class="Wdate search_time" onClick="WdatePicker({readOnly:true,dateFmt:'HH:00'})" />
						<span>状态：</span>
				          <select name="status" class="form-control" style="width:80px;">
				          	  <option></option>
                       		  <?php foreach($this->_vars->status as $this->_vars->k=>$this->_vars->v ) {  ?>
                       		  <option value="<?php echo $this->_vars->k ; ?>" <?php if($this->_vars->cstatus != NULL && $this->_vars->cstatus != '' && $this->_vars->k == $this->_vars->cstatus ) {  ?>selected<?php } ?>><?php echo $this->_vars->v ; ?></option>
                       		  <?php } ?>
						</select>
                        &nbsp;&nbsp;<input type="submit" class="btn btn-info" id="button" value="搜索">
	                </form>                     
                    <div class="clearfix"></div>
                    <table class="table table-advance" id="table1">
                        <thead>
                        <tr>
                        	<th>订单号</th>
                            <th>下单人</th>                            
                            <th>分店</th>
                            <th>课程</th>
                            <th>教练</th>
                            <th>人数</th>
                            <th>时间</th>
                            <th>金额</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php if(!empty($this->_vars->list['data']) ) {  ?>
                        <?php foreach($this->_vars->list['data'] as $this->_vars->value ) {  ?>
                        <tr>
                        	<td><?php echo $this->_vars->value['order_sn'] ; ?></td>
                            <td><?php echo $this->_vars->value['nickname'] ; ?></td>
                            <td><?php echo $this->_vars->value['store_name'] ; ?></td>
                            <td><?php echo $this->_vars->value['course_name'] ; ?></td>
                            <td><?php echo $this->_vars->value['coach_name'] ; ?></td>
                            <td><?php echo $this->_vars->value['num'] ; ?></td>
                            <td><?php echo $this->_vars->value['date'] ; ?> <?php echo $this->_vars->value['time'] ; ?></td>
                            <td><?php echo $this->_vars->value['payment'] ; ?></td>
                            <td><?php echo isset($this->_vars->status[$this->_vars->value['status']])?$this->_vars->status[$this->_vars->value['status']]:'未知状态' ; ?></td>
                        	<td>
                            	<div class="btn-group">
                                    <a class="btn btn-small show-tooltip" title="view"
                                       href="<?php echo base_url() ; ?>shop/order/detail/<?php echo $this->_vars->value['order_id'] ; ?>"><i
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