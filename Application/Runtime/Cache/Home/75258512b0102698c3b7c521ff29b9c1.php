<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
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
			highlight_subnav("<?php echo U('Home/Account/index');?>");
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
			<span class="login">600777</span><br/>
			<span class="name">adfdfjkdsjfls</span>
		</div>
		<ul class="list-menu">
			<li onclick="logout()"><a href="javascript:void(0)"><h1 class="glyphicon glyphicon-off"></h1><span>退出系统</span></a></li>
			<li><a href=""><h1 class="glyphicon glyphicon-headphones"></h1><span>工单服务</span></a></li>
			<li><a href=""><h1 class="glyphicon glyphicon-list-alt"></h1><span>账户信息</span></a></li>
			<li><a href=""><h1 class="glyphicon glyphicon-time"></h1><span>历史交易</span></a></li>
			<li><a href=""><h1 class="glyphicon glyphicon-piggy-bank"></h1><span>持仓订单</span></a></li>
			<li><a href=""><h1 class="glyphicon glyphicon-minus"></h1><span>账户出金</span></a></li>
			<li><a href=""><h1 class="glyphicon glyphicon-plus"></h1><span>账户入金</span></a></li>
			<li><a href=""><h1 class="glyphicon glyphicon-home"></h1><span>系统主页</span> </a></li>		
		</ul>
	</div>
</div>
	<div class="mainbody">
		<div class="leftmenu">
	<ul class="menu">
		<li>
			<a class="menu-title menu-title-current">
				<span class="glyphicon glyphicon-home"></span>
				<span>账户管理</span>
			</a>	 
			<ul class="menu01">
				<li>	
					<h2 class="menu001-sub">常用</h2>
					<ul class="menu001">
						<li><a href="<?php echo U('Home/Account/index');?>"><span class="glyphicon glyphicon-home"></span>账户信息</a></li>
						<li><a href="<?php echo U('Home/Account/total');?>"><span class="glyphicon glyphicon-home"></span>账户统计</a></li>
						<li><a href="<?php echo U('Home/Account/traderList');?>"><span class="glyphicon glyphicon-home"></span>交易报表</a></li>
					</ul>
				</li>
				<li>
					<h2 class="menu001-sub">资料更改</h2>
					<ul class="menu001">
						<li><a href="<?php echo U('Home/Account/editLeverage');?>"><span class="glyphicon glyphicon-home"></span>更改杠杠</a></li>
						<li><a href="<?php echo U('Home/Account/editMobile');?>"><span class="glyphicon glyphicon-home"></span>更换手机</a></li>
						<li><a href="<?php echo U('Home/Account/editMail');?>"><span class="glyphicon glyphicon-home"></span>更换电邮</a></li>
					</ul>
				</li>
				<li>
					<h2 class="menu001-sub">安全设置</h2>
					<ul class="menu001">
						<li><a href="<?php echo U('Home/Account/editMainPass');?>"><span class="glyphicon glyphicon-home"></span>主密码</a></li>
						<li><a href="<?php echo U('Home/Account/editInvestorPass');?>"><span class="glyphicon glyphicon-home"></span>投资人密码</a></li>
					</ul>
				</li>
			</ul>
		</li>
	</ul>
	<ul class="menu">
		<li>
			<a class="menu-title">
				<span class="glyphicon glyphicon-home"></span>
				<span class="menu1-info">出入金管理</span>
			</a>	 
			<ul class="menu01" style="display:none">
				<li>	
					<h2 class="menu001-sub">入金相关</h2>
					<ul class="menu001">
						<li><a href="<?php echo U('Home/Payment/index');?>"><span class="glyphicon glyphicon-home"></span>账户入金</a></li>
						<li><a href="<?php echo U('Home/Payment/inRecords');?>"><span class="glyphicon glyphicon-home"></span>入金记录</a></li>
						<li><a href="<?php echo U('Home/Payment/inTotal');?>"><span class="glyphicon glyphicon-home"></span>入金统计</a></li>
					</ul>
				</li>
				<li>
					<h2 class="menu001-sub">出金相关</h2>
					<ul class="menu001">
						<li><a href="<?php echo U('Home/Payment/outPayment');?>"><span class="glyphicon glyphicon-home"></span>账户出金</a></li>
						<li><a href="<?php echo U('Home/Payment/outRecords');?>"><span class="glyphicon glyphicon-home"></span>出金记录</a></li>
						<li><a href="<?php echo U('Home/Payment/outTotal');?>"><span class="glyphicon glyphicon-home"></span>出金统计</a></li>
					</ul>
				</li>
			</ul>
		</li>
	</ul>
	<ul class="menu">
		<li>
			<a class="menu-title">
				<span class="glyphicon glyphicon-home"></span>
				<span class="menu1-info">交易管理</span>
			</a>	 
			<ul class="menu01" style="display:none">
				<li>
					<h2 class="menu001-sub">当前持仓</h2>	
					<ul class="menu001">
						<li><a href=""><span class="glyphicon glyphicon-home"></span>全部</a></li>
						<li><a href=""><span class="glyphicon glyphicon-home"></span>订单</a></li>
						<li><a href=""><span class="glyphicon glyphicon-home"></span>挂单</a></li>
					</ul>
				</li>
				<li>
					<h2 class="menu001-sub">历史交易</h2>
					<ul class="menu001">
						<li><a href=""><span class="glyphicon glyphicon-home"></span>订单</a></li>
						<li><a href=""><span class="glyphicon glyphicon-home"></span>出入金</a></li>
						<li><a href=""><span class="glyphicon glyphicon-home"></span>挂单</a></li>
					</ul>
				</li>
			</ul>
		</li>
	</ul>
</div>
		<div class="content-body">
			<h2 class="body-title">我的账户</h2>
			<div class="content">
				<div class="dl-in">
					<dl class="dl-horizontal">
					  <dt>帐号:</dt>
					  <dd>600777</dd>
					  <dt>杠杆:</dt>
					  <dd>1：100</dd>
					  <dt>资产:</dt>
					  <dd>余额：$8,286.44净值：$8,286.44保证金：$0.00可用保证金：$8,286.44</dd>
					  <dt>开户日期:</dt>
					  <dd>2015-10-23</dd>
					  <dt>推广链接:</dt>
					  <dd>http://manage.briskliquidity.nz/apply/real.html?agent=600777</dd>
					</dl>
					<dl class="dl-horizontal">
					  <dt>姓名:</dt>
					  <dd>asfdasdfa asdfasdf</dd>
					  <dt>同名账户:</dt>
					  <dd>1 个</dd>
					  <dt>手机:</dt>
					  <dd>2342423</dd>
					  <dt>电邮:</dt>
					  <dd>asdfasdf@qq.com</dd>
					</dl>
				</div>
				
				<div class="x-color-panel x-balance-panel">
					<label>资产</label>
					<div>
						<span>余额</span><strong field="memberBalance">$8,286.44</strong>
					</div>
					<div>
						<span>净值</span><strong field="memberEquity">$8,286.44</strong>
					</div>
					<div>
						<span>保证金</span><strong field="memberMargin">$0.00</strong>
					</div>
					<div>
						<span>可用保证金</span><strong field="memberMarginfree">$8,286.44</strong>
					</div>
				</div>
				<div style="clear: both;"></div>
				<h3 class="bankinfo-title">银行卡资料
					<button type="button" class="btn btn-warning " style="margin:auto auto 10px 85%;">
						<span class="glyphicon glyphicon-plus-sign"></span>添加
					</button>
				</h3>
				<div name="myBankList"><div class="x-grid-panel"><table name="table" class="x-grid"><thead><tr><th class="x-grid-column w24">发卡银行</th><th class="x-grid-column">银行帐号</th><th class="x-grid-column w15">户名</th><th class="x-grid-column w15 x-text-center">操作</th></tr></thead><tbody><tr class="x-data-item"><td class="x-grid-cell"><div class="relative"><label data-qtip="建设银行 CNY&lt;br&gt;广西南宁南宁凤凰岭路支行" class="bank-icon CCB">建设银行</label><div class="x-right mt5" name="bankCardButtons7269"><a data-lightbox="bankCard" href="/Public/Home/Images/bank-top.jpg" class="x-label">正</a><a data-lightbox="bankCard" href="/Public/Home/Images/bank-back.jpg" class="x-label">反</a></div></div></td><td class="x-grid-cell x-font-22">6217003370016468710</td><td class="x-grid-cell x-font-18">韦传统</td><td class="x-grid-cell x-text-center"><div class="x-button-group"><button onclick="bankCardEdit($(this),7269)" class="x-button x-button-small" type="button"><em class="x-icon i-edit"></em>更改</button><button onclick="bankCardDelete($(this),7269)" class="x-button x-button-small" type="button"><em class="x-icon i-remove"></em>删除</button></div></td></tr></tbody></table></div></div>
			</div>
			
			
		</div>		
	</div>

		
</body>
</html>