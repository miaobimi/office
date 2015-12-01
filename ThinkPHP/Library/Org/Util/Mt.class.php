<?php 

	Class Mt{

		/**
		 * 获取账户信息
		 * @return [type] [description]
		 */
		Static function getAccountInfo(){

			// $arr = array(
			// 	"msg_type"=>20,
			// 	"login"=>session('uid')
			// );

			// $res = socketApi(json_encode($arr));

			 $str = '{"balance":"7277.12","email":"","equity":"6152.10","leverage":100,"margin":"3418.32","margin_free":"2733.78","msg_type":21,"name":"test","phone":"","regdate":"2015-11-24","result_code":0,"volume":"1003.90"}';
	        // if($result['result_code']<0){
	        //     $this->error();
	        // }else{
	            $str = json_decode($str,true);
	           	return $str;
	        // }
		}

		/**
		 * 登录
		 * @return [type] [description]
		 */
		Static function login(){
			$arr = array(
				"msg_type"=>10,
				"login"=>1997,
				"password"=>"123456a"
			);

			$res = socketApi(json_encode($arr));

			return $res;
		}

		/**
		 * 持仓
		 * @return [type] [description]
		 */
		Static function activeOrder(){

			// $arr = array(
			// 	"msg_type"=>30,
			// 	"login"=>1997
			// );

			// $res = socketApi(json_encode($arr));

			$str = '{"msg_type":31,"orders":[{"cmd":"buy","commission":"-50.00","openprice":"1.47863","closeprice":"1.47863","opentime":"2015-11-24 11:53:19","order":4509318,"profit":"-436.57","sl":"0.00000","swap":"63.72","symbol":"EURAUD","tp":"0.00000","volume":"1.00"},{"cmd":"buy","commission":"-50.00","openprice":"0.72747","closeprice":"0.72747","opentime":"2015-11-25 14:03:49","order":4509319,"profit":"-825.00","sl":"0.00000","swap":"5.88","symbol":"AUDUSD","tp":"0.00000","volume":"1.00"}],"result_code":0}
';
			return json_decode($str,true);
		}

		/**
		 * 挂单
		 * @return [type] [description]
		 */
		Static function pendingOrder(){
			// $arr = array(
			// 	"msg_type":40,
			// 	"login":1997
			// );

			// $res = socketApi(json_encode($arr));
			
			$str = '{"msg_type":41,"ordercount":1,"orders":[{"cmd":"buy stop","commission":"0.00","openprice":"1.06930","opentime":"2015-11-29 16:01:38","order":4509327,"profit":"0.00","sl":"0.00000","swap":"0.00","symbol":"EURUSD","tp":"0.00000","volume":"1.00"}],"result_code":0}  
';
			return json_decode($str,true);
		}

		/**
		 * 历史订单
		 * @return [type] [description]
		 */
		Static function historyOrder($params){

			$params = array(
				"msg_type"=>50,
				"login"=>1998,
				"symbol"=>"",
				"open_start"=>"2015-11-25",
				"open_end"=>"2015-11-25",
				"close_start"=>"2015-11-25",
				"close_end"=>"2015-11-25",
				"profit_start"=>0,
				"profit_end"=>0
			);

			// $res = socketApi(json_encode($params));

			$str = '{"msg_type":51,"ordercount":3,"orders":[{"closeprice":"92.132","closetime":"2015-11-25 14:06:27","cmd":"sell","commission":"-50.00","openprice":"92.097","opentime":"2015-11-25 14:06:00","order":4509321,"profit":"-28.60","sl":"0.0","swap":"0.0","symbol":"CADJPY","tp":"0.0","volume":"1.00"},{"closeprice":"0.96675","closetime":"2015-11-25 15:58:31","cmd":"buy","commission":"-50.00","openprice":"1.00000","opentime":"2015-11-25 15:57:26","order":4509322,"profit":"-2501.28","sl":"0.0","swap":"0.0","symbol":"AUDCAD","tp":"0.0","volume":"1.00"},{"closeprice":"0.72757","closetime":"2015-11-25 15:59:38","cmd":"buy","commission":"-50.00","openprice":"0.72800","opentime":"2015-11-25 15:59:14","order":4509323,"profit":"-43.00","sl":"0.72800","swap":"0.0","symbol":"AUDUSD","tp":"0.72900","volume":"1.00"}],"result_code":0}';
			return json_decode($str,true);
		}

		function __call($name, $args){
	        echo 'Sorry, "'.$name.'" not found.'.PHP_EOL;
	    }

		function __destory(){

		}
	}

?>