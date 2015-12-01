<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends CommonController {

    Public function index(){

    	import('Org.Util.Mt');
    	$res = \Mt::historyOrder();
    	$hand = 0;
    	$profit=0;
    	for($i=0;$i<$res['ordercount'];$i++){
    		$hand += $res['orders'][$i]['volume'];
    		$profit += $res['orders'][$i]['profit'];
    	}
    	$arr = array('orderCount'=>$res['ordercount'],'hand'=>$hand,'profit'=>$profit);
    	$this->assign('arr',$arr);
    	$this->display();
    }
}