<?php
namespace Home\Controller;
use Think\Controller;

class TestController extends Controller {

    Public function index(){
    	$this->display();
    }

    Public function test(){
    	$account = I('account');
    	$password = I('password','','md5');
    	$ip = I('ip');
    	$port = I('port');
    	$cmd = I('cmd');


    	import("Org.Util.Mt");
    	// import('Vendor.Myclass.Mt');
    	$mt = new \Mt('192.168.1.99',443);
    	// $mt = new \Mt('115.28.137.28',443);
    	$res = $mt->testCmd($account,$password,$ip,$port,$cmd);
        $this->ajaxReturn($res);
    }
}