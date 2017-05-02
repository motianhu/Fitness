<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>后台管理系统</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="<?php echo base_url() ; ?>static/assets/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url() ; ?>static/css/flaty.css">
</head>

<body class="login-page">
<!-- BEGIN Main Content -->
<div class="login-wrapper">
    <!-- BEGIN Login Form -->
    <form action="<?php echo base_url() ; ?>login/toLogin" method="post" name="loginForm" id="loginForm">
        <h3>Login to your account</h3>
        <h4 class="smaller">
        	<?php if($this->_vars->error ==1 ) {  ?>(用户名密码错误)
        	<?php } elseif( $this->_vars->error==2 ) {  ?>(验证码错误)
            <?php } elseif( $this->_vars->error==3 ) {  ?>(登录过期，重新登录)
            <?php } ?>
        </h4>
        <hr/>       
        <div class="control-group">
            <div class="controls">
                <input type="text" name="username" id="username" placeholder="用户名" class="input-block-level" minlength="4" required />
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <input type="password" name="pwd" id="pwd" placeholder="密码" class="input-block-level" required minlength="6" />
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <input type="text" name="code" id="code" placeholder="验证码" class="input-block-level" style="width: 60%;" minlength="4" required />
                <a  href='javascript:refresh_code()' id='refresh_code' ><img id='code_img'
                    src="<?php echo base_url() ; ?>login/refresh_code" />
                    换一个</a>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" name="loginSubmit" id="loginSubmit" class="btn btn-primary input-block-level">登陆</button>
            </div>
        </div>
    </form>
    <!-- END Login Form -->
</div>
<script type="text/javascript">
    function refresh_code() {
        document.getElementById("code_img").src = "<?php echo base_url() ; ?>login/refresh_code?rand=" + Math.random();
    } 
</script>
</body>
</html>
