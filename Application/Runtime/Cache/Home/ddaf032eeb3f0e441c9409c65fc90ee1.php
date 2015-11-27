<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="renderer" content="webkit"/>
	<title>office</title>
	<script type="text/javascript" src="/Public/Static/jquery-1.10.2.min.js"></script>
	<link rel="stylesheet" href="/Public/Static/bootstrapv3/css/bootstrap.min.css">
	<script type="text/javascript" src="/Public/Static/bootstrapv3/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/Public/Static/layer/layer.js"></script>
	<script type="text/javascript" src="/Public/Home/Js/common.js"></script>
	<link rel="stylesheet" href="/Public/Home/Css/main.css">
	<script>
		var loginUrl = "<?php echo U('Home/Public/login');?>";
		var logoutUrl = "<?php echo U('Home/Public/logout');?>";
	</script>
	<link rel="stylesheet" href="/Public/Home/Css/login.css">
	<script>
		$(function(){
			$('#submit').bind('click',function(res){
				var params = {
					account : $.trim($('[name=account]').val()),
					password : $.trim($('[name=password]').val()),
				}
				if(params.account=='' || params.password == ''){
					layer.alert('账号和密码必须',{icon:2});
					return false;
				}
				ajaxReturn("<?php echo U('Home/Public/login');?>",params,function(){

				},function(res){
					if(res.status){
						window.location.href="<?php echo U('Home/Index/index');?>";
					}else{
						layer.alert(res.info,{icon:2})
					}
				})
			})
		})
	</script>
</head>
<body>
	<header></header>
	<div class="main">
		
		
		<div class="container main-content">
			<div class="logo">
				<img src="/Public/Home/Images/login.png" alt="">
				<h1>Member Login</h1>
			</div>
	      	<div class="form-horizontal">
				<div class="form-group">
				    <label class="col-sm-2 control-label">Account</label>
				    <div class="col-sm-10">
				      <input type="text" name="account" class="form-control" placeholder="Account">
				    </div>
				</div>
				<div class="form-group">
				    <label class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-10">
				      <input type="password" name="password" class="form-control" placeholder="Password">
				    </div>
				</div>
				<!-- <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <div class="checkbox">
				        <label>
				          <input type="checkbox"> Remember me
				        </label>
				      </div>
				    </div>
				</div> -->
				<div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button id='submit' class="btn btn-success radius">Sign in</button>
				    </div>
				</div>
			</div>
    	</div> 
	</div>
	<footer></footer>
</body>
</html>