<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>manage</title>
	<script type="text/javascript" src="/Public/Static/jquery-1.10.2.min.js"></script>
	<link rel="stylesheet" href="/Public/Static/bootstrapv3/css/bootstrap.min.css">
	<script type="text/javascript" src="/Public/Static/bootstrapv3/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/Public/Static/layer/layer.js"></script>
	<script type="text/javascript" src="/Public/Static/layer/extend/layer.ext.js"></script>
	<script type="text/javascript" src="/Public/Manage/Js/common.js"></script>
	<link rel="stylesheet" href="/Public/Manage/Css/main.css">
	<script>
		var loginUrl = "<?php echo U('Manage/Public/login');?>";
		var logoutUrl = "<?php echo U('Manage/Public/logout');?>";
	</script>

</head>
<body>
	<div class="topmenu">
	<div id="logo">
		<h1 style="color:#fff;">管理员后台</h1>
	</div>
	<div id="topright">
		<div class="login-name">
			<span class="login"><?php echo session('uname');?></span><br/>
			<!-- <span class="name">adfdfjkdsjfls</span> -->
		</div>
		<ul class="list-menu">
			<li onclick="logout()"><a href="javascript:void(0)"><h1 class="glyphicon glyphicon-off"></h1><span>退出系统</span></a></li>
			<!-- <li><a href=""><h1 class="glyphicon glyphicon-headphones"></h1><span>工单服务</span></a></li>
			<li><a href=""><h1 class="glyphicon glyphicon-list-alt"></h1><span>账户信息</span></a></li>
			<li><a href=""><h1 class="glyphicon glyphicon-time"></h1><span>历史交易</span></a></li>
			<li><a href=""><h1 class="glyphicon glyphicon-piggy-bank"></h1><span>持仓订单</span></a></li>
			<li><a href=""><h1 class="glyphicon glyphicon-minus"></h1><span>账户出金</span></a></li>
			<li><a href=""><h1 class="glyphicon glyphicon-plus"></h1><span>账户入金</span></a></li>
			<li><a href=""><h1 class="glyphicon glyphicon-home"></h1><span>系统主页</span> </a></li> -->		
		</ul>
	</div>
</div>
	<div class="mainbody">
		<div class="leftmenu">
	<ul class="menu">
		<li>
			<a class="menu-title menu-title-current">
				<span class="glyphicon glyphicon-home"></span>
				<span>业务管理</span>
			</a>	 
			<ul class="menu01">
				<li>	
					<h2 class="menu001-sub">常用</h2>
					<ul class="menu001">
						<li><a href="<?php echo U('Manage/Business/checkWithdrawal');?>"><span class="glyphicon glyphicon-home"></span>出金审核</a></li>
					</ul>
				</li>
			</ul>
		</li>
		<li>
			<a class="menu-title menu-title-current">
				<span class="glyphicon glyphicon-home"></span>
				<span>管理员管理</span>
			</a>	 
			<ul class="menu01">
				<li>	
					<ul class="menu001">
						<li><a href="<?php echo U('Manage/User/lists');?>"><span class="glyphicon glyphicon-home"></span>管理员列表</a></li>
					</ul>
				</li>
			</ul>
		</li>
	</ul>
</div>
	
		<div class="content-body">
			<h2 class="body-title">管理员列表</h2>
			<div class="col-lg-12">
				<table class="table table-hover">
				  <thead>
				  	<tr>
				  		<th>名称</th>
				  		<th>性别</th>
				  		<th>email</th>
				  		<th>手机</th>
				  		<th>qq</th>
				  		<th>最后登录时间</th>
				  		<th>最后登录IP</th>
				  		<!-- <th>状态</th>
				  		<th>操作</th> -->
				  	</tr>
				  </thead>
				  <tbody>
				  	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					  		<td><?php echo ($vo["username"]); ?></td>
					  		<td><?php echo ($vo["sex"]); ?></td>
					  		<td><?php echo ($vo["email"]); ?></td>
					  		<td><?php echo ($vo["mobile"]); ?></td>
					  		<td><?php echo ($vo["qq"]); ?></td>
					  		<td><?php echo (date("Y-m-d H:i:s",$vo["last_login_time"])); ?></td>
					  		<td><?php echo ($vo["last_login_ip"]); ?></td>
					  		
					  	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				  </tbody>
				</table>
				<?php echo ($page); ?>
			</div>
		</div>		
	</div>

		
</body>
</html>