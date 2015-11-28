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

    	$this->display();
    }

    Public function ajaxForPage(){
        $card = M('card');
        $where = array('account'=>session('uname'));
        $count      = $card->where($where)->count();
        $Page       = new \Think\Page($count,3);
        $show       = $Page->show();
        $list = $card->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $k => $v) {
            $banArr = explode('-', $v['bank']);
            $list[$k]['bankicon'] = $banArr[0];
        }
        $result = array(
            'page' => $show,
            'list' => $list
        );
        $this->success($result);
    }

    Public function delCard(){

        if(IS_AJAX){
            $cardid = I('cardid',0,'intval');
            $cardpositiveurl = I('cardpositiveurl');
            $cardnegativeurl = I('cardnegativeurl');
            if($cardid>0){
                if(M('card')->delete($cardid)){
                    if(unlink($cardpositiveurl) && unlink($cardnegativeurl)){
                        $this->success();
                    }else{
                        $this->error('删除银行卡图片资源失败');
                    }
                }else{
                    $this->error('删除银行卡失败');
                }
            }
        }
    }

    /**
     * 接口获取账户信息 
     * @return [type] [description]
     */
    Public function getAccountInfo(){
        // p($_POST);
        //接口 api
        // import("Org.Util.Mt");
        // $mt = new \Mt('192.168.1.99',443);
        $result = $mt->testCmd($account,$password,$ip,$port,$cmd);

        $result = array('leveral'=>"1:10000");

        $this->success($result);
    }

    Public function saveCard(){
        if(IS_POST){
            // p($_POST);die;
            $cardid = I('id',0,'intval');
            if($cardid>0){
                if(M('card')->save($_POST)){
                    $this->success('修改银行卡成功');
                }else{
                    $this->error('修改银行卡失败');
                }
            }else{
                $account = session('account') || 'test';
                $_POST['account'] = $account;
                if(M('card')->add($_POST)){
                   $this->success('增加银行卡成功');
                }else{
                    $this->error('增加银行卡失败');
                }
            }
            
        }
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