<?php

namespace Home\Controller;
use Think\Controller;

class CommonController extends Controller {

	Public function _initialize(){
		$uid = $_SESSION[C('SESSION_PREFIX')][C('USER_AUTH_KEY')];

		//判断是否有uid
		if(!isset($uid)){
			$this->redirect("Public/login");
		}
	}
}

?>