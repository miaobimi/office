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