<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>office</title>
	<script type="text/javascript" src="/Public/Static/jquery-1.10.2.min.js"></script>
	<link rel="stylesheet" href="/Public/Static/bootstrapv3/css/bootstrap.min.css">
	<script type="text/javascript" src="/Public/Static/bootstrapv3/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/Public/Static/layer/layer.js"></script>
	<script type="text/javascript" src="/Public/Manage/Js/common.js"></script>
	<link rel="stylesheet" href="/Public/Manage/Css/main.css">
	<script>
		var loginUrl = "<?php echo U('Home/Public/login');?>";
		var logoutUrl = "<?php echo U('Home/Public/logout');?>";
	</script>
<link rel="stylesheet" type="text/css" href="/Public/Manage/Css/account_info.css">
	<script>
		$(function(){
			highlight_subnav("<?php echo U('Manage/Business/checkWithdrawal');?>");
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
	</ul>
</div>
		<div class="content-body">
			<h2 class="body-title">出金审核</h2>
			<div class="container">
				<div class="form-inline self-line">
					<div class="form-group">
						<ul id="ways">
							<li class="current">
								<span class='glyphicon glyphicon-credit-card'></span>
								<p class="into-way">提取额度到</p>
								<p class="online-way">现有银行卡</p>
								<i></i>
							</li>
							<li>
								<span class='glyphicon glyphicon-credit-card'></span>
								<p class="into-way">提取额度到</p>
								<p class="online-way">其他银行卡</p>
								<i></i>
							</li>
						</ul>
					</div>
				</div>
				<div>
					<div class="panl" id="panl-one">
						<div class="form-inline self-line">
						  <div class="form-group">
						    <label>收款银行卡：</label>
						    <dl id="banklists">
						    	<?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "暂时没有添加任何银行卡" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><dd cardid="<?php echo ($vo["id"]); ?>" <?php if($k == 1): ?>class="current"<?php endif; ?>>
							    		<span class="cny"><?php echo ($vo["type"]); ?></span>
							    		<span class="bank-icon <?php echo ($vo["bankicon"]); ?> curbank"></span>
							    		<span class="bankno"><?php echo ($vo["bankno"]); ?></span>
							    		<span class="name"><?php echo ($vo["name"]); ?></span>
							    		<i></i>
							    	</dd><?php endforeach; endif; else: echo "暂时没有添加任何银行卡" ;endif; ?>
						    </dl>
						  </div>
						</div>
						<div class="form-inline self-line">
						   <div class="form-group">
							    <label>出金金额：</label>&nbsp;&nbsp;&nbsp;
							    <div class="input-group">
							      <input type="text" name="chujinmoney" class="form-control" placeholder="本次出金金额">
							      <div class="input-group-addon">USD</div>
							    </div>
							</div>
						  <div class="form-group">
						   <label for="">当前账户余额 $7,031.55</label>
						  </div>
						</div>
						<div class="form-inline self-line" align="center">
							<button id="chujin" class="btn btn-success btn-lg radius">确认并提交</button>
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
											<div id="filePicker1">银行卡正面</div>
											<span url="/Public/Manage/Images/bankCardFront.png" class="suchas">示例</span>
										</div>
										
							  		</span>
							  		<span class="bankcard">
							  			<div class="card-box fan" id="fileList2">
							  				
										</div>
										<div class="card-op">
											<div id="filePicker2">银行卡反面</div>
											<span url="/Public/Manage/Images/bankCardNegative.png" class="suchas">示例</span>
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
				</div>
			</div>
		</div>		
	</div>

		
</body>
</html>