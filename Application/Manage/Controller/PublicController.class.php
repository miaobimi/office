<?php

/**
 * 公共控制器
 */


namespace Manage\Controller;
use Think\Controller;

class PublicController extends Controller {

	Public function login(){

		if(IS_POST){
			$account = I('account');
			$password = I('password','','md5');
	 
			if($account == '' || $password == ''){
				$this->error('账户和密码不能为空');
			}

            $where = array('username' => $account);

	    	$user  = M('User')->where($where)->find();
	    	if(!$user || $user['password'] != $password){
	    		$this->error('账号或者密码错误');
	    	}

	    	if(!$user['status']){
	    		$this->error('该账号已被锁定');
	    	}else{
	    		$data['last_login_ip'] = get_client_ip();
	    		$data['last_login_time'] = time();
	    		if(M('User')->where(array('uid'=>$user['uid']))->save($data)){
	    			session(C('USER_AUTH_KEY'), $user['uid']);
	    			session('uname', $user['username']);
	    			$this->success();
	    		}
	    	}
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