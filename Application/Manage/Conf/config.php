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

    /* SESSION 和 COOKIE 配置 */
    'SESSION_PREFIX' => 'mt_manage', //session前缀
    'COOKIE_PREFIX'  => 'mt_manage_', // Cookie前缀 避免冲突
    'VAR_SESSION_ID' => 'session_id',   //修复uploadify插件无法传递session_id的bug

    'USER_AUTH_KEY' =>'uid'

); 