<?php

/**
 * 公共控制器
 */


namespace Home\Controller;
use Think\Controller;

class PublicController extends Controller {

	Public function login(){

		if(IS_POST){
			// 登录逻辑 api
			$account = I('account');
			$password = I('password');
			session(C('USER_AUTH_KEY'), $account);
			session('uname', $account);
			$this->success();
		}else{
			$this->display();
		}
	}

	Public function logout(){
		session('uid',null);
		session('uname',null);
        $this->success();
	}
}


?>