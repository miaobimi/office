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
	<script> 
		$(function(){
			highlight_subnav("<?php echo U('Manage/Business/checkWithdrawal');?>");
			$('.bankicon span').bind('click',function(){
				var url = $(this).attr('url');
				layer.open({
				    type: 1,
				    title : false,
				    skin: 'layui-layer-demo', //样式类名
				    closeBtn: 0, //不显示关闭按钮
				    shift: 1,
				    area: ['505px', '320px'],
				    shadeClose: true, //开启遮罩关闭
				    content: '<img src="'+url+'">'
				});
			});
			$('.backCheck').bind('click',function(){
				var $self = $(this).parent();
				var cid = $self.attr('cid');
				layer.prompt({title: '审核不过原因', formType: 2}, function(text){
					ajaxReturn("<?php echo U('Manage/Business/recordReason');?>",
						{reason:text,id:cid},function(){
						layer.msg('提交中...');
					},function(res){
						layer.closeAll();
						if(res.status){
							$self.prev().empty().append('<span style="padding:5px 10px" class="label label-danger">'+text+'</span>');
							$self.prev().prev().empty().append(res.info);
						}else{
							layer.alert(res.info)
						}
					})
			        
			    });
			})
		})

		function payEvent(id,bankCode,money){
	        form = $("<form></form>")
	        form.attr('action',"<?php echo U('Manage/Business/pay');?>")
	        form.attr('method','post')
	        input1 = $("<input type='hidden' name='Bank_Code' value='"+bankCode+"'/>")
	        input2 = $("<input type='hidden' name='Amount' value='"+money+"' />")
	        input3 = $("<input type='hidden' name='id' value='"+id+"' />")
	        form.append(input1)
	        form.append(input2)
	        form.append(input3)
	        form.appendTo("body")
	        form.css('display','none')
	        form.submit()

			// var $form = $('<form action="<?php echo U('Manage/Business/pay');?>" method="post"></form>');
			// $form.append('<input name="bankCode" value="'+bankCode+'" type="hidden">');
			// $form.append('<input name="Amount" value="'+money+'" type="hidden">');
			// $form.appendTo($(document));
			// $('form').submit();
		}
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
			<h2 class="body-title">出金审核</h2>
			<div class="col-lg-12">
				<table class="table table-hover">
				  <thead>
				  	<tr>
				  		<th>申请人</th>
				  		<th>出金银行</th>
				  		<th>币种</th>
				  		<th>出金银行:账户-账号</th>
				  		<th>出金银行卡</th>
				  		<th>申请时间</th>
				  		<th>出金金额</th>
				  		<th>实付金额</th>
				  		<th>审核时间</th>
				  		<th>审核不过原因</th>
				  		<th>操作</th>
				  	</tr>
				  </thead>
				  <tbody>
				  	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					  		<td><?php echo ($vo["account"]); ?></td>
					  		<td><?php echo ($vo["bankname"]); ?></td>
					  		<td><?php echo ($vo["type"]); ?></td>
					  		<td><?php echo ($vo["bankaccount"]); ?></td>
					  		<td class="bankicon"><span url="<?php echo (ltrim($vo["cardpositiveurl"],".")); ?>" style="cursor:pointer;" class="label label-default">正面</span>&nbsp;&nbsp;<span url="<?php echo (ltrim($vo["cardnegativeurl"],".")); ?>" style="cursor:pointer;" class="label label-default">反面</span></td>
					  		<td><?php echo ($vo["applytime"]); ?></td>
					  		<td>$<?php echo ($vo["money"]); ?></td>
					  		<td>￥<?php echo ($vo["reminbi"]); ?></td>
					  		<td>
					  			<?php if($vo['checktime'] != ''): echo ($vo["checktime"]); ?>
					  			<?php else: ?>
								<span style="padding:5px 10px" class="label label-danger">未审核</span><?php endif; ?>
					  			
					  		</td>
					  		<td>
					  			<?php if($vo['status'] == 0): ?><span style="padding:5px 10px" class="label label-danger"><?php echo ($vo["reason"]); ?></span><?php endif; ?>
					  		</td>
					  		<td cid="<?php echo ($vo["id"]); ?>">
					  			<?php if($vo['status'] == 1): ?><span style="padding:5px 10px" class="label label-success">已完成</span>
					  			<?php else: ?>
								<button class="btn btn-info btn-sm radius backCheck">批回</button>
								<button onclick="payEvent('<?php echo ($vo["id"]); ?>','<?php echo ($vo["bankCode"]); ?>','<?php echo ($vo["money"]); ?>')" class="btn btn-success btn-sm radius">审核并打款</button><?php endif; ?>
					  		</td>
					  	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				  </tbody>
				</table>
				<?php echo ($page); ?>
			</div>
		</div>		
	</div>

		
</body>
</html>