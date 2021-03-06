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
	<link rel="stylesheet" href="/Public/Home/Css/main.css">
	<link rel="stylesheet" type="text/css" href="/Public/Home/Css/account_info.css">
	<script type="text/javascript" src="/Public/Static/echarts/build/dist/echarts.js"></script>
	<script src="/Public/Home/Js/index_index.js"></script>
	<script>
		var getAccountInfoUrl = "<?php echo U('Home/Account/getAccountInfo');?>";
		var getTradeInfoUrl = "<?php echo U('Home/Transaction/getTradeInfo');?>";
		var echartUrl = "/Public/Static/echarts/build/dist"
		$(function(){
			Index.init();
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
	
		<div class="content-body" style="height:980px;">
			<h2 class="body-title">首页</h2>
			<div class="content">
				<div class="counter-side">
					<div class="counter-side-header">
						<div class="counter-side-header-h2">账户信息</div>
						<div class="counter-side-header-h3">Account Information</div>		
					</div>
					<div class="counter-side-text">
						<p>
							<strong>ID:<?php echo session('uid');?></strong><br>
							<span style="color: #3aae01 !important;"><?php echo session('uname');?></span>
						</p>
					</div>
					<div class="counter-side-list">
						<p><span>余额</span><strong class="text-success" id="balance"></strong></p>
						<p><span>净值</span><strong class="text-danger" id="equity"></strong></p>
						<p><span>保证金</span><strong id="margin"></strong></p>
						<p><span>可用保证金</span><strong class="text-primary" id="margin_free"></strong></p>
					</div>
				</div>
				<div class="counter-side">
					<div class="counter-side-header">
						<div class="counter-side-header-h2">历史交易</div>
						<div class="counter-side-header-h3">Historical Trading</div>		
					</div>
					<div class="counter-side-text">
						<p data-qtip="">
							交易 <strong><?php echo ($arr['orderCount']); ?></strong> 笔　<strong><?php echo ($arr['hand']); ?></strong> 手　挂单 <strong>0</strong> 笔<br>
							交易盈亏 <strong style="color: #ff5d5b !important;">$<?php echo ($arr['profit']); ?></strong>
						</p>
					</div>
					<div class="counter-side-list">
						<p><span>入金</span><strong>$7,709.82</strong><em>2 笔</em></p>
						<p><span>出金</span><strong>$2,326.76</strong><em>0 笔</em></p>
						<p><span>信用</span><strong>$2,161.67</strong><em>0 笔</em></p>
						<p><span>交易</span><strong>$165.09</strong><em>27 笔</em></p>
					</div>
					<div class="counter-side-text">
						<p data-qtip="">
							Last Update<br>
							<?php echo (date('Y-m-d g:i a',time())); ?>
						</p>
					</div>
				</div>
				<div class="counter-side">
					<div class="counter-side-header">
						<div class="counter-side-header-h2">当前持仓</div>
						<div class="counter-side-header-h3">Orders Positions</div>
					</div>
					<div class="counter-side-text">
						<p data-qtip="交易：$0.00<br>佣金：$0.00<br/>税金：$0.00<br/>利息：$0.00">
							交易中 <strong class="nowCount"></strong> 笔　<strong class="nowHand"></strong> 手　盈亏 <strong class="nowProfit" style="color:#ff5d5b !important;"></strong><br>
							全部持仓订单请点击按钮后查看
						</p>
					</div>
					<div class="counter-side-list" id="nowOrder"></div>
				</div><!--counter-side-->
				<div class="counter-bottom">
					<div class="counter-bottom-left">
						<h2>TC 技术分析</h2>
						<ul id="tcHomeList"></ul>
					</div>
					<div class="counter-bottom-right">
						<h2>盈亏监控</h2>
						<div class="counter-money">
							<span>
								<strong>持仓订单</strong><br>
								交易笔数：<span class="nowCount"></span> 笔　<span class="nowHand"></span>手<br>
								更新时间：<span id="updateTime"></span>
							</span>
							<label>
								盈亏：<span class="nowProfit"></span>
							</label>
						</div>
						<div id="main" style="height:300px;"></div>
					</div>
				</div>
			</div><!--content-->
		</div>		
	</div>

		
</body>
</html>