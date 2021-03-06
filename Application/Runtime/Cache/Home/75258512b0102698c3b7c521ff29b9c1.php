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
<link rel="stylesheet" type="text/css" href="/Public/Home/Css/common.css">
<!--引入webuploader-->
<link rel="stylesheet" type="text/css" href="/Public/Static/webuploader/webuploader.css">
<script type="text/javascript" src="/Public/Static/webuploader/webuploader.js"></script>

<script src="/Public/Home/Js/addBankCard.js"></script>
<script src="/Public/Home/Js/account_index.js"></script>
	<script>
		var getAccountInfoUrl = "<?php echo U('Home/Account/getAccountInfo');?>";
		var uploadCardUrl = "<?php echo U('Home/Payment/uploadCard');?>";
		var saveCardUrl = "<?php echo U('Home/Account/saveCard');?>";
		var accountIndexUrl = "<?php echo U('Home/Account/index');?>";
		var getCardList = "<?php echo U('Home/Account/ajaxForPage');?>";
		var delCardUrl = "<?php echo U('Home/Account/delCard');?>";
		$(function(){
			highlight_subnav("<?php echo U('Home/Account/index');?>");
			Account.init();
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
			<h2 class="body-title">我的账户</h2>
			<div class="content">
				<div class="dl-in">
					<table class="table table-striped table-condensed ">
					   <tbody>
					      <tr>
					         <td class="x-text-right info" style="height: 35px;line-height: 35px;">帐号:</td>
					         <td style="color: #3aae01;font-size: 20px;height: 35px;line-height: 35px;"><?php echo session('uname');?></td>
					      </tr>
					      <tr>
					         <td class="x-text-right info" style="height: 35px;line-height: 35px;">杠杆:</td>
					         <td id="leverage" style="color: #ff5d5b;font-size: 20px;height: 35px;line-height: 35px;">1:100</td>
					      </tr>
					      <tr>
					         <td class="x-text-right info">资产:</td>
					         <td>
					         余额：<span style="color: #3aae01" id="balance">$8,286.44</span><span class="y"></span> 净值：<span style="color: #ff5d5b" id="equity">$8,286.44</span><span class="y"></span>保证金：<span id="margin">$0.00</span><span class="y"></span>可用保证金：<span style="color: #007aff!important" id="margin_free">$8,286.44</span>
					         </td>
					      </tr>
					      <tr>
					         <td class="x-text-right info">开户日期:</td>
					         <td id="regdate">2015-10-23</td>
					      </tr>
					      <!-- <tr>
					         <td class="x-text-right info">推广链接:</td>
					         <td>http://manage.briskliquidity.nz/apply/real.html?agent=600777</td>
					      </tr> -->
					   </tbody>
					</table>
					<table class="table table-striped table-condensed ">
					   <tbody>
					      <tr>
					         <td class="x-text-right info">姓名:</td>
					         <td>sfdasdfa asdfasdf</td>
					      </tr>
					      <tr>
					         <td class="x-text-right info">同名账户:</td>
					         <td>1 个</td>
					      </tr>
					      <tr>
					         <td class="x-text-right info">手机:</td>
					         <td id="phone">2342423</td>
					      </tr>
					      <tr>
					         <td class="x-text-right info">电邮:</td>
					         <td id="email">sdfasdf@qq.com</td>
					      </tr>
					   </tbody>
					</table>

					<!-- <dl class="dl-horizontal">
					  <dt>帐号:</dt>
					  <dd><?php echo session('uname1：100');?></dd>
					  <dt>杠杆:</dt>
					  <dd id="ganggan">1：100</dd>
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
					</dl> -->
				</div>
				
				<div class="x-color-panel x-balance-panel">
					<label class="text1">资</label><label class="text2">产</label>
					<div>
						<span>余额</span><strong id="memberBalance"></strong>
					</div>
					<div>
						<span>净值</span><strong id="memberEquity"></strong>
					</div>
					<div>
						<span>保证金</span><strong id="memberMargin"></strong>
					</div>
					<div>
						<span>可用保证金</span><strong id="memberMarginfree"></strong>
					</div>
				</div>
				<div style="clear: both;"></div>
				<h3 class="bankinfo-title">银行卡资料
					<button type="button" class="btn btn-warning " id="addCard" style="margin:auto auto 10px 85%;">
						<span class="glyphicon glyphicon-plus-sign"></span>添加
					</button>
				</h3>
				<div name="myBankList">
					<div class="x-grid-panel">
						<table name="table" class="x-grid">
							<thead>
								<tr>
									<th class="x-grid-column w24">发卡银行</th>
									<th class="x-grid-column">银行户名-帐号</th>
									<th class="x-grid-column w15 x-text-center">操作</th>
								</tr>
							</thead>
							<tbody id="card-list">
								
							</tbody>
						</table>
					</div>
					<nav id="pagehtml"></nav>
				</div>
			</div>
		</div>		
	</div>

</body>
</html>