<?php

/**
 * 交易管理
 */

namespace Home\Controller;
use Think\Controller;

class TransactionController extends CommonController {

//当前持仓=========================================================

	/**
	 * 全部
	 * @return [type] [description]
	 */
    Public function index(){
        $this->display();
    }
    Public function getTradeInfo(){
        $str = '{"msg_type":31,"orders":[{"cmd":"buy","commission":"-50.00","openprice":"1.47863","opentime":"2015-11-24 11:53:19","order":4509318,"profit":"-436.57","sl":"0.00000","swap":"63.72","symbol":"EURAUD","tp":"0.00000","volume":"1.00"},{"cmd":"buy","commission":"-50.00","openprice":"0.72747","opentime":"2015-11-25 14:03:49","order":4509319,"profit":"-825.00","sl":"0.00000","swap":"5.88","symbol":"AUDUSD","tp":"0.00000","volume":"1.00"}],"result_code":0}';
        $str = json_decode($str,true);
        $this->success($str[orders]);
    }

    /**
     * 订单
     * @return [type] [description]
     */
    Public function order(){

    	$this->display();
    }

    /**
     * 挂单
     * @return [type] [description]
     */
    Public function pending(){

    	$this->display();
    }


//历史交易======================================================================
    
    /**
     * 订单历史
     * @return [type] [description]
     */
    Public function historyOrder(){
    	$this->display();	
    }

    /**
     * 出入金历史
     * @return [type] [description]
     */
    Public function outAndInRecords(){
    	$this->display();	
    }

    /**
     * 挂单
     * @return [type] [description]
     */
    Public function historyPending(){

    	$this->display();
    }
}

?>