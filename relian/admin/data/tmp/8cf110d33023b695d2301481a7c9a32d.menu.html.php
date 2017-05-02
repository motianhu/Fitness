<!-- BEGIN Sidebar -->
<div id="sidebar" class="nav-collapse">
    <!-- BEGIN Navlist -->
    <ul class="nav nav-list">

        <li>
            <a href="<?php echo base_url() ; ?>welcome/">
                <i class="icon-dashboard"></i>
                <span>控制面板</span>
            </a>
        </li>
		<?php foreach($this->_vars->menu as $this->_vars->val ) {  ?>
        <li>
            <a href="#" class="dropdown-toggle">
                <i class="icon-th-list"></i>
                <span><?php echo $this->_vars->val['menu_name'] ; ?></span>
                <b class="arrow icon-angle-down"></b>
            </a>
            <!-- BEGIN Submenu -->
            <ul class="submenu" <?php if($this->_vars->val['model'] != substr($this->_vars->uri_string, 0,strpos($this->_vars->uri_string,'/')) ) {  ?>style="display:none;"<?php } ?>>
            	<?php if(isset($this->_vars->val['child']) ) {  ?>
            	<?php foreach($this->_vars->val['child'] as $this->_vars->value ) {  ?>
                <li><a href="<?php echo base_url() ; ?><?php echo $this->_vars->value['ctrl'] ; ?>/<?php echo $this->_vars->value['act'] ; ?>"><?php echo $this->_vars->value['menu_name'] ; ?></a></li>
                <?php } ?>
            	<?php } ?>
            </ul>
            <!-- END Submenu -->
        </li>
		<?php } ?>

    </ul>
    <!-- END Navlist -->

    <!-- BEGIN Sidebar Collapse Button -->
    <div id="sidebar-collapse" class="visible-desktop">
        <i class="icon-double-angle-left"></i>
    </div>
    <!-- END Sidebar Collapse Button -->
</div>
<!-- END Sidebar -->