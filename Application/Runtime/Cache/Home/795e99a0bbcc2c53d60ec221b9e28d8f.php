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
<link rel="stylesheet" type="text/css" href="/Public/Home/Css/account_info.css">
	<script>
		$(function(){
			highlight_subnav("<?php echo U('Home/Account/editInvestorPass');?>");
			$("#pas1").blur(function(){
		      	var temp = $(this).val().match(/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/);
		        if(!$(this).val() || !temp)
		        {
		            $("#pas1Tip").html("密码不能为空且只能为英文或者数字");
		            $("#pas1Tip").removeClass('label label-success');
		            $("#pas1Tip").addClass('label label-warning');
		        }
		        else
		        {
		            $("#pas1Tip").html("输入正确");
		            $("#pas1Tip").removeClass('label label-warning');
		            $("#pas1Tip").addClass('label label-success');
		        }

		     });
		     $("#pas2").blur(function(){
		        if(!$(this).val() || $(this).val() != $("#pas1").val())
		        {
		            $("#pas2Tip").html("密码为空或者和上面的密码不致");
		            $("#pas2Tip").removeClass('label label-success');
		            $("#pas2Tip").addClass('label label-warning');
		        }
		        else
		        {
		            $("#pas2Tip").html("输入正确");
		            $("#pas2Tip").removeClass('label label-warning');
		            $("#pas2Tip").addClass('label label-success');
		            //验证通过后提交
		            $('#submit').bind('click',function(){
		            	layer.confirm('确定修改密码？',function(){
		            		var editInvestorPassUrl = "<?php echo U('Home/Account/editInvestorPass');?>";
							var getpwd = $("#pas2").val();
				    		ajaxReturn(editInvestorPassUrl,{getpwd:getpwd},function(){},function(res){
								if(res.status){
									layer.alert('修改成功',{icon:1});
									window.location.reload();
								}else{
									layer.alert('修改失败',{icon:2});
								}
							});
		            	});	
			    	});
		        }
		    });
		})
	</script>	
</head>
<body>
	<div class="topmenu">
	<div id="logo">
		<a href=""></a>
	</div>
	<div id="topright">
		<div class="login-name">
			<span class="login"><?php echo session('uname');?></span><br/>
			<span class="name"><?php echo session('uname');?></span>
		</div>
		<ul class="list-menu">
			<li onclick="logout()"><a href="javascript:void(0)"><h1 class="glyphicon glyphicon-off"></h1><span>退出系统</span></a></li>
			<!-- <li><a href=""><h1 class="glyphicon glyphicon-headphones"></h1><span>工单服务</span></a></li> -->
			<li><a href="<?php echo U('Home/Account/index');?>"><h1 class="glyphicon glyphicon-list-alt"></h1><span>账户信息</span></a></li>
			<li><a href="<?php echo U('Home/Transaction/historyOrder');?>"><h1 class="glyphicon glyphicon-time"></h1><span>历史交易</span></a></li>
			<li><a href="<?php echo U('Home/Transaction/index');?>"><h1 class="glyphicon glyphicon-piggy-bank"></h1><span>持仓订单</span></a></li>
			<li><a href="<?php echo U('Home/Payment/outPayment');?>"><h1 class="glyphicon glyphicon-minus"></h1><span>账户出金</span></a></li>
			<li><a href="<?php echo U('Home/Payment/index');?>"><h1 class="glyphicon glyphicon-plus"></h1><span>账户入金</span></a></li>
			<li><a href="<?php echo U('Home/Index/index');?>"><h1 class="glyphicon glyphicon-home"></h1><span>系统主页</span> </a></li>		
		</ul>
	</div>
</div>
	<div class="mainbody">
		<div class="leftmenu">
	<ul class="menu">
		<li>
			<a class="menu-title menu-title-current">
				<span class="glyphicon glyphicon-user"></span>
				<span>账户管理</span>
			</a>	 
			<ul class="menu01">
				<li>	
					<h2 class="menu001-sub">常用</h2>
					<ul class="menu001">
						<li><a href="<?php echo U('Home/Account/index');?>"><span class="glyphicon glyphicon-modal-window"></span>账户信息</a></li>
						<li><a href="<?php echo U('Home/Account/total');?>"><span class="glyphicon glyphicon-object-align-horizontal"></span>账户统计</a></li>
						<li><a href="<?php echo U('Home/Account/traderList');?>"><span class="glyphicon glyphicon-calendar"></span>交易报表</a></li>
					</ul>
				</li>
				<li>
					<h2 class="menu001-sub">资料更改</h2>
					<ul class="menu001">
						<li><a href="<?php echo U('Home/Account/editLeverage');?>"><span class="glyphicon glyphicon-edit"></span>更改杠杠</a></li>
						<li><a href="<?php echo U('Home/Account/editMobile');?>"><span class="glyphicon glyphicon-phone"></span>更换手机</a></li>
						<li><a href="<?php echo U('Home/Account/editMail');?>"><span class="glyphicon glyphicon-envelope"></span>更换电邮</a></li>
					</ul>
				</li>
				<li>
					<h2 class="menu001-sub">安全设置</h2>
					<ul class="menu001">
						<li><a href="<?php echo U('Home/Account/editMainPass');?>"><span class="glyphicon glyphicon-lock"></span>主密码</a></li>
						<li><a href="<?php echo U('Home/Account/editInvestorPass');?>"><span class="glyphicon glyphicon-lock"></span>投资人密码</a></li>
					</ul>
				</li>
			</ul>
		</li>
	</ul>
	<ul class="menu">
		<li>
			<a class="menu-title">
				<span class="glyphicon glyphicon-sort"></span>
				<span class="menu1-info">出入金管理</span>
			</a>	 
			<ul class="menu01" style="display:none">
				<li>	
					<h2 class="menu001-sub">入金相关</h2>
					<ul class="menu001">
						<li><a href="<?php echo U('Home/Payment/index');?>"><span class="glyphicon glyphicon-log-in"></span>账户入金</a></li>
						<li><a href="<?php echo U('Home/Payment/inRecords');?>"><span class="glyphicon glyphicon-th"></span>入金记录</a></li>
						<li><a href="<?php echo U('Home/Payment/inTotal');?>"><span class="glyphicon glyphicon-list-alt"></span>入金统计</a></li>
					</ul>
				</li>
				<li>
					<h2 class="menu001-sub">出金相关</h2>
					<ul class="menu001">
						<li><a href="<?php echo U('Home/Payment/outPayment');?>"><span class="glyphicon glyphicon-log-out"></span>账户出金</a></li>
						<li><a href="<?php echo U('Home/Payment/outRecords');?>"><span class="glyphicon glyphicon-th"></span>出金记录</a></li>
						<li><a href="<?php echo U('Home/Payment/outTotal');?>"><span class="glyphicon glyphicon-list-alt"></span>出金统计</a></li>
					</ul>
				</li>
			</ul>
		</li>
	</ul>
	<ul class="menu">
		<li>
			<a class="menu-title">
				<span class="glyphicon glyphicon-time"></span>
				<span class="menu1-info">交易管理</span>
			</a>	 
			<ul class="menu01" style="display:none">
				<li>
					<h2 class="menu001-sub">当前持仓</h2>	
					<ul class="menu001">
						<li><a href="<?php echo U('Home/Transaction/index');?>"><span class="glyphicon glyphicon-plus-sign"></span>全部</a></li>
						<li><a href="<?php echo U('Home/Transaction/order');?>"><span class="glyphicon glyphicon-th-list"></span>订单</a></li>
						<li><a href="<?php echo U('Home/Transaction/pending');?>"><span class="glyphicon glyphicon-arrow-down"></span>挂单</a></li>
					</ul>
				</li>
				<li>
					<h2 class="menu001-sub">历史交易</h2>
					<ul class="menu001">
						<li><a href="<?php echo U('Home/Transaction/historyOrder');?>"><span class="glyphicon glyphicon-minus-sign"></span>订单</a></li>
						<li><a href="<?php echo U('Home/Transaction/outAndInRecords');?>"><span class="glyphicon glyphicon-th-list"></span>出入金</a></li>
						<li><a href="<?php echo U('Home/Transaction/historyPending');?>"><span class="glyphicon glyphicon-arrow-up"></span>挂单</a></li>
					</ul>
				</li>
			</ul>
		</li>
	</ul>
</div>
		<div class="content-body">
			<h2 class="body-title">投资人密码</h2>
			<div class="content">	
				<div class="alert alert-info alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>提示:</strong> 投资人密码用于交易客户端的登陆（仅限数据查看）
				</div>
				<div class="content-l">
					<form class="form-horizontal" role="form">
						<div class="form-group">
					    	<label class="col-sm-2 control-label">帐号：</label>
					    	<div class="col-sm-4">
					    		<p class="form-control-static"><span class="label label-info" style="font-size:18px;">600777</span></p>
					    	</div>  
					    </div>
					    <div class="form-group">
					    	<label class="col-sm-2 control-label">新的密码：</label>
					    	<div class="col-sm-4">
					    		<input type="password" class="form-control" id="pas1" placeholder="新密码必须包含数字和字母"><label id="pas1Tip"></label>
					    	</div>   
					    </div>
					    <div class="form-group">
					    	<label class="col-sm-2 control-label">再输一次：</label>
					    	<div class="col-sm-4">
					    		<input type="password" class="form-control" id="pas2" placeholder="请重新输入密码"><label id="pas2Tip"></label>
					    	</div>				        
					    </div>
					    <div class="form-group" style="width: 30%;margin:40px auto;">
							<button type="button" id="submit" class="btn btn-success btn-block">确认并提交</button>
						</div>
					</form>
					
				</div>
			</div><!--content-->	
		</div>		
	</div>		
</body>
</html>