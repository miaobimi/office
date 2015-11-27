<?php

/**
 * 出入金管理
 */

namespace Home\Controller;
use Think\Controller;

class PaymentController extends CommonController {

//入金相关=========================================================================
    /**
     * 账户入金
     * @return [type] [description]
     */
    Public function index(){

    	if(IS_POST){

        }else{
            $this->display();
        }
    	
    }


    /**
     * 入金记录
     * @return [type] [description]
     */
    Public function inRecords(){

        $deposits = M('deposits');
        $where = array('account'=>1);
        $count      = $deposits->where($where)->count();
        $Page       = new \Think\Page($count,25);
        $show       = $Page->show();
        $list = $deposits->where($where)->order('successTime')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
    }

    /**
     * 入金统计
     * @return [type] [description]
     */
    Public function inTotal(){
        $where = array('account'=>1);
        $total = M('deposits')->where($where)->field('month,sum(amount) as total,count(month) as hand')->group('month')->select();
        // p($total);die;
        $this->list = $total;
        $this->display();
    }

    Public function pay(){

        if(empty($_POST['Amount'])){
            $this->redirect('Home/Payment/index');
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
        $this->assign('Merchanturl', $caiyifu['Merchanturl']);//支付结果成功返回的商户URL
        $this->assign('ServerUrl', $caiyifu['ServerUrl']);//Server to Server 返回页面URL

        $this->assign('form_url', $caiyifu['form_url']);
        $this->assign('Mer_code', $caiyifu['Mer_code']);
        $this->assign('Mer_key', $caiyifu['Mer_key']);
        $this->assign('Currency_Type', $caiyifu['Currency_Type']);
        $this->assign('Gateway_Type', $caiyifu['Gateway_Type']);
        $this->assign('Lang', $caiyifu['Lang']);
        $this->assign('Attach', $_POST['Bank_Code'].'-'.$month);
        $this->assign('OrderEncodeType', $caiyifu['OrderEncodeType']);
        $this->assign('RetEncodeType', $caiyifu['RetEncodeType']);
        $this->assign('Rettype', $caiyifu['Rettype']);

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
                $attachArr = explode('-', $attach);
                $data = array(
                    'Currency_Type' => $currency_type,
                    'Amount' => $amount,
                    'account' => session('account') || 'test',
                    'inDate' => $mydate,
                    'successTime' => time(),
                    'Billno' => $billno,
                    'SysOrderNo' => $ipsbillno,//交易凭证
                    'bank' => $attachArr[0],
                    'month' => $attachArr[1]
                ); 
                if(M('deposits')->add($data)){
                    $this->redirect('Home/Payment/inRecords');
                }else{
                    $this->error('写入数据库失败');
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


//出金相关=========================================================================


    /**
     * 账户出金
     * @return [type] [description]
     */
    Public function outPayment(){

        if(IS_POST){

        }else{
            $where = array('account'=>1);
            $card = M('card')->where($where)->field("id,type,account,bank,bankAccount")->select();
            foreach ($card as $k => $v) {
                $bankArr = explode('-', $v['bank']);
                $bankAccountArr = explode('-', $v['bankaccount']);
                $card[$k]['bankicon'] = $bankArr[0];
                $card[$k]['bankno'] = replaceBankNumber($bankAccountArr[1]);
                $card[$k]['name'] = $bankAccountArr[0];
            }
            $this->list = $card;
            // p($card);die;
            $this->display();
        }
    }

    /**
     * 出金记录
     * @return [type] [description]
     */
    Public function outRecords(){

        $withdrawal = M('withdrawal');
        $account = 1;
        $count      = $withdrawal->where($where)->count();
        $Page       = new \Think\Page($count,25);
        $show       = $Page->show();
        $join = "mt_card ON mt_card.id=mt_withdrawal.cid where mt_withdrawal.account={$account}";
        $field = "mt_card.id,mt_withdrawal.account,mt_withdrawal.money,mt_withdrawal.applyTime,mt_withdrawal.status,mt_withdrawal.checkTime,mt_withdrawal.reason,mt_card.type,mt_card.bank,mt_card.bankaccount";
        $list = $withdrawal->order('applyTime')->join($join)->limit($Page->firstRow.','.$Page->listRows)->field($field)->select();
        $banklist = C('bank');
        foreach ($list as $k => $v) {
            $banArr = explode('-', $v['bank']);
            $list[$k]['bankname'] = $banklist[$banArr[0]].'-'.$banArr[1].'-'.$banArr[2];
            $list[$k]['reminbi'] = changeRate($v['money'],true);
            $list[$k]['applytime'] = date('Y-m-d H:i:s',$v['applytime']);
        }
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
    }

    /**
     * 出金统计
     * @return [type] [description]
     */
    Public function outTotal(){

        $where = array('account'=>1);
        $total = M('withdrawal')->where($where)->field('month,sum(money) as total,count(month) as hand')->group('month')->select();
        // p($total);die;
        $this->list = $total;
        $this->display();
    }



    //==========================================================
    Public function saveCardAndMoney(){
        if(IS_POST){
            // p($_POST);
            $account = session('account') || 'test';
            $_POST['account'] = $account;
            if($cid = M('card')->add($_POST)){
                $data = array(
                    'cid'=>$cid,
                    'money'=>I('money'),
                    'account' => $account,
                    'applyTime' => time(),
                    'status' => 0
                );
                if(M('withdrawal')->add($data)){
                    $this->success('提交成功');
                }else{
                    $this->error('操作失败');
                }
                
            }else{
                $this->error('增加银行卡失败');
            }
        }
    }


    Public function withdrawal(){
        $account = session('account') || 'test';
        $data = array(
            'cid'=>I('cardid'),
            'money'=>I('money'),
            'account' => $account,
            'applyTime' => time(),
            'month' => date('Ym'),
            'status' => 0
        );
        if(M('withdrawal')->add($data)){
            $this->success('操作成功');
        }else{
            $this->error('操作失败');
        }
    }

    Public function uploadCard(){
        if (!empty($_FILES)) {
          
            $config = array(   
                'maxSize'    =>    3145728, 
                'savePath'   =>    './cards/',  
                'saveName'   =>    array('uniqid',''), 
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),  
                'autoSub'    =>    true,   
                'subName'    =>    array('date','Ymd'),
            );
            $upload = new \Think\Upload($config);// 实例化上传类
            $images = $upload->upload();
          
            if($images){
                $thinkUrl = $images['file']['savepath'].$images['file']['savename'];
                $info='./Uploads/'.ltrim($thinkUrl,'./');
                //返回文件地址和名给JS作回调用
                $data = array(
                    'status' => 1,
                    'filename' => $images['file']['savename'],
                    'file' => $info,
                    'message' => '上传成功'
                );
                $this->ajaxReturn($data);
            }
            else{
                $data = array(
                    'status' => 0,
                    'message' => $upload->getError()
                );
                $this->ajaxReturn($data);
            }
        }
    }
}