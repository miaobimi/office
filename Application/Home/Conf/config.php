<?php
return array(

	'SHOW_PAGE_TRACE' =>false, 

    /* URL配置 */
    'URL_MODEL'            => 2, //URL模式
    'VAR_URL_PARAMS'       => '', // PATHINFO URL参数变量
    'URL_PATHINFO_DEPR'    => '/', //PATHINFO URL分割符

	/* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__IMG__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/Images',
        '__CSS__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/Css',
        '__JS__'     => __ROOT__ . '/Public/' . MODULE_NAME . '/Js',
        '__STATIC__' => __ROOT__ . '/Public/Static'
    ),

    'bankCode' => array(
        "01100" => "中国工商银行",
        "01101" => "中国农业银行",
        "01102" => "招商银行",
        "01103" => "兴业银行",
        "01104" => "中信银行",
        "01106" => "建设银行",
        "01107" => "中国银行",
        "01108" => "交通银行",
        "01109" => "上海浦东发展银行",
        "01110" => "民生银行",
        "01111" => "华夏银行",
        "01112" => "光大银行",
        "01113" => "北京银行",
        "01114" => "广东发展银行",
        "01119" => "中国邮政储蓄",
        "01121" => "平安银行"
    ),

    'bank' => array(
    	'ABC' => '农业银行',
    	'BJBANK' => '北京银行',
    	'BOC' => '中国银行',
    	'BSB' => '包商银行',
    	'CCB' => '建设银行',
    	'CEB' => '光大银行',
    	'CIB' => '兴业银行',
    	'CITIC' => '中信银行',
    	'CMB' => '招商银行',
    	'CMBC' => '民生银行',
    	'COMM' => '交通银行',
    	'GCB' => '广州银行',
    	'GDB' => '广发银行',
    	'HXBANK' => '华夏银行',
    	'ICBC' => '工商银行',
    	'JSBANK' => '江苏银行',
    	'PSBC' => '中国邮政储蓄',
    	'SHBANK' => '上海银行',
    	'SPABANK' => '平安银行',
    	'SPDB' => '浦发银行'
    ),

    'rate' => 6.38,//美元兑人民币
    'payment' => array(

        //财易付支付
        'caiyifu' => array(
            'Mer_code' => 'T0000601',//交易账户号 测试账号
            //商户证书
            'Mer_key' => 'N3vuSHZ3j4WWemOmJinzmTG1t9KQTi2oeu7fxej7EWpFqkDRiFusIa0UNUbsXi9bcHSKFJPFZGKqDakiWSInOk5eTCr3cQA6woD8sTmzQEscpkqNJSwe0wnRmOQc2vCi',
            'Currency_Type' => 'RMB',//币种 RMB:人民币 HKD:港币 USD:usd
            'Gateway_Type' => '01', //01:人民币借记卡,02:国际信用卡
            'Lang' => 'GB', //GB中文 EN英语
            'OrderEncodeType' => '2',//订单支付加密方式 2:md5摘要 9:错误
            'RetEncodeType' => '12',//交易返回加密方式  12:md5摘要  11:Rsa  9:错误
            'Rettype' => '1',//是否提供Server返回方式 0:无Server to Server  9:错误

            'form_url' => 'http://testpay.cai1pay.com/gateway.aspx',//测试环境
            // 'form_url' => 'https://payment.cai1pay.com/gateway.aspx'//正式环境
            
            'Merchanturl' => 'http://office.chntz.cn/Home/Payment/Merchanturl.html',//支付成功返回URL
            'ServerUrl' => 'http://office.chntz.cn/Home/Payment/ServerUrl.html'//Server to Server返回页面

            // 'Attach' => '',//商户附加数据包
            //'Date' => ''//日期
            //'Amount' => '' //金额
            //'Billno' => ''//订单号
        )
    )
); 