<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>热炼私坊健身后台管理系统</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<meta name="viewport"
	content="target-densitydpi=device-dpi, width=766, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<link rel="stylesheet"
	href="<?php echo base_url() ; ?>static/assets/bootstrap/bootstrap.min.css">
<link rel="stylesheet"
	href="<?php echo base_url() ; ?>static/assets/bootstrap/bootstrap-responsive.min.css">
<link rel="stylesheet"
	href="<?php echo base_url() ; ?>static/assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet"
	href="<?php echo base_url() ; ?>static/assets/normalize/normalize.css">

<link rel="stylesheet" href="<?php echo base_url() ; ?>static/css/flaty.css">
<link rel="stylesheet"
	href="<?php echo base_url() ; ?>static/css/flaty-responsive.css">


<?php if(isset($this->_vars->headerCss) && !empty($this->_vars->headerCss) ) {  ?>
<?php foreach($this->_vars->headerCss as $this->_vars->key => $this->_vars->value ) {  ?>
<link href="<?php echo base_url() ; ?>static/css/<?php echo $this->_vars->value ; ?>"
	rel="stylesheet">
<?php } ?>
<?php } ?>
</head>
<body class="skin-black">


	<!-- BEGIN Navbar -->
	<div id="navbar" class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<!-- BEGIN Brand -->
				<a href="#" class="brand"> <small> <i
						class="icon-desktop"></i> 热炼私坊健身后台管理系统
				</small>
				</a>
				<!-- END Brand -->

				<!-- BEGIN Responsive Sidebar Collapse -->
				<a href="#" class="btn-navbar collapsed" data-toggle="collapse"
					data-target=".nav-collapse"> <i class="icon-reorder"></i>
				</a>
				<!-- END Responsive Sidebar Collapse -->

				<!-- BEGIN Navbar Buttons -->
				<ul class="nav flaty-nav pull-right">
					<li class="user-profile">dadfa</li>
					<!-- BEGIN Button User -->
					<li class="user-profile"><a data-toggle="dropdown" href="#"
						class="user-menu dropdown-toggle"> <img class="nav-user-photo"
							src="<?php echo $this->_vars->pic_persion ; ?>" alt="Welcome" /> <span
							class="hidden-phone" id="user_info"> <?php echo $this->_vars->username ; ?>
						</span> <i class="icon-caret-down"></i>
					</a> <!-- BEGIN User Dropdown -->
						<ul class="dropdown-menu dropdown-navbar" id="user_menu">
							<li class="nav-header"><i class="icon-time"></i> Logined
								From <?php echo $this->_vars->login_dateline ; ?></li>

							<li><a href="<?php echo base_url() ; ?>pwd"> <i
									class="icon-user"></i> 修改密码
							</a></li>

							<li><a href="mailto:441549088@qq.com"> <i
									class="icon-question"></i> Help
							</a></li>

							<li class="divider"></li>
							<li><a href="<?php echo base_url() ; ?>welcome/loginOut">
									<i class="icon-off"></i> 退出
							</a></li>
						</ul> <!-- BEGIN User Dropdown --></li>
					<!-- END Button User -->
				</ul>
				<!-- END Navbar Buttons -->
			</div>
			<!--/.container-fluid-->
		</div>
		<!--/.navbar-inner-->
	</div>
	<!-- END Navbar -->

	<!-- BEGIN Container -->
	<div class="container-fluid" id="main-container">
		<?php $this->display('inc/menu.html', array (
)); ?>