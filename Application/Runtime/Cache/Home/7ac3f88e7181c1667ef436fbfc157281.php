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
	<script type="text/javascript" src="http://cdn.hcharts.cn/highcharts/highcharts.js"></script>
	<script type="text/javascript" src="http://cdn.hcharts.cn/highcharts/exporting.js"></script>
	<script>
		$(function(){
			highlight_subnav("<?php echo U('Home/Account/total');?>");//导航高亮
			$('#container').highcharts({ //图标
			        chart: {
			            type: 'line'
			        },
			        title: {
			            text: '余额走势'
			        },
			        subtitle: {
			            text: 'The Last Month Balance Changes'
			        },
			        xAxis: {
			            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
			        },
			        yAxis: {
			            title: {
			                text: '余额 (k)'
			            }
			        },
			        tooltip: {
			            enabled: true,
			            formatter: function() {
			                return '<b>'+ this.series.name +'</b><br/>'+this.x +': '+ this.y +'°C';
			            }
			        },
			        plotOptions: {
			            line: {
			                dataLabels: {
			                    enabled: true
			                },
			                enableMouseTracking: true
			            }
			        },
			        series: [{
			            name: 'Tokyo',
			            data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
			        }]
			});
		});
		
    
				
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
			<h2 class="body-title">账户统计</h2>
			<div class="content">
				<div class="dl-in">
					<table class="table table-striped table-condensed ">
					   <tbody>
					      <tr>
					         <td class="x-text-right info">入金:</td>
					         <td>$10,010.00<span class="x-text-ccc" style="float:right">2 笔</span></td>
					      </tr>
					      <tr>
					         <td class="x-text-right info">信用:</td>
					         <td>$0.00<span class="x-text-ccc" style="float:right">0 笔</span></td>
					      </tr>
					      <tr>
					         <td class="x-text-right info">出金:</td>
					         <td>
								$0.00<span class="x-text-ccc" style="float:right">0 笔</span>
					         </td>
					      </tr>
					      <tr>
					         <td class="x-text-right info"></td>
					         <td class="x-text-bold">$10,010.00</td>
					      </tr>
					   </tbody>
					</table>
					<table class="table table-striped table-condensed ">
					   <tbody>
					      <tr>
					         <td class="x-text-right info">交易:</td>
					         <td>$-2,830.492<span class="x-text-ccc" style="float:right">5 笔 | 24.10 手</span></td>
					      </tr>
					      <tr>
					         <td class="x-text-right info">佣金:</td>
					         <td>$-53.00</td>
					      </tr>
					      <tr>
					         <td class="x-text-right info">税金:</td>
					         <td>$0.00</td>
					      </tr>
					      <tr>
					         <td class="x-text-right info">利息:</td>
					         <td>$-94.96</td>
					      </tr>
					      <tr>
					         <td class="x-text-right info"></td>
					         <td class="x-text-bold">$-2,978.45</td>
					      </tr>
					   </tbody>
					</table>
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
				<div id="container" style="min-width:700px;height:400px"></div>
			</div>
			
			
		</div>		
	</div>

		
</body>
</html>