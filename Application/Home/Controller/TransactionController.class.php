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
    Public function getTotalInfo(){
        import('Org.Util.Mt');
        $res1 = \Mt::activeOrder();
        $res2 = \Mt::pendingOrder();
        $res=array_merge($res1['info']['orders'],$res2['info']['orders']);
        $this -> success($res);

    }
    Public function getTradeInfo(){
        import('Org.Util.Mt');
        $res = \Mt::activeOrder();
        
        $this->success($res['info']['orders']);
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
    Public function pendingTradeInfo(){
        import('Org.Util.Mt');
        $res = \Mt::pendingOrder();
        $this->success($res['info']['orders']);
    }

//历史交易======================================================================
    
    /**
     * 订单历史
     * @return [type] [description]
     */
    Public function historyOrder(){
    	$this->display();	
    }
    Public function historyOrderInfo(){
        import('Org.Util.Mt');
        $res = \Mt::historyOrder();
        $this->success($res['info']['orders']);
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