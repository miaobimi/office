<?php 

	function p($str){
		echo '<pre>'.print_r($str,true).'</pre>';
	}

	function DateAdd ($interval, $number, $date) {
	  	$date_time_array = getdate($date);
	  	$hours = $date_time_array["hours"];
	  	$minutes = $date_time_array["minutes"];
	  	$seconds = $date_time_array["seconds"];
	  	$month = $date_time_array["mon"];
	  	$day = $date_time_array["mday"];
	  	$year = $date_time_array["year"];
	  	switch ($interval) {
	  		case "y": $year +=$number; break;
	  		case "q": $month +=($number*3); break;
	  		case "m": $month +=$number; break;
	  		case "d": $day+=$number; break;
	  		case "w": $day+=($number*7); break;
	  		case "h": $hours+=$number; break;
	  		case "n": $minutes+=$number; break;
	  		case "s": $seconds+=$number; break;
	  	}
	  	$timestamp = mktime($hours ,$minutes, $seconds,$month ,$day, $year);
	  	return $timestamp;
	}

	function EncryptData($data){
		$len=FormatNumber(strlen($data),8); //格式化压缩前的原来长度成8位字符串例如: 00000023
		$result=gzcompress($data);			//压缩开始
		$result=$len.$result;				//把原来长度放到压缩后的数据前面
		$result=base64_encode($result);		//base64编码
		$len=FormatNumber(strlen($result),8);//获取base64编码后的数据长度
		$result=$len.$result;				//把base64后的长度放到base64后的数据前面
		return $result;
	}
	//解密数据
	function DecryptData($data){
		$result=gzuncompress($data);			
		return $result;
	}



	function keyED($txt,$encrypt_key){
		$encrypt_key = md5($encrypt_key);
		$ctr = 0;
		$tmp = '';
		for($i = 0; $i < strlen($txt); $i++) {
		$ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
		$tmp .= $txt[$i] ^ $encrypt_key[$ctr++];
		}
		return $tmp; 
	}

	function getParam($line){
	  	list($tmp,$value) = explode(' ',$line);
	  	return $value;
	}
 

	function EncryptTxt($txt,$key){
		srand((double)microtime() * 1000000);
		$encrypt_key = md5(rand(0, 32000));
		$ctr = 0;
		$tmp = '';
		for($i = 0;$i < strlen($txt); $i++) {
		$ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
		$tmp .= $encrypt_key[$ctr].($txt[$i] ^ $encrypt_key[$ctr++]);
		}
		return base64_encode(keyED($tmp, $key)); 
	}

	function DecryptTxt($txt,$key){
		$txt = keyED(base64_decode($txt), $key);
		$tmp = '';
		for($i = 0;$i < strlen($txt); $i++) {
		$md5 = $txt[$i];
		$tmp .= $txt[++$i] ^ $md5;
		}
		return $tmp; 
	}

	/**
	 * 邮件发送函数
	 * 
	 */
	// 配置邮件发送服务器
    // 'MAIL_HOST' =>'smtp.qq.com',//smtp服务器的名称
    // 'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
    // 'MAIL_USERNAME' =>'3069887237@qq.com',//你的邮箱名
    // 'MAIL_FROM' =>'3069887237@qq.com',//发件人地址
    // 'MAIL_FROMNAME'=>'xxx',//发件人姓名
    // 'MAIL_PASSWORD' =>'ddg123456',//邮箱密码
    // 'MAIL_CHARSET' =>'utf-8',//设置邮件编码
    // 'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件
    function sendMail($to, $title, $content) {
     
        include_once 'class/PHPMailer/PHPMailerAutoload.php';     
        $mail = new PHPMailer(); //实例化
        $mail->IsSMTP(); // 启用SMTP
        // $mail->SMTPDebug  = 1; 
        $mail->Host= 'smtp.qq.com';//C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
        $mail->SMTPAuth = TRUE;//C('MAIL_SMTPAUTH'); //启用smtp认证
        $mail->Username = '3175356712@qq.com';//'3175356712@qq.com';//C('MAIL_USERNAME'); //你的邮箱名
        $mail->Password = '00zyRT00';//C('MAIL_PASSWORD') ; //邮箱密码
        $mail->From = '3175356712@qq.com';//C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
        $mail->FromName = '中远融投 二元期权';//C('MAIL_FROMNAME'); //发件人姓名
        $mail->AddAddress($to,"尊敬的客户");
        $mail->WordWrap = 50; //设置每行字符长度
        $mail->IsHTML(TRUE); //C('MAIL_ISHTML') 是否HTML格式邮件
        $mail->CharSet='utf-8';//C('MAIL_CHARSET'); //设置邮件编码
        $mail->Subject =$title; //邮件主题
        $mail->Body = $content; //邮件内容
        $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
        return($mail->Send());
    }

    function isMobile() { 
	    $user_agent = $_SERVER['HTTP_USER_AGENT']; 
	    $mobile_agents = array("240x320", "acer", "acoon", "acs-", "abacho", "ahong", "airness", "alcatel", "amoi", 
	        "android", "anywhereyougo.com", "applewebkit/525", "applewebkit/532", "asus", "audio", 
	        "au-mic", "avantogo", "becker", "benq", "bilbo", "bird", "blackberry", "blazer", "bleu", 
	        "cdm-", "compal", "coolpad", "danger", "dbtel", "dopod", "elaine", "eric", "etouch", "fly ", 
	        "fly_", "fly-", "go.web", "goodaccess", "gradiente", "grundig", "haier", "hedy", "hitachi", 
	        "htc", "huawei", "hutchison", "inno", "ipad", "ipaq", "iphone", "ipod", "jbrowser", "kddi", 
	        "kgt", "kwc", "lenovo", "lg ", "lg2", "lg3", "lg4", "lg5", "lg7", "lg8", "lg9", "lg-", "lge-", "lge9", "longcos", "maemo", 
	        "mercator", "meridian", "micromax", "midp", "mini", "mitsu", "mmm", "mmp", "mobi", "mot-", 
	        "moto", "nec-", "netfront", "newgen", "nexian", "nf-browser", "nintendo", "nitro", "nokia", 
	        "nook", "novarra", "obigo", "palm", "panasonic", "pantech", "philips", "phone", "pg-", 
	        "playstation", "pocket", "pt-", "qc-", "qtek", "rover", "sagem", "sama", "samu", "sanyo", 
	        "samsung", "sch-", "scooter", "sec-", "sendo", "sgh-", "sharp", "siemens", "sie-", "softbank", 
	        "sony", "spice", "sprint", "spv", "symbian", "tablet", "talkabout", "tcl-", "teleca", "telit", 
	        "tianyu", "tim-", "toshiba", "tsm", "up.browser", "utec", "utstar", "verykool", "virgin", 
	        "vk-", "voda", "voxtel", "vx", "wap", "wellco", "wig browser", "wii", "windows ce", 
	        "wireless", "xda", "xde", "zte"); 
	    $is_mobile = false; 
	    foreach ($mobile_agents as $device) { 
	        if (stristr($user_agent, $device)) { 
	            $is_mobile = true; 
	            break; 
	        } 
	    } 
	    return $is_mobile; 
	}	

	/**
	 * 美元-》人民币
	 * @param  [type] $money [description]
	 * @return [type]           [description]
	 */
	function changeRate($money,$tag=false){
		if($tag){
			return $money*floatval(C('rate'));	
		}
		return $money/floatval(C('rate'));
	}

	/**
	 * 银行代码转 银行名称
	 * @param  [type] $no [description]
	 * @return [type]     [description]
	 */
	function getBankName($no){
		$bankcode = C('bankcode');
		return $bankcode[$no];
	}

	/**
	 * 格式化银行卡号码
	 * @param  [type] $no [description]
	 * @return [type]     [description]
	 */
	function replaceBankNumber($no){
		return substr($no, 0,4).'****'.substr($no, -4);
	}

?>