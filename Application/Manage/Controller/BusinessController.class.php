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
        $field = "mt_card.id,mt_withdrawal.id,mt_card.cardnegativeurl,mt_card.cardpositiveurl,mt_withdrawal.account,mt_withdrawal.money,mt_withdrawal.applyTime,mt_withdrawal.status,mt_withdrawal.checktime,mt_withdrawal.reason,mt_card.type,mt_card.bank,mt_card.bankaccount";
        $list = $withdrawal->order('applyTime desc')->join($join)->limit($Page->firstRow.','.$Page->listRows)->field($field)->select();
        $banklist = C('bankCode');
        foreach ($list as $k => $v) {
            $banArr = explode('-', $v['bank']);
            $list[$k]['bankCode'] = $banArr[0];
            $list[$k]['bankname'] = $banklist[$banArr[0]][1].'-'.$banArr[1].'-'.$banArr[2];
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

    Public function pay(){
        if(empty($_POST['Amount'])){
            $this->redirect('Manage/Business/checkWithdrawal');
            die;
        }

        $payment = C('payment');
        $caiyifu = $payment['caiyifu'];

        $Billno = date('YmdHis') . mt_rand(100000,999999);
        $Amount = number_format(floatval($_POST['Amount'])*C('rate'), 2, '.', '');
        $Date = date('Ymd');
        $month = date('Ym');

        $this->assign('BillNo', $Billno);
        $this->assign('Amount', $Amount);
        $this->assign('Date', $Date);
        $this->assign('Merchanturl', $caiyifu['Merchanturl2']);//支付结果成功返回的商户URL
        $this->assign('ServerUrl', $caiyifu['ServerUrl2']);//Server to Server 返回页面URL

        $this->assign('form_url', $caiyifu['form_url']);
        $this->assign('Mer_code', $caiyifu['Mer_code']);
        $this->assign('Mer_key', $caiyifu['Mer_key']);
        $this->assign('Currency_Type', $caiyifu['Currency_Type']);
        $this->assign('Gateway_Type', $caiyifu['Gateway_Type']);
        $this->assign('Lang', $caiyifu['Lang']);
        $this->assign('Attach', $_POST['id'].'-'.$month);
        $this->assign('OrderEncodeType', $caiyifu['OrderEncodeType']);
        $this->assign('RetEncodeType', $caiyifu['RetEncodeType']);
        $this->assign('Rettype', $caiyifu['Rettype']);
        $this->assign('DoCredit', $caiyifu['Rettype']);
        $this->assign('BankCode', $_POST['Bank_Code']);

        //订单支付接口的Md5摘要，原文=订单号+金额+日期+支付币种+商户证书 
        $SignMD5 = md5($Billno . $Amount . $Date . $caiyifu['Currency_Type'] . $caiyifu['Mer_key']);

        $this->assign('SignMD5',$SignMD5);

        $this->display();
    }

    //支付结果成功返回的商户URL
    Public function Merchanturl(){

        $billno = $_GET['MerOrderNo'];
        $amount = $_GET['Amount'];
        $mydate = $_GET['OrderDate'];
        $succ = $_GET['Succ'];
        $msg = $_GET['Msg'];
        $attach = $_GET['GoodsInfo'];
        $ipsbillno = $_GET['SysOrderNo'];
        $retEncodeType = $_GET['RetencodeType'];
        $currency_type = $_GET['Currency'];
        $signature = $_GET['Signature'];
        //Md5摘要认证
        $content = $billno . $amount . $mydate . $succ . $ipsbillno . $currency_type;
        $payment = C('payment');
        $caiyifu = $payment['caiyifu'];
        $signature_1ocal = md5($content . $payment['caiyifu']['Mer_key']);
        if ($signature_1ocal == $signature){
            //  判断交易是否成功
            if ($succ == 'Y'){

                import('Org.Util.Mt');
                $mt = \Mt::changeBalance(-$amount);
                if($mt['status']){
                    $attachArr = explode('-', $attach);
                    $data = array(
                        'id' => $attachArr[0],
                        'status' => 1,
                        'checkTime' => time()
                    ); 
                    if(M('withdrawal')->save($data)){
                        $this->redirect('Manage/Business/checkWithdrawal');
                    }else{
                        $this->error('修改数据库失败');
                    }
                }else{
                    $this->error($mt['info'],U('Manage/Business/checkWithdrawal'));
                }
                
            }else{
                $this->error('交易失败');
            }
        }else{
            $this->error('签名不正确');
        }
    }

    //Server to Server 返回页面URL
    Public function ServerUrl(){

        $this->display();
    }
}

?>