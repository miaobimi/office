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
);

?>