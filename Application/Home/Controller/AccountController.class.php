<?php

/**
 * 账户管理控制器
 */


namespace Home\Controller;
use Think\Controller;

class AccountController extends Controller {


    /**
     * 账户信息
     * @return [type] [description]
     */
    Public function index(){

    	
    	$this->display();
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