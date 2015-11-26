<?php 

	Class Mt{
		// const OP_BUY = 0;
		// const OP_SELL = 1;
		const T_PLUGIN_MASTER = 'password';
		const CMD_NEW_ACCOUNT = 'A_N-MASTER=%s|IP=%s|GROUP=%s|NAME=%s|PASSWORD=%s|INVESTOR=%s|EMAIL=%s|COUNTRY=%s|STATE=%s|CITY=%s|ADDRESS=%s|COMMENT=%s|PHONE=%s|PHONE_PASSWORD=%s|STATUS=%s|ZIPCODE=%s|ID=%s|LEVERAGE=%s|AGENT=%s|SEND_REPORTS=%s|DEPOSIT=%s';
		const CMD_NEW_ORDER ='T_A-LOGIN=%s|VOLUME=%s|PRICE=%f|SYMBOL=%s|CMD=%u|SL=%f|TP=%f';//cmd=(OP_BUY OR OP_SELL)
		const CMD_NEW_BINARYORDER ='B_A-LOGIN=%s|VOLUME=%s|PRICE=%f|SYMBOL=%s|CMD=%u|CYCLE=%s|PWD=%s';//cmd=(OP_UP OR OP_DOWN) 二元开单	
		const CMD_CLOSE_ORDER ='T_C-ORDER=%u|VOLUME=%u|PRICE=%f';
		const CMD_CANCEL_PENDINGORDER ='T_CP-ORDER=%u';
		const CMD_ACTIVE_PENDINGORDER ='T_AP-ORDER=%u|PRICE=%f';
		const CMD_UPDATEORDER ='T_U-ORDER=%u|PRICE=%f|SL=%f||TP=%f';
		const CMD_NEW_PENDINGORDER ='T_P-LOGIN=%u|VOLUME=%u|PRICE=%f|SYMBOL=%s|EXPRIED=%s|CMD=%u|SL=%f|TP=%f';//cmd=(OP_BUY OR OP_SELL)
		
		const CMD_GET_HISTORYQUOTES ='G_SHQ-SYMBOL=%s|PERIOD=%u|FROM=%s|TO=%s'; //获取 symbol的历史报价
		const CMD_GET_SYMBOLDIGITS ='G_SD-SYMBOL=%s'; //获取symbol小数位
		const CMD_GET_SYMBOLSTOPLEV ='G_SSL-SYMBOL=%s'; //获取symbol.stopslevel差点
		const CMD_GET_ORDERLIST ='G_OL-LOGIN=%u|ISCLOSE=%u|FROM=%s|TO=%s'; //获取用户的下单列表
		const CMD_GET_SYMBOLS ='G_SL'; //获取系统支持的Symbols 返回列表
		const CMD_GET_WEBREGEDITGROUPS ='G_WG'; //获取插件支持的WebRegeditGoups 返回列表
		const CMD_QUERY_DEALCOMFIRMSTATE ='Q_O-ID=%s'; //查询 dealer处理状态
		
		
		const CMD_GET_SYMBOLINFORMATION ='G_SI-SYMBOL=%s'; //获取系统支持的Symbol信息	
		const CMD_GET_TRADEHISTORY =	'USERHISTORY-login=%u|password=%s|from=%s|to=%s'; //获取系统支持的Symbols 返回列表		
		const CMD_LOGIN ='U_L-LOGIN=%s|PWD=%s|IP=%s|VER=%s';
		const CMD_USERINFO ='G_UI-LOGIN=%s|PWD=%s'; //获取用户信息	
		const CMD_GET_QUOTES ='QUOTES-%s';	
		const CMD_SERVERTIME ='G_T';	//获取MT服务器时间
		
		const CMD_TRANSFERACCOUNT ='C_TA-SLOGIN=%u|DLOGIN=%s|SPWD=%s|VALUES=%f';	//用户转账
		const CMD_CHANGEPASSWORD ='C_UP-LOGIN=%u|NPWD=%s|OPWD=%s';	//用户用户修改密码
		
		const CMD_IPS_DISPOSE ='C_DA-LOGIN=%u|AMOUNT=%s|IPSBILLNO=%s|SIGUATURE=%s';	//IPS入金
		
		private $ip;
		private $port;
		private $T_CACHEDIR;
		private $T_CACHETIME;
		private $T_TIMEOUT; //打开一个网络连接 的超时时间

		public function __construct($ip,$port){
			$this->T_CACHEDIR = './cache/';
			$this->T_CACHETIME = 5;
			$this->T_TIMEOUT = 5; 
			$this->ip = $ip;
			$this->port = $port;
		}

		Public function testCmd($account,$password,$ip,$port,$cmd){

			$query= sprintf($cmd);
			// $query= sprintf($cmd,$account,$password);

			$ptr=fsockopen($ip,$port,$errno,$errstr,5); 
			p($ptr);die;
		    $ret = '';
		    if($ptr){
	         	if(fputs($ptr,"W$query\r\nQUIT\r\n")!=FALSE)
	             	while(!feof($ptr)){
	                	$line=fgets($ptr,128);
           				$ret .= $line;
	             	} 

	        	fclose($ptr);

	        	// return $ret;
	        	return DecryptData($ret);
		    }else{
		    	 echo "$errstr ($errno)<br />\n";
		    }
		}


		Public function getUserInfo($account,$password){
			$cmd= sprintf(self::CMD_USERINFO,$account,$password);
			$res = $this->MQ_QueryEx($cmd);
			$tmparr=explode("\r\n",$res);p($tmparr);die;
			if ($tmparr[0]=='ERROR'){
				return array('status'=>0,'info'=>$tmparr[1]);
			}else{
				return array('status'=>1,'info'=>$tmparr[1]);
			}
		}

		/**
		 * 获取mt4服务器时间
		 * @return [type] [description]
		 */
		Public function getServerTime(){
			$cmd= sprintf(self::CMD_SERVERTIME);
			$res = $this->MQ_QueryEx($cmd);
			$tmparr=explode("\r\n",$res);
			if ($tmparr[0]=='ERROR'){
				return array('status'=>0,'info'=>$tmparr[1]);
			}else{
				return array('status'=>1,'info'=>$tmparr[1]);
			}
		}

		/**
		 * 创建新账户
		 * @return [type] [description]
		 */
		Public function createAccount($params){
			$cmd= sprintf(self::CMD_NEW_ACCOUNT,self::T_PLUGIN_MASTER,
				$_SERVER['REMOTE_ADDR'],$params['group'],
				$params['name'],$params['password'],
				$params['inverstor'],$params['email'],
				$params['country'],$params['state'],$params['city'],
				$params['address'],$params['comment'],
				$params['phone'],$params['phonepassword'],
				$params['status'],$params['zipcode'],$params['id'],
				$params['leverage'],$params['agent'],
				$params['sendreport'],$params['deposit']);
			
			$res = $this->MQ_QueryEx($cmd);
			$tmparr=explode("\r\n",$res);
			if ($tmparr[0]=='ERROR'){
				return array('status'=>0,'info'=>$tmparr[1]);
			}else{
				return array('status'=>1,'info'=>$tmparr[1]);
			}
		}

		/**
		 * 修改密码
		 * @param  [type] $account [description]
		 * @param  [type] $npwd    [description]
		 * @param  [type] $opwd    [description]
		 * @return [type]          [description]
		 */
		Public function modifyPass($account,$npwd,$opwd){
			$cmd= sprintf(self::CMD_CHANGEPASSWORD,$account,$npwd,md5($opwd));
			$res = $this->MQ_QueryEx($cmd);
			$tmparr=explode("\r\n",$res);
			if ($tmparr[0]=='ERROR'){
				return array('status'=>0,'info'=>$tmparr[1]);
			}else{
				return array('status'=>1);
			}
		}


		/**
		 * 转账
		 * @param  [type] $account     [转账方账号]
		 * @param  [type] $dlogin      [收取方账号]
		 * @param  [type] $transferpwd [转账方密码]
		 * @param  [type] $value       [金额]
		 * @return [type]              [description]
		 */
		Public function transfer($account,$dlogin,$transferpwd,$values){
			$cmd= sprintf(self::CMD_TRANSFERACCOUNT,$account,$dlogin,md5($transferpwd),$values);
			$res = $this->MQ_QueryEx($cmd);
			$tmparr=explode("\r\n",$res);
			if ($tmparr[0]=='ERROR'){
				return array('status'=>0,'info'=>$tmparr[1]);
			}else{
				return array('status'=>1);
			}
		}

		/**
		 * 获取历史记录
		 * @param  [type] $days     [天数]
		 * @param  [type] $account  [账号]
		 * @param  [type] $password [非加密密码]
		 * @return [type]           [description]
		 */
		Public function tradehistory($days,$account,$password){
			if (isset($days)){
				$res = $this->MQ_QueryEx(self::CMD_SERVERTIME);
				$tmpre=explode("\r\n",$res);
				if ($tmpre[0]=='OK'){
					$to=intval($tmpre[1],10); 
				}else{
					$to=time();
				}				
				$from=DateAdd('d',-$days,$to);
			}
			
			$cmd=sprintf(self::CMD_GET_TRADEHISTORY,$account,$password,$from,$to);

			$res = $this->MQ_QueryEx($cmd,false);

			$info=explode("\r\n",$res);
			$size=sizeof($info);
			$beginIndex = 3;
			$rows=array();

			$cnt=0;
			for($i=$beginIndex;$i<$size;$i++){
			  if ($info[$i]==='0') break;
		      $row = explode("\t",$info[$i]);
		      if(strpos($row[2],'balance')!==false){

		           $resarr['data']['rows'][$cnt]['profitType']=$row[12]>0?'profit_up':'profit_down';          
		           $resarr['data']['rows'][$cnt]['order']=$row[0];
		           $resarr['data']['rows'][$cnt]['start_time']=$row[1];
		           $resarr['data']['rows'][$cnt]['type']=$row[2];
		           $resarr['data']['rows'][$cnt]['lots']=preg_replace("#[^0-9]#", '',$row[13]);
		           $resarr['data']['rows'][$cnt]['profit']=$row[12];
		        }else{
		        	$resarr['data']['rows'][$cnt]['profitType']=strpos($row[2],'buy')===false?'sell':'buy';
		          	$resarr['data']['rows'][$cnt]['order']=$row[0];
		          	$resarr['data']['rows'][$cnt]['start_time']=$row[1];
		          	$resarr['data']['rows'][$cnt]['type']=$row[2];
		          	$resarr['data']['rows'][$cnt]['lots']=$row[3];
		          	$resarr['data']['rows'][$cnt]['symbol']=strtolower($row[4]);
		          	$resarr['data']['rows'][$cnt]['start_price']=$row[5];
		          	$resarr['data']['rows'][$cnt]['sl']=$row[6];
		          	$resarr['data']['rows'][$cnt]['tp']=$row[7];
		          	$resarr['data']['rows'][$cnt]['stop_time']=$row[8];
		          	$resarr['data']['rows'][$cnt]['stop_price']=$row[9];
		          	$resarr['data']['rows'][$cnt]['swap']=$row[11];
		          	$resarr['data']['rows'][$cnt]['profit']=$row[12];
		          	$resarr['data']['rows'][$cnt]['comment']=strpos($row[2],'limit')!==false?$row[13]:null;
		        }
		      ++$cnt;
			}
			
			$profit_loss=getParam($info[$i+6]);
			$deposit    =getParam($info[$i+1]);
			$resarr['data']['foottotal']=array(
					'profit/loss'=>$profit_loss,
					'credit'     =>getParam($info[$i+3]),
					'deposit'    =>$deposit,
					'withdrawal' =>getParam($info[$i+2]),
					'profit'     =>$deposit+$profit_loss,
			);
			$resarr['data']['total']=$cnt;
			return $resarr;
		}

		//开二元新单
		Public function newbinaryorder($volume,$price,$symbol,$cycle,$cmd,$account,$password_md5){
			$cmd= sprintf(self::CMD_NEW_BINARYORDER,$account,$volume*100,$price,$symbol,$cmd,$cycle,$password_md5);
			$res = $this->MQ_QueryEx($cmd);
			
			$tmparr=explode("\r\n",$res);
			if ($tmparr[0]=='ERROR'){
				return array('status'=>0,'info'=>$tmparr[1]);
			}
			return array('status'=>1);
		}

		/**
		 * 登录
		 * @param [type] $login    [description]
		 * @param [type] $password [description]
		 * @param [type] $server   [description]
		 */
		Public function MQ_Login($login,$password,$server){
		    $login = substr($login,0,14);
		    $password = substr($password,0,16);
		
		    $cmd=sprintf(self::CMD_LOGIN,$login,md5($password),$_SERVER['REMOTE_ADDR'],'MT4 Web Trader');
		    $res = $this->MQ_QueryEx($cmd);
		    if($res=='!!!CAN\'T CONNECT!!!' || strlen($res)==0){
		        return array('status'=>0,'info'=>'Timeout');
		    }

		    if(strpos($res,'ERROR')!==false){  
		     	$res=explode("\r\n",$res);
				$res=$res[1];
		     	return array('status'=>0,'info'=>$res);
		    }
		      
		    $login_format='ilogin/a16group/a16password/a128name/a16ip/ienable/ienable_change_password/ienable_read_only/iflags/ileverage/iagent_account/dbalance/dcredit/dprevbalance/igroup1/itimezone';
		    $uifo = unpack($login_format, $res);

		    $stime = $this->MQ_QueryEx(self::CMD_SERVERTIME);
		    $tmpre=explode("\r\n",$stime);
		    if ($tmpre[0]=='OK')
		     	$servertime=intval($tmpre[1],10);
		    else
		     	return array('status'=>0);
		     //$_SESSION['servertimediff']=$servertime-time(); //求出mt服务器与web服务器的时间差
		     //$_SESSION['timezone']=floor(($servertime-time())/3600); //求出mt服务器与web服务器时区
		  
		  
		    if(!$uifo){      
		        $info = strpos($res,'Invalid')!==false ? 'Invalid' : 'Disabled';
		        return array('status'=>0,'info'=>$info);
		    }else{ 
		    	return array('status'=>1,'info'=>$uifo);
		    }
		}

		/**
		 * 获取注册表单组
		 * @return [type] [description]
		 */
		Public function webreggroups(){
	 		$cmd= sprintf(self::CMD_GET_WEBREGEDITGROUPS);
			$res = $this->MQ_QueryEx($cmd);

	 		$resarr=array(
	 			'error'=>'',
				'data'=>''
			);
			$Grups_format='iid/a64group';
			$Grops_length=68;
			$cnt = 0;
			for ($i = 0, $c = strlen($res); $i < $c; $i += $Grops_length){			 
				$group = unpack("@$i/$Grups_format", $res); //还原出mt4服务器返回的数据struct结构
				$resarr['data']['rows'][$cnt]['id']	=$group['id'];
				$resarr['data']['rows'][$cnt]['group']	=$group['group'];
				$cnt++;
			}
			$resarr['data']['total']=$cnt;
			return $resarr;
	 	}


		/**
		 * 获取初次加载 数据
		 * @param  [type] $symbol [description]
		 * @param  [type] $period [description]
		 * @param  [type] $from   [description]
		 * @param  [type] $to     [description]
		 * @return [type]         [description]
		 */
		Public function historyquotes($symbol,$period,$from,$to){
			if(isset($symbol)&& isset($period) && isset($from) && isset($to)){
				$cmd=sprintf(self::CMD_GET_HISTORYQUOTES,$symbol,$period,$from,$to);	
				$res =$this->MQ_QueryEx($cmd);	

				$resarr=array('error'=>'',
					'symbol'=>'',
					'period'=>0,
					'digits'=>0,
					'data'=>array()
						/*	'time_t'=>0,
							'open'=>0,
							'high'=>0,
							'low'=>0,
							'close'=>0,
							'vol'=>0)
							*/
				);		
				$resarr['symbol']=$symbol;
				$resarr['period']=$period;					
				$historyquotes_format = 'Lctm/iopen/ihigh/ilow/iclose/dvol';		
				$historyquotesistem_length=8+4+4+4+4+4;
				$cnt = 0;
					
				// if (!$ReadHistorycachefile){
				// 	$fhistorfile=@fopen($cachefilename,'w');
				// 	if (flock($fhistorfile, LOCK_EX))
				// 	{
				// 		fputs($fhistorfile, $res, strlen($res));
				// 		flock($fhistorfile, LOCK_UN);
						
				// 	}
				// 	if($fhistorfile) {
				// 		fclose($fhistorfile);
				// 		touch($cachefilename);
				// 	}
				// }
					
			    for ($i = 0, $c = strlen($res); $i < $c; $i += $historyquotesistem_length){
			    	if($c-$i<$historyquotesistem_length){break;}
			    	$quote = unpack("@$i/$historyquotes_format", $res); //还原出mt4服务器返回的数据struct结构
			    	//if(isset($_GET['from'])&& isset($_GET['to'])&&($quote['ctm']<$_GET['from'])){continue;} //排除非时间段的数据
					$resarr['data'][$cnt][0]	=$quote['ctm'];
					$resarr['data'][$cnt][1]	=$quote['open'];
					$resarr['data'][$cnt][2]	=$quote['high'];
					$resarr['data'][$cnt][3]	=$quote['low'];
					$resarr['data'][$cnt][4]	=$quote['close'];
					$resarr['data'][$cnt][5]	=$quote['vol'];											
					$cnt++;					
				}
				if ($cnt>0) 
					$resarr['currentprice']=$resarr['data'][$cnt-1][4];
				else
					$resarr['currentprice']=0;
				$cmd=sprintf(self::CMD_GET_SYMBOLDIGITS,$symbol);
				$resForDig = $this->MQ_QueryEx($cmd);
				$resultarr=explode("\r\n",$resForDig);
				if (!empty($res))
					$resarr['digits']=$resultarr[1];
				else
					$resarr['digits']='-1';


				return $resarr;	
			}	
		}

		/**
		 * webservice
		 * @param [type]  $query [description]
		 * @param boolean $flag  [description]
		 */
		Public function MQ_QueryEx($query,$flag=true){
		   
		    $ptr=@fsockopen($this->ip,$this->port,$errno,$errstr,$this->T_TIMEOUT); 
		    $ret = '';
		    if($ptr){
	         	if(fputs($ptr,"W$query\r\nQUIT\r\n")!=FALSE)
	             	while(!feof($ptr)){
	                	$line=fgets($ptr,128);
           				$ret .= $line;
	             	} 

	        	fclose($ptr);
	        	if($flag){
	        		return DecryptData($ret); //解密结果
	        	}else{
	        		return $ret;
	        	}
	        	
		    }
		}


		function __destory(){

		}
	}

?>