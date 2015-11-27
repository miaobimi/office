<?php

/**
 * 账户管理控制器
 */


namespace Home\Controller;
use Think\Controller;

class AccountController extends CommonController {


    /**
     * 账户信息
     * @return [type] [description]
     */
    Public function index(){

        $card = M('card');
        $where = array('account'=>session('uname'));
        $count      = $card->where($where)->count();
        $Page       = new \Think\Page($count,25);
        $show       = $Page->show();
        $list = $card->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $k => $v) {
            $banArr = explode('-', $v['bank']);
            $list[$k]['bankicon'] = $banArr[0];
        }
        $this->assign('list',$list);
        $this->assign('page',$show);
    	$this->display();
    }

    Public function getAccountInfo(){
        // p($_POST);
        //接口 api
        // import("Org.Util.Mt");
        // $mt = new \Mt('192.168.1.99',443);
        $result = $mt->testCmd($account,$password,$ip,$port,$cmd);

        $result = array('leveral'=>"1:10000");

        $this->success($result);
    }


    /**
     * 账户统计
     * @return [type] [description]
     */
    Public function total(){

        $this->display();
    }


    /**
     * 交易报表
     * @return [type] [description]
     */
    Public function traderList(){

        $this->display();
    }

    /**
     * 更改杠杆
     * @return [type] [description]
     */
    Public function editLeverage(){

        if(IS_POST){

        }else{
             $this->display();
        }
    }

    /**
     * 更改手机
     * @return [type] [description]
     */
    Public function editMobile(){

        if(IS_POST){

        }else{
             $this->display();
        }
    }

    /**
     * 更改电邮
     * @return [type] [description]
     */
    Public function editMail(){

        if(IS_POST){

        }else{
             $this->display();
        }
    }

    /**
     * 更改主密码
     * @return [type] [description]
     */
    Public function editMainPass(){

        if(IS_POST){

        }else{
             $this->display();
        }
    }

    /**
     * 更改投资人密码
     * @return [type] [description]
     */
    Public function editInvestorPass(){

        if(IS_POST){

        }else{
             $this->display();
        }
    }
}

?>