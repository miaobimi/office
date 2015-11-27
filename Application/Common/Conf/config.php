<?php
return array(
	//'配置项'=>'配置值'
	'DEFAULT_MODULE'     => 'Home',

    /* 调试配置 */
    'SHOW_PAGE_TRACE' => true,

    /* 用户相关设置 */
    //'USER_MAX_CACHE'     => 1000, //最大缓存用户数
    //'USER_ADMINISTRATOR' => 1, //管理员用户ID

    /* URL配置 */
    'URL_CASE_INSENSITIVE' => true, //默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'            => 3, //URL模式
    'VAR_URL_PARAMS'       => '', // PATHINFO URL参数变量
    'URL_PATHINFO_DEPR'    => '/', //PATHINFO URL分割符


    /* 全局过滤配置 */
    'DEFAULT_FILTER' => '', //全局过滤函数

     /* 数据库配置 */
    'DB_TYPE'   => 'mysqli', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'mtSystem', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'a0fc8b113f',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => 'mt_', // 数据库表前缀

    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/Static'
    ),

    // 配置邮件发送服务器
    'MAIL_HOST' =>'smtp.qq.com',//smtp服务器的名称
    'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
    'MAIL_USERNAME' =>'3069887237@qq.com',//你的邮箱名
    'MAIL_FROM' =>'3069887237@qq.com',//发件人地址
    'MAIL_FROMNAME'=>'IT创',//发件人姓名
    'MAIL_PASSWORD' =>'ddg123456',//邮箱密码
    'MAIL_CHARSET' =>'utf-8',//设置邮件编码
    'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件

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

?>