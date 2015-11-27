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
<script src="/Public/Home/Js/account_index.js"></script>
	<script>
		var getAccountInfoUrl = "<?php echo U('Home/Account/getAccountInfo');?>";
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
						<li><a href="<?php echo U('Home/Transaction/index');?>"><span class="glyphicon glyphicon-home"></span>全部</a></li>
						<li><a href="<?php echo U('Home/Transaction/order');?>"><span class="glyphicon glyphicon-home"></span>订单</a></li>
						<li><a href="<?php echo U('Home/Transaction/pending');?>"><span class="glyphicon glyphicon-home"></span>挂单</a></li>
					</ul>
				</li>
				<li>
					<h2 class="menu001-sub">历史交易</h2>
					<ul class="menu001">
						<li><a href="<?php echo U('Home/Transaction/historyOrder');?>"><span class="glyphicon glyphicon-home"></span>订单</a></li>
						<li><a href="<?php echo U('Home/Transaction/outAndInRecords');?>"><span class="glyphicon glyphicon-home"></span>出入金</a></li>
						<li><a href="<?php echo U('Home/Transaction/historyPending');?>"><span class="glyphicon glyphicon-home"></span>挂单</a></li>
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
					  <dd><?php echo session('uname');?></dd>
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
					<button type="button" class="btn btn-warning " id="addCard" style="margin:auto auto 10px 85%;">
						<span class="glyphicon glyphicon-plus-sign"></span>添加
					</button>
				</h3>
				<div name="myBankList">
					<div class="x-grid-panel">
						<?php if(count($list) > 0): ?><table name="table" class="x-grid">
								<thead>
									<tr>
										<th class="x-grid-column w24">发卡银行</th>
										<th class="x-grid-column">银行户名-帐号</th>
										<th class="x-grid-column w15 x-text-center">操作</th>
									</tr>
								</thead>
								<tbody>
									<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="x-data-item">
											<td class="x-grid-cell">
												<div class="relative">
													<label class="bank-icon <?php echo ($vo["bankicon"]); ?>"><?php echo (getBankName($vo["bankicon"])); ?></label><div class="x-right mt5"><a url="<?php echo (ltrim($vo["cardpositiveurl"],'.')); ?>" class="x-label showcard">正</a><a url="<?php echo (ltrim($vo["cardnegativeurl"],'.')); ?>" class="x-label showcard">反</a></div>
												</div>
											</td>
											<td class="x-grid-cell x-font-22"><?php echo ($vo["bankaccount"]); ?></td>
											<td class="x-grid-cell x-text-center">
												<div class="x-button-group">
													<button class="btn btn-default radius" type="button">更改</button>
													<button class="btn btn-danger radius" type="button">删除</button>
												</div>
											</td>
										</tr><?php endforeach; endif; else: echo "" ;endif; ?>
								</tbody>
							</table>
						<?php else: ?>
							<h3>您暂时还没有添加任何银行卡<h3><?php endif; ?>
					</div>
				</div>
			</div>
		</div>		
	</div>

<div class="panl" style="display:none" id="panl-two">
	<dl class="dl-horizontal">
	    <dt>币种：</dt>
	    <dd id="mm-type">
	  		<span class="money-type type-current">
	  			<span class="glyphicon glyphicon-yen icon"></span>
	  			<span class="type-icon ">CNY</span>
	  			<i></i>
	  		</span>
	  		<span class="money-type">
	  			<span class="glyphicon glyphicon-usd icon"></span>
	  			<span class="type-icon ">USD</span>
	  			<i></i>
	  		</span>
	    </dd>
	    <dt>发卡银行：</dt>
	    <dd>
	  		<div class="form-inline">
	  		  <div class="form-group">
			    <select name="" id="bank" class="form-control"></select>
			  </div>
			  <div class="form-group">
			    <input type="text" name="area" class="form-control" placeholder="区域/城市">
			  </div>
			  <div class="form-group">
			    <input type="text" name="zhibank" style="width:300px;" class="form-control" placeholder="支行名称">
			  </div>
			</div>
	    </dd>
	    <dt>账户：</dt>
	    <dd>
	  		<div class="form-inline">
			  <div class="form-group">
			    <input name="account" type="text" class="form-control" placeholder="户名">
			  </div>
			  <div class="form-group">
			    <input name="accountNo" type="text" style="width:300px;" class="form-control" placeholder="银行帐号">
			  </div>
			</div>
	    </dd>
	    <dt>上传银行卡：</dt>
	    <dd>
	    	<div id="uploader-demo">
		  		<span class="bankcard">
		  			<div class="card-box zheng" id="fileList1">

					</div>
					<div class="card-op">
						<div id="picker1"></div>
						<span url="/Public/Home/Images/bankCardFront.png" class="suchas">示例</span>
					</div>
					
		  		</span>
		  		<span class="bankcard">
		  			<div class="card-box fan" id="fileList2">
		  				
					</div>
					<div class="card-op">
						<div id="picker2"></div>
						<span url="/Public/Home/Images/bankCardNegative.png" class="suchas">示例</span>
					</div>
		  		</span>
		  	</div>
	    </dd>
	    <dt>出金金额：</dt>
	    <dd>
	    	<div class="form-inline">
			   <div class="form-group">
				    
				    <div class="input-group">
				      <input name="money" type="text" class="form-control" placeholder="出金金额">
				      <div class="input-group-addon">USD</div>
				    </div>
				</div>
			  <div class="form-group">
			   <label for="">当前账户余额 $7,031.55</label>
			  </div>
			</div>
	    </dd>
	    <dd>
	    	<a id="drawal" class="btn btn-success radius btn-lg">确认并提交</a>
	    </dd>
	</dl>
</div>		
</body>
</html>