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
<script src="/Public/Static/layer/laydate/laydate.js"></script>
<script src="/Public/Home/Js/trade_index.js"></script>
	<script>
		var historyOrderInfoUrl = "<?php echo U('Home/Transaction/historyOrderInfo');?>"
		$(function(){
			highlight_subnav("<?php echo U('Home/Transaction/historyOrder');?>");
			Trade.historyOrderInfo();
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
			<h2 class="body-title">历史交易</h2>
			<div class="content">
				<div class="content-in">
					<div class="x-search-panel">
						<form onsubmit="return false;" method="post" name="search" class="x-form">
							<fieldset>
								<input type="hidden" value="histTrades" name="cmd">
								<input type="hidden" value="order" name="menu">
								<div class="column">
									<dl><dt>产品：</dt><dd><input type="text" placeholder="" class="w30" value="" name="product" vtype=""></dd></dl>
								</div>
								<div class="column">
									<dl><dt>盈亏范围：</dt><dd><input type="text" placeholder="大于等于" class="w30" value="" name="startNumber" vtype="number"><span class="space">-</span><input type="text" placeholder="小余等于" class="w30" value="" name="endNumber" vtype="number"></dd></dl>
								</div>
								<div class="column">
									<dl><dt>开仓日期：</dt><dd><input type="text" placeholder="从" class="w30 hasDatepicker" value="" name="openStartDate" vtype="date" id="openStartDate"><span class="space">-</span><input type="text" placeholder="到" class="w30 hasDatepicker" value="" name="openEndDate" vtype="date" id="openEndDate"></dd></dl>
								</div>
								<div class="column">
									<dl><dt>平仓日期：</dt><dd><input type="text" placeholder="从" class="w30 hasDatepicker" value="" name="closeStartDate" vtype="date" id="closeStartDate"><span class="space">-</span><input type="text" placeholder="到" class="w30 hasDatepicker" value="" name="closeEndDate" vtype="date" id="closeEndDate"></dd></dl>
								</div>
								<div class="column">
									<div class="x-submit-panel"><button class="btn btn-success" type="submit">搜 索</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div style="background: #ccc;height: 0.5px;"></div>
					<table class="table table-bordered table-hover">
					  <thead>
					  	<tr class="info">
					  		<th>订单</th>
					  		<th>交易类型</th>
					  		<th class="x-text-right">成交量</th>
					  		<th>开仓</th>
					  		<th>平仓</th>
					  		<th class="x-text-right">止损/止盈</th>
					  		<th class="x-text-right">盈亏</th>					
					  	</tr>
					  </thead>
					  <tbody id="orderlist">
					  </tbody>
					  <tbody id="totalCount">
					  </tbody>
					</table>
				</div><!--content-in-->
			</div><!--content-->	
		</div>		
	</div>
	<script type="text/javascript">
	// layerdata
        laydate.skin('molv');

         //日期范围限制
        var openStartDate = {
            elem: '#openStartDate',
            format: 'YYYY/MM/DD hh:mm:ss',
            //min: laydate.now(),
            max: '2099-06-16 23:59:59', //最大日期
            istime: true,
            istoday: false,
            choose: function (datas) {
            }
        };
        var openEndDate = {
            elem: '#openEndDate',
            format: 'YYYY/MM/DD hh:mm:ss',
            //min: laydate.now(),
            max: '2099-06-16 23:59:59',
            istime: true,
            istoday: false,
            choose: function (datas) {
            }
        };
        var closeStartDate = {
	        elem: '#closeStartDate',
	        format: 'YYYY/MM/DD hh:mm:ss',
	        //min: laydate.now(),
	        max: '2099-06-16 23:59:59',
	        istime: true,
	        istoday: false,
	        choose: function (datas) {
	        }
	    };
	    var closeEndDate = {
	        elem: '#closeEndDate',
	        format: 'YYYY/MM/DD hh:mm:ss',
	       //min: laydate.now(),
	        max: '2099-06-16 23:59:59',
	        istime: true,
	        istoday: false,
	        choose: function (datas) {
	        }
	    };
        laydate(openStartDate);
        laydate(openEndDate);	
        laydate(closeStartDate);	
        laydate(closeEndDate);	
	</script>		
</body>
</html>