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
	<link rel="stylesheet" href="/Public/Home/Css/payment_index.css">
	<script type="text/javascript" src="/Public/Home/Js/payment_index.js"></script>
	<script>
		$(function(){
			Payment.init();
			highlight_subnav("<?php echo U('Home/Payment/index');?>");
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
			<h2 class="body-title">账户入金</h2>
			<form action="<?php echo U('Home/Payment/pay');?>" method="post">
				<div class="container">
					<div class="form-inline self-line">
						<div class="form-group">
							<ul id="ways">
								<li class="current">
									<span class='glyphicon glyphicon-credit-card'></span>
									<p class="into-way">入金方式</p>
									<p class="online-way">在线入金</p>
									<i></i>
								</li>
							</ul>
						</div>
					</div>
					<div class="form-inline self-line">
					  <div class="form-group">
					    <label>选择银行：</label>
					    <div class="banklist">
					    	<p class="bold mb5">您已选择通过 <strong id="bankTip" class="x-text-red u">中国工商银行</strong> 在线入金</p>
					    	<ul id="bankAll">
					    		<li class="active"><label name="中国工商银行" bankicon="ICBC" bankco="01100" class="bank-icon ICBC"></label>
					    			<input type="hidden" name="Bank_Code" value="01100">
					    		</li>
					    		<li><label name="中国农业银行" bankicon="ABC" bankco="01101" class="bank-icon ABC"></label>
					    		</li>
					    		<li><label name="招商银行" bankicon="CMB" bankco="01102" class="bank-icon CMB"></label>
					    		</li>
					    		<li><label name="兴业银行" bankicon="CIB" bankco="01103" class="bank-icon CIB"></label></li>
					    		<li><label name="中信银行" bankicon="CITIC" bankco="01104" class="bank-icon CITIC"></label>
					    		</li>
					    		<li><label name="建设银行" bankicon="CCB" bankco="01106" class="bank-icon CCB"></label></li>
					    		<li><label name="中国银行" bankicon="BOC" bankco="01107" class="bank-icon BOC"></label></li>
					    		<li><label name="交通银行" bankicon="COMM" bankco="01108" class="bank-icon COMM"></label></li>
					    		<li><label name="上海浦东发展银行" bankicon="SPDB" bankco="01109" class="bank-icon SPDB"></label></li>
					    		<li><label name="民生银行" bankicon="CMBC" bankco="01110" class="bank-icon CMBC"></label></li>
					    		<li><label name="华夏银行" bankicon="HXBANK" bankco="01111" class="bank-icon HXBANK"></label></li>
					    		<li><label name="光大银行" bankicon="CEB" bankco="01112" class="bank-icon CEB"></label></li>
					    		<li><label name="北京银行" bankicon="BJBANK" bankco="01113" class="bank-icon BJBANK"></label></li>
					    		<li><label name="广东发展银行" bankicon="GDB" bankco="01114" class="bank-icon GDB"></label></li>
					    		<li><label name="中国邮政储蓄" bankicon="PSBC" bankco="01119" class="bank-icon PSBC"></label></li>
					    		<li><label name="平安银行" bankicon="SPABANK" bankco="01121" class="bank-icon SPABANK"></label></li>
					    	</ul>
					    </div>
					  </div>
					</div>
					<div class="form-inline self-line">
					   <div class="form-group">
						    <label>入金金额：</label>
						    <div class="input-group">
						      <input type="text" name="Amount" class="form-control" placeholder="入金金额">
						      <div class="input-group-addon">USD</div>
						    </div>
						</div>
					  <div class="form-group">
					   <label for="">当前账户余额 $7,031.55</label>
					  </div>
					</div>
					<div class="form-inline self-line" align="center">
						<button id="submit" class="btn btn-success btn-lg radius">进入银行入金页面</button>
					</div>
				</div>
			</form>
		</div>		
	</div>

		
</body>
</html>