<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>test</title>
	<link href="/Public/Static/bootstrapv3/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <script src="/Public/Static/jquery-1.10.2.min.js"></script>
    <script src="/Public/Static/bootstrapv3/js/bootstrap.min.js"></script>
    <script>
    	$(function(){
    		$('#submit').bind('click',function(){
    			
    			var params = {
    				account : $.trim($('input[name=account]').val()),
	    			password : $.trim($('input[name=password]').val()),
	    			ip : $.trim($('input[name=ip]').val()),
	    			port : $.trim($('input[name=port]').val()),
	    			cmd : $.trim($('input[name=cmd]').val())
    			}

    			$.ajax({
    				url : "<?php echo U('Home/Test/test');?>",
    				data : params,
    				dataType : 'json',
    				type : 'POST',
    				cache : false,
    				success : function(res){
    					$('#result').val(res)
    				}
    			})
    		})
    	})
    </script>
</head>
<body>

	<div class="container">
		  <div class="form-group">
		    <label>账号</label>
		    <input name="account" type="text" class="form-control" >
		  </div>
		  <div class="form-group">
		    <label>密码</label>
		    <input name="password" type="text" class="form-control" >
		  </div>
		  <div class="form-group">
		    <label>ip</label>
		    <input name="ip" type="text" class="form-control" >
		  </div>
		  <div class="form-group">
		    <label>端口</label>
		    <input name="port" type="text" class="form-control" value="443">
		  </div>
		  <div class="form-group">
		    <label>接口</label>
		    <input name="cmd" type="text" class="form-control">
		  </div>
		  <button id="submit" class="btn btn-default">Submit</button>
		  <div class="form-group">
		  	<textarea name="result" id="result" cols="30" rows="10" class="form-control"></textarea>
		  </div>
	</div>


	<p>const T_PLUGIN_MASTER = 'password';</p>
	<p>const CMD_NEW_ACCOUNT = 'A_N-MASTER=%s|IP=%s|GROUP=%s|NAME=%s|PASSWORD=%s|INVESTOR=%s|EMAIL=%s|COUNTRY=%s|STATE=%s|CITY=%s|ADDRESS=%s|COMMENT=%s|PHONE=%s|PHONE_PASSWORD=%s|STATUS=%s|ZIPCODE=%s|ID=%s|LEVERAGE=%s|AGENT=%s|SEND_REPORTS=%s|DEPOSIT=%s';</p>
	<p>const CMD_NEW_ORDER ='T_A-LOGIN=%s|VOLUME=%s|PRICE=%f|SYMBOL=%s|CMD=%u|SL=%f|TP=%f';//cmd=(OP_BUY OR OP_SELL)</p>
	<p>const CMD_NEW_BINARYORDER ='B_A-LOGIN=%s|VOLUME=%s|PRICE=%f|SYMBOL=%s|CMD=%u|CYCLE=%s|PWD=%s';//cmd=(OP_UP OR OP_DOWN) 二元开单	</p>
	<p>const CMD_CLOSE_ORDER ='T_C-ORDER=%u|VOLUME=%u|PRICE=%f';</p>
	<p>const CMD_CANCEL_PENDINGORDER ='T_CP-ORDER=%u';</p>
	<p>const CMD_ACTIVE_PENDINGORDER ='T_AP-ORDER=%u|PRICE=%f';</p>
	<p>const CMD_UPDATEORDER ='T_U-ORDER=%u|PRICE=%f|SL=%f||TP=%f';</p>
	<p>const CMD_NEW_PENDINGORDER ='T_P-LOGIN=%u|VOLUME=%u|PRICE=%f|SYMBOL=%s|EXPRIED=%s|CMD=%u|SL=%f|TP=%f';//cmd=(OP_BUY OR OP_SELL)</p>
		
	<p>const CMD_GET_HISTORYQUOTES ='G_SHQ-SYMBOL=%s|PERIOD=%u|FROM=%s|TO=%s'; //获取 symbol的历史报价</p>
	<p>const CMD_GET_SYMBOLDIGITS ='G_SD-SYMBOL=%s'; //获取symbol小数位</p>
	<p>const CMD_GET_SYMBOLSTOPLEV ='G_SSL-SYMBOL=%s'; //获取symbol.stopslevel差点</p>
	<p>const CMD_GET_ORDERLIST ='G_OL-LOGIN=%u|ISCLOSE=%u|FROM=%s|TO=%s'; //获取用户的下单列表</p>
	<p>const CMD_GET_SYMBOLS ='G_SL'; //获取系统支持的Symbols 返回列表</p>
	<p>const CMD_GET_WEBREGEDITGROUPS ='G_WG'; //获取插件支持的WebRegeditGoups 返回列表</p>
	<p>const CMD_QUERY_DEALCOMFIRMSTATE ='Q_O-ID=%s'; //查询 dealer处理状态</p>
		
		
	<p>const CMD_GET_SYMBOLINFORMATION ='G_SI-SYMBOL=%s'; //获取系统支持的Symbol信息</p>	
	<p>const CMD_GET_TRADEHISTORY =	'USERHISTORY-login=%u|password=%s|from=%s|to=%s'; //获取系统支持的Symbols 返回列表</p>		
	<p>const CMD_LOGIN ='U_L-LOGIN=%s|PWD=%s|IP=%s|VER=%s';</p>
	<p>const CMD_USERINFO ='G_UI-LOGIN=%s|PWD=%s'; //获取用户信息</p>	
	<p>const CMD_GET_QUOTES ='QUOTES-%s';	</p>
	<p>const CMD_SERVERTIME ='G_T';	//获取MT服务器时间</p>
		
	<p>const CMD_TRANSFERACCOUNT ='C_TA-SLOGIN=%u|DLOGIN=%s|SPWD=%s|VALUES=%f';	//用户转账</p>
	<p>const CMD_CHANGEPASSWORD ='C_UP-LOGIN=%u|NPWD=%s|OPWD=%s';	//用户用户修改密码</p>
		
	<p>const CMD_IPS_DISPOSE ='C_DA-LOGIN=%u|AMOUNT=%s|IPSBILLNO=%s|SIGUATURE=%s';	//IPS入金</p>
</body>
</html>