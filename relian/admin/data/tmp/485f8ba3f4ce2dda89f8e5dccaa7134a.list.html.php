<?php $this->display('inc/header.html', array (
)); ?>

<!-- BEGIN Content -->
<div id="main-content">
    <!-- BEGIN Main Content -->
    <div class="row-fluid">
        <div class="span12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="icon-table"></i> 课程安排</h3>

                </div>
                <div class="box-content">
                	<form method="post" action="<?php echo base_url() ; ?>shop/schedule/save">
	                	<table class="table table-bordered">
	                		<thead>
	                			<tr>
		                			<th>分店</th>
		                			<th>教练</th>
		                			<th>日期</th>
	                			</tr>
	                		</thead>
	                		<tbody>
	                			<tr>
	                				<td>
	                					<select name="store_id" id="store" class="form-control">
								          	  <option></option>
											  <?php if(!empty($this->_vars->store) ) {  ?>						          
				                      		  <?php foreach($this->_vars->store as $this->_vars->key=>$this->_vars->value ) {  ?>
				                      		  <option value="<?php echo $this->_vars->key ; ?>"><?php echo $this->_vars->value ; ?></option>
				                      		  <?php } ?>
				                      		  <?php } ?>	
										</select>
	                				</td>
	                				<td>
	                					<select name="coach_id" id="coach" class="form-control" url="<?php echo base_url() ; ?>shop/schedule/get_coach_list/">
										</select>
	                				</td>
	                				<td>
	                					<input type="text" id="start_date" class="form-control" name="start_date"   value="<?php echo date('Y-m-d') ; ?>" 
	                					onfocus="WdatePicker({isShowWeek:true,readOnly:true,onpicking:function(dp){change_start_date(dp)}})" 
	                					url="<?php echo base_url() ; ?>shop/schedule/get_choose_schedule/" />
	                				</td>
	                			</tr>
	                		</tbody>
	                	</table>
	                    <div class="panel panel-default sep7">
	                    	<div class="pannel-body">
	                    		<div>
	                   				<input class="frq" type="text" value="" disabled />
	                   			</div>
		                   		<input type="checkbox" class="select_all" value="">全选&nbsp;&nbsp;&nbsp;&nbsp;
								<div class="checkbox">
									<label><input type="checkbox" name="k1time[]" value="1">8:00</label>
									<label><input type="checkbox" name="k1time[]" value="2">9:00</label>
									<label><input type="checkbox" name="k1time[]" value="3">10:00</label>
									<label><input type="checkbox" name="k1time[]" value="4">11:00</label>
									<label><input type="checkbox" name="k1time[]" value="5">12:00</label>
									<label><input type="checkbox" name="k1time[]" value="6">13:00</label>
									<label><input type="checkbox" name="k1time[]" value="7">14:00</label>
									<label><input type="checkbox" name="k1time[]" value="8">15:00</label>
									<label><input type="checkbox" name="k1time[]" value="9">16:00</label>
									<label><input type="checkbox" name="k1time[]" value="10">17:00</label>
									<label><input type="checkbox" name="k1time[]" value="11">18:00</label>
									<label><input type="checkbox" name="k1time[]" value="12">19:00</label>
									<label><input type="checkbox" name="k1time[]" value="13">20:00</label>
									<label><input type="checkbox" name="k1time[]" value="14">21:00</label>
									<label><input type="checkbox" name="k1time[]" value="15">22:00</label>
									<label><input type="checkbox" name="k1time[]" value="16">23:00</label>
								</div>
	                    	</div>
	                    </div>
	                    <div class="panel panel-default sep7">
	                    	<div class="pannel-body">
	                    		<div>
	                   				<input class="frq" type="text" value="" disabled />
	                   			</div>
	                   			<input type="checkbox" class="select_all" value="">全选&nbsp;&nbsp;&nbsp;&nbsp;
								<div class="checkbox">
									<label><input type="checkbox" name="k2time[]" value="1">8:00</label>
									<label><input type="checkbox" name="k2time[]" value="2">9:00</label>
									<label><input type="checkbox" name="k2time[]" value="3">10:00</label>
									<label><input type="checkbox" name="k2time[]" value="4">11:00</label>
									<label><input type="checkbox" name="k2time[]" value="5">12:00</label>
									<label><input type="checkbox" name="k2time[]" value="6">13:00</label>
									<label><input type="checkbox" name="k2time[]" value="7">14:00</label>
									<label><input type="checkbox" name="k2time[]" value="8">15:00</label>
									<label><input type="checkbox" name="k2time[]" value="9">16:00</label>
									<label><input type="checkbox" name="k2time[]" value="10">17:00</label>
									<label><input type="checkbox" name="k2time[]" value="11">18:00</label>
									<label><input type="checkbox" name="k2time[]" value="12">19:00</label>
									<label><input type="checkbox" name="k2time[]" value="13">20:00</label>
									<label><input type="checkbox" name="k2time[]" value="14">21:00</label>
									<label><input type="checkbox" name="k2time[]" value="15">22:00</label>
									<label><input type="checkbox" name="k2time[]" value="16">23:00</label>
								</div>
	                    	</div>
	                    </div>
	                    <div class="panel panel-default sep7">
	                    	<div class="pannel-body">
	                    		<div>
	                   				<input class="frq" type="text" value="" disabled />
	                   			</div>
	                   			<input type="checkbox" class="select_all" value="">全选&nbsp;&nbsp;&nbsp;&nbsp;
								<div class="checkbox">
									<label><input type="checkbox" name="k3time[]" value="1">8:00</label>
									<label><input type="checkbox" name="k3time[]" value="2">9:00</label>
									<label><input type="checkbox" name="k3time[]" value="3">10:00</label>
									<label><input type="checkbox" name="k3time[]" value="4">11:00</label>
									<label><input type="checkbox" name="k3time[]" value="5">12:00</label>
									<label><input type="checkbox" name="k3time[]" value="6">13:00</label>
									<label><input type="checkbox" name="k3time[]" value="7">14:00</label>
									<label><input type="checkbox" name="k3time[]" value="8">15:00</label>
									<label><input type="checkbox" name="k3time[]" value="9">16:00</label>
									<label><input type="checkbox" name="k3time[]" value="10">17:00</label>
									<label><input type="checkbox" name="k3time[]" value="11">18:00</label>
									<label><input type="checkbox" name="k3time[]" value="12">19:00</label>
									<label><input type="checkbox" name="k3time[]" value="13">20:00</label>
									<label><input type="checkbox" name="k3time[]" value="14">21:00</label>
									<label><input type="checkbox" name="k3time[]" value="15">22:00</label>
									<label><input type="checkbox" name="k3time[]" value="16">23:00</label>
								</div>
	                    	</div>
	                    </div>
	                    <div class="panel panel-default sep7">
	                    	<div class="pannel-body">
	                    		<div>
	                   				<input class="frq" type="text" value="" disabled />
	                   			</div>
	                   			<input type="checkbox" class="select_all" value="">全选&nbsp;&nbsp;&nbsp;&nbsp;
								<div class="checkbox">
									<label><input type="checkbox" name="k4time[]" value="1">8:00</label>
									<label><input type="checkbox" name="k4time[]" value="2">9:00</label>
									<label><input type="checkbox" name="k4time[]" value="3">10:00</label>
									<label><input type="checkbox" name="k4time[]" value="4">11:00</label>
									<label><input type="checkbox" name="k4time[]" value="5">12:00</label>
									<label><input type="checkbox" name="k4time[]" value="6">13:00</label>
									<label><input type="checkbox" name="k4time[]" value="7">14:00</label>
									<label><input type="checkbox" name="k4time[]" value="8">15:00</label>
									<label><input type="checkbox" name="k4time[]" value="9">16:00</label>
									<label><input type="checkbox" name="k4time[]" value="10">17:00</label>
									<label><input type="checkbox" name="k4time[]" value="11">18:00</label>
									<label><input type="checkbox" name="k4time[]" value="12">19:00</label>
									<label><input type="checkbox" name="k4time[]" value="13">20:00</label>
									<label><input type="checkbox" name="k4time[]" value="14">21:00</label>
									<label><input type="checkbox" name="k4time[]" value="15">22:00</label>
									<label><input type="checkbox" name="k4time[]" value="16">23:00</label>
								</div>
	                    	</div>
	                    </div>
	                    <div class="panel panel-default sep7">
	                    	<div class="pannel-body">
	                    		<div>
	                   				<input class="frq" type="text" value="" disabled />
	                   			</div>
	                   			<input type="checkbox" class="select_all" value="">全选&nbsp;&nbsp;&nbsp;&nbsp;
								<div class="checkbox">
									<label><input type="checkbox" name="k5time[]" value="1">8:00</label>
									<label><input type="checkbox" name="k5time[]" value="2">9:00</label>
									<label><input type="checkbox" name="k5time[]" value="3">10:00</label>
									<label><input type="checkbox" name="k5time[]" value="4">11:00</label>
									<label><input type="checkbox" name="k5time[]" value="5">12:00</label>
									<label><input type="checkbox" name="k5time[]" value="6">13:00</label>
									<label><input type="checkbox" name="k5time[]" value="7">14:00</label>
									<label><input type="checkbox" name="k5time[]" value="8">15:00</label>
									<label><input type="checkbox" name="k5time[]" value="9">16:00</label>
									<label><input type="checkbox" name="k5time[]" value="10">17:00</label>
									<label><input type="checkbox" name="k5time[]" value="11">18:00</label>
									<label><input type="checkbox" name="k5time[]" value="12">19:00</label>
									<label><input type="checkbox" name="k5time[]" value="13">20:00</label>
									<label><input type="checkbox" name="k5time[]" value="14">21:00</label>
									<label><input type="checkbox" name="k5time[]" value="15">22:00</label>
									<label><input type="checkbox" name="k5time[]" value="16">23:00</label>
								</div>
	                    	</div>
	                    </div>
	                    <div class="panel panel-default sep7">
	                    	<div class="pannel-body">
	                    		<div>
	                   				<input class="frq" type="text" value="" disabled />
	                   			</div>
	                   			<input type="checkbox" class="select_all" value="">全选&nbsp;&nbsp;&nbsp;&nbsp;
								<div class="checkbox">
									<label><input type="checkbox" name="k6time[]" value="1">8:00</label>
									<label><input type="checkbox" name="k6time[]" value="2">9:00</label>
									<label><input type="checkbox" name="k6time[]" value="3">10:00</label>
									<label><input type="checkbox" name="k6time[]" value="4">11:00</label>
									<label><input type="checkbox" name="k6time[]" value="5">12:00</label>
									<label><input type="checkbox" name="k6time[]" value="6">13:00</label>
									<label><input type="checkbox" name="k6time[]" value="7">14:00</label>
									<label><input type="checkbox" name="k6time[]" value="8">15:00</label>
									<label><input type="checkbox" name="k6time[]" value="9">16:00</label>
									<label><input type="checkbox" name="k6time[]" value="10">17:00</label>
									<label><input type="checkbox" name="k6time[]" value="11">18:00</label>
									<label><input type="checkbox" name="k6time[]" value="12">19:00</label>
									<label><input type="checkbox" name="k6time[]" value="13">20:00</label>
									<label><input type="checkbox" name="k6time[]" value="14">21:00</label>
									<label><input type="checkbox" name="k6time[]" value="15">22:00</label>
									<label><input type="checkbox" name="k6time[]" value="16">23:00</label>
								</div>
	                    	</div>
	                    </div>
	                    <div class="panel panel-default sep7">
                    	<div class="pannel-body">
                    		<div>
                   				<input class="frq" type="text" value="" disabled />
                   			</div>
                   			<input type="checkbox" class="select_all" value="">全选&nbsp;&nbsp;&nbsp;&nbsp;
							<div class="checkbox">
								<label><input type="checkbox" name="k7time[]" value="1">8:00</label>
								<label><input type="checkbox" name="k7time[]" value="2">9:00</label>
								<label><input type="checkbox" name="k7time[]" value="3">10:00</label>
								<label><input type="checkbox" name="k7time[]" value="4">11:00</label>
								<label><input type="checkbox" name="k7time[]" value="5">12:00</label>
								<label><input type="checkbox" name="k7time[]" value="6">13:00</label>
								<label><input type="checkbox" name="k7time[]" value="7">14:00</label>
								<label><input type="checkbox" name="k7time[]" value="8">15:00</label>
								<label><input type="checkbox" name="k7time[]" value="9">16:00</label>
								<label><input type="checkbox" name="k7time[]" value="10">17:00</label>
								<label><input type="checkbox" name="k7time[]" value="11">18:00</label>
								<label><input type="checkbox" name="k7time[]" value="12">19:00</label>
								<label><input type="checkbox" name="k7time[]" value="13">20:00</label>
								<label><input type="checkbox" name="k7time[]" value="14">21:00</label>
								<label><input type="checkbox" name="k7time[]" value="15">22:00</label>
								<label><input type="checkbox" name="k7time[]" value="16">23:00</label>
							</div>
                    	</div>
                    </div>
						<div>
	                		<input type="submit" class="btn btn-primary" id="button" value="保存">
	                	</div>
					</form>
                    <div class="clearfix"></div>
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