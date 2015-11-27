<?php

/**
 * 管理员管理控制器
 */


namespace Manage\Controller;
use Think\Controller;

class UserController extends CommonController {

	Public function lists(){

		$user = M('User');
        $count      = $user->count();
        $Page       = new \Think\Page($count,25);
        $show       = $Page->show();
        $list = $user->limit($Page->firstRow.','.$Page->listRows)->select();
        // p($list);die;
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
	}
}

?>