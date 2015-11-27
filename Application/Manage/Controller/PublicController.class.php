<?php

/**
 * 公共控制器
 */


namespace Home\Controller;
use Think\Controller;

class PublicController extends Controller {

	Public function login(){

		if(IS_POST){
			p($_POST);
		}else{
			$this->display();
		}
	}

	Public function logout(){
		session_unset();
		session_destroy();
        $this->success();
	}
}


?>