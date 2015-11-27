<?php

/**
 * 业务管理控制器
 */


namespace Manage\Controller;
use Think\Controller;

class BusinessController extends CommonController {


    /**
     * 账户信息
     * @return [type] [description]
     */
    Public function index(){


    	$this->display();
    }

    /**
     * 出金审核
     * @return [type] [description]
     */
    Public function checkWithdrawal(){
        $withdrawal = M('withdrawal');
        $count      = $withdrawal->count();
        $Page       = new \Think\Page($count,25);
        $show       = $Page->show();
        $join = "mt_card ON mt_card.id=mt_withdrawal.cid";
        $field = "mt_card.id,mt_card.cardnegativeurl,mt_card.cardpositiveurl,mt_withdrawal.account,mt_withdrawal.money,mt_withdrawal.applyTime,mt_withdrawal.status,mt_withdrawal.checktime,mt_withdrawal.reason,mt_card.type,mt_card.bank,mt_card.bankaccount";
        $list = $withdrawal->order('applyTime')->join($join)->limit($Page->firstRow.','.$Page->listRows)->field($field)->select();
        $banklist = C('bank');
        foreach ($list as $k => $v) {
            $banArr = explode('-', $v['bank']);
            $list[$k]['bankname'] = $banklist[$banArr[0]].'-'.$banArr[1].'-'.$banArr[2];
            $list[$k]['reminbi'] = changeRate($v['money'],true);
            $list[$k]['applytime'] = date('Y-m-d H:i:s',$v['applytime']);
            $list[$k]['checktime'] = $v['checktime'] ? date('Y-m-d H:i:s',$v['checktime']) : '';
        }
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
    }

    Public function recordReason(){
        if(IS_AJAX){
            $reason = I('reason');
            if(!empty($reason)){
                $_POST['checkTime'] = time();
                if(M('withdrawal')->save($_POST)){
                    $this->success(date('Y-m-d H:i:s',$_POST['checkTime']));
                }else{
                    $this->error('原因提交失败,请重试');
                }
            }
        }
    }
}

?>