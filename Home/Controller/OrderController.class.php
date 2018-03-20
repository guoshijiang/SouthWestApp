<?php
namespace Home\Controller;
use Tools\HomeController;
class OrderController extends HomeController
{
	public function getOrderAllStatus()
	{
		$header = getAllHeaders();
		$token = $header['x-access-token'];
    $userdata = D('User') -> checkTokenAndEchoInfo($token);
    $Orderstatus = D('Orderstatus');
    $ostatusinfo = $Orderstatus->select();
    if(!$ostatusinfo)
    {
    	$output['status'] = 500;
		  $output['msg'] = "server error";
		  echo json_encode($output, JSON_UNESCAPED_SLASHES);
			exit;
    }
    else
    {
		  $output = array
		  (
	    	'status' => 200, 
	    	'msg' => 'success', 
	    	'data' => array
	    	( 	
				 	 ostatusinfo => $ostatusinfo,      			 	 
	      ), 
			);
			echo json_encode($output, JSON_UNESCAPED_SLASHES);
			exit;
    }
	}
	
	public function generateOrder()
	{
		$shop_ids = I('post.shop_ids');
		$cgn_id = I('post.cgn_id');
		$order_post = I('post.order_post');
		$header = getAllHeaders();
		$token = $header['x-access-token'];
		$appid ="2017091608772582";
		$rsa_private = "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCtnjStPeDSZOv6O83qcHbgto/y11OfUkEOxRiwi0lZg4KmySqFHXH12sA1PupHVN7dCtaZzrBKIe/YhNkGkqpq0dzY0lFg52ASVtPgrkC0gJNDGM59KicuJkv1EirzKrkSzI9hvtJ4B/S0MLrkQDJPK8AWh/MwN1khF5JsdQHzWMtyT0FgB2DaiNbzVcYSrBeSAet+3c2pF2qee6dBFYJQ4r2rVSj+LFB5innGKNA8RHdiyssEzXZwazPeHF5L+J2/7qCfvksA7yQxIx++EOaKdH1gxW1CWwNSeFkWl46FwfGSZfv11V0jXCzmLyF+b0gmoTHJ+YnsTKdo7Ap5ba5RAgMBAAECggEAHk3B5gcp6a9B3RB5NZVhuoFDCOD6sJFb16chUxdMuzoQIOp16HwmOwJukBymKcMvjydoI7qG3LmlsoYll1ccNb7hrFqxZ5ebFjhfjRT9KERU794xlHk6E30Nvv3nzz/Cw/w+fpIfDGJfHOBwjoyB+32oboZWNTFD9lm17gZSS9YHK1jGACP4VamkOhko8FVcFTxRGdyAMF1vk3pKKBJjgu3VpYQ+QxeVgjwITz5xGoKTRC9+VFlH6wCN3cMStavCWXcpRTddons+qba3tNN0vLHM4jZ+fSICfQg0fosAbZ6ohmgI67NUWuL+RJVZ0rtQXCQ/vIQJHXYG+UfKwaM+AQKBgQDb5H5ydQiC7gFJaCjP7JAFHS5KvUIgQS5ddW9d+KA/lioRG4c/IN4G2D+CB9YzCc49XeArbkRjppkHUrp/pHx5qLWoJ70i0s+kM5QRI6545ImhPTRkyr9KNlT9yKhq6GIfSdzwMEISFpaQKDG3jDsLx/uhq/pL6stBusF1TNEC4QKBgQDKIH4hXcI63+K1GB0SOWTohq03kXqCfCCkwvSSdMegeGcnnoKcd+hKWaqEMQYLtWO5RlwZRPK+aThcsr/Uvu2gmwyZCKbhjbs2vjdR126uAidtsgbHWdrMFjychi9vsP/PTi9RpZEkuzDI3J0a/TY0Aw5NV37KrDxvnCfw68GJcQKBgASOcYhRoIGGCQTKYb4dOsbAWgs2bL5aW2mYW1xpIHjw1aJRHbZTKgaeSIKbQvb/xwRCg7iiqkweUaFzN2YZtHKY6lq3qBWmpKLUZscMJDthEPEEYaeNA/W3tn8jv0mn0xCu6SMY/OV/DlOiYZVaFIcj97Tb6W3VSazs/8E8fEBBAoGAXGeYYhaj+hhqY1H/0FoOyMLxI4tNj6PBpLE/8EiVDsacmh88JN4ogv0VGFP1KJsnWQdSiXbc5rHhw3cwfck/h4H6s2eiK1GJOhCh57ducPypG9wcfzyT62NrGD+8JfqsKBDdTx07CqjNN7ar2C/UfNi8zBzo6SzugDPKiritBPECgYEAlW1zmMU8phIfrN4gUrGNf7fbB1TXzPCgBT+cmz0F7U0cmAzCtzl1xlgIvMVGy1ikr313B2fjfhbMsgB7rzcHNWcUZKJwljwSA5Tfpe+eICx5RouRxiC1q0Q9YC0kx9ydikD2xUusemHvIf3firtywtK2hVGQDjZgcF2oDQSNTmI=";
		$subject     = "south west goods service";
    $userdata    =  D('User') -> checkTokenAndEchoInfo($token);
    $order = D('Order');
    if($shop_ids == null || $cgn_id == null)
    {
    	$array['status'] = 400;
      $array['msg'] = "client error";  
      echo json_encode($array, JSON_UNESCAPED_SLASHES);
      exit;
    }
    else
    {
    	$shop_ids = explode(",", $shop_ids);
    	$shopinfo = D('Goodshop')
        ->where(array('shop_id'=>array('in', $shop_ids)))
        ->select();
      if(!$shopinfo)
      {
      	$output['status'] = 200;
			  $output['msg'] = "success";
			  $output['data'] = $shopinfo;
			  echo json_encode($output, JSON_UNESCAPED_SLASHES);
				exit;
      }
      else
      {	
      	foreach($shopinfo as $k => $v)
   		  {
   		  	$data = $order -> create();
          $data['order_number'] = "ES".date('YmdHis').mt_rand(10000,99999);
   		  	$data['order_price'] = $v['goods_total_price'];
   		  	if($order_post == null)
   		  	{
   		  		$data['order_post'] = 1;
   		  	}
   		  	else
   		  	{
   		  		$data['order_post'] = $order_post;
   		  	}
   		  	$data['shop_id'] =  $v['shop_id'];
   		  	$data['cgn_id'] = $cgn_id;
   		  	$data['user_id'] = $userdata['user_id'];
   		  	$data['goodtype_id'] = $v['goodtype_id'];
   		  	$data['yuangong_id'] = $v['yuangong_id'];
   		  	$data['goods_name'] = $v['goods_name'];
   		  	$data['goods_introduce'] = $v['goods_introduce'];
   		  	$data['goods_log'] = $v['goods_log']; 
   		  	$data['goods_price'] = $v['goods_price'];
   		  	$data['goods_number'] = $v['goods_buy_number'];
   		  	$data['add_time'] = time();
   		  	$data['end_time'] = strtotime('+1440 min',time());
   		  	$order ->add($data);	
   		  }
   		  $oinfo = D('Goodshop')
		        ->where(array('shop_id'=>array('in', $shop_ids)))
		        ->delete();
		    
		    $order_total_price = 0;
		    
		    $orderRetInfo = D('Order') -> field('order_id, goods_name, order_number, order_price, is_cmt, left(from_unixtime(add_time), 16) add_time, left(from_unixtime(end_time), 16) end_time')
		    	  ->where(array('shop_id'=>array('in', $shop_ids), 'user_id' => $userdata['user_id'])) -> select();
		    
		    if(!$orderRetInfo)
		    {
		    	$output['status'] = 200;
				  $output['msg'] = "success";
				  $output['data'] = $orderRetInfo;
				  echo json_encode($output, JSON_UNESCAPED_SLASHES);
					exit;
		    }
		    else
		    {
		    	foreach($orderRetInfo as $k => $v)
			    {
			    	$order_total_price += $v['order_price']; 
			    }
			    $output = array
				  (
			    	'status' => 200, 
			    	'msg' => 'success', 
			    	'data' => array
			    	( 	
			    		 appid =>$appid,
			    		 rsa_private => $rsa_private,
							 subject => $subject,  
							 order_total_price => $order_total_price,  
			    		 order_creat_time => $data['add_time'],
			    		 order_time_end => $orderRetInfo[0]['end_time'],
						 	 orderRetInfo => $orderRetInfo,      			 	 
			      ), 
					);
			 		echo json_encode($output, JSON_UNESCAPED_SLASHES);
			 		exit;
		    }
      }
    }
	}
	
	public function getAllOrderList()
	{
		$page_index  = I('post.page_index');
		$header = getAllHeaders();
		$token = $header['x-access-token'];
    $userdata = D('User') -> checkTokenAndEchoInfo($token);
    $per = 5;
    $oderinfo = D('Order')
    		->field('order_id, order_pay, order_price, order_status, goods_name, goods_number, goods_log, goods_introduce, is_cmt, goodtype_id, yuangong_id, left(from_unixtime(add_time),16) order_creat_time, left(from_unixtime(end_time),16) order_time_end')
        ->where(array('user_id' => $userdata['user_id']))
        ->limit(($page_index-1)*$per, $per)
        ->select();
    if(!$oderinfo)
    {
    	$output = array
		   (
		    	'status' => 200, 
		    	'msg' => 'success', 
		    	'data' => array
		    	( 	
					 	 oderinfo => $oderinfo,      			 	 
		      ), 
			 );
		  echo json_encode($output, JSON_UNESCAPED_SLASHES);
			exit;
    }
    else
    {
    	 $output = array
		   (
		    	'status' => 200, 
		    	'msg' => 'success', 
		    	'data' => array
		    	( 	
					 	 oderinfo => $oderinfo,      			 	 
		      ), 
			 );
			 echo json_encode($output, JSON_UNESCAPED_SLASHES);
			 exit;
    }
	}
	
	public function getOrderListByStatus()
	{
		$order_status = I('post.order_status');
		$page_index  = I('post.page_index');
		$header = getAllHeaders();
		$token = $header['x-access-token'];
    $userdata = D('User') -> checkTokenAndEchoInfo($token);
    $per = 5;
    $oderinfo = D('Order')
    		->field('order_id, order_pay, order_price, order_status, goods_name, goods_number, goods_log, goods_introduce, is_cmt, goodtype_id, yuangong_id, left(from_unixtime(add_time),16) order_creat_time, left(from_unixtime(end_time),16) order_time_end')
        ->where(array('user_id' => $userdata['user_id'], 'order_status' => $order_status))
        ->limit(($page_index-1)*$per, $per)
        ->select();
    if(!$oderinfo)
    {
    	$output = array
	    (
	    	'status' => 200, 
	    	'msg' => 'success', 
	    	'data' => array
	    	( 	
				 	 oderinfo => $oderinfo,      			 	 
	      ), 
		  );
		  echo json_encode($output, JSON_UNESCAPED_SLASHES);
			exit;
    }
    else
    {
    	 $output = array
		   (
		    	'status' => 200, 
		    	'msg' => 'success', 
		    	'data' => array
		    	( 	
					 	 oderinfo => $oderinfo,      			 	 
		      ), 
			 );
			 echo json_encode($output, JSON_UNESCAPED_SLASHES);
			 exit;
    }
	}
	
	public function getODInfoById()
	{
		$order_id = I('get.order_id');
		$header = getAllHeaders();
		$token = $header['x-access-token'];
    $userdata = D('User') -> checkTokenAndEchoInfo($token);
    $oderinfo = D('Order')
       ->field('order_id, order_number, order_pay, order_price, order_status, cgn_id, goods_name, goods_number, goods_log, goods_introduce, is_cmt, goodtype_id, yuangong_id, left(from_unixtime(add_time),16) order_creat_time, left(from_unixtime(end_time),16) order_time_end')
    	 ->where(array('user_id' => $userdata['user_id'], 'order_id' => $order_id))
       ->select();
    $cgn_ids = $oderinfo[0]['cgn_id']; 
    $addrinfo = D('Consignee')
	        ->field('cgn_id, user_id, cgn_name, cgn_tel, cgn_daddr')
	        ->where(array('cgn_id'=>$cgn_ids))
	        ->select();  
	  foreach($oderinfo as $k => $v)
    {
      foreach($addrinfo as $kk => $vv)
      {
        if($vv['cgn_id']===$v['cgn_id'])
        {
            $oderinfo[$k]['addrinfo'][] = $vv;
        }
      }
    }
    if(!$oderinfo)
    {
    	$output['status'] = 200;
		  $output['msg'] = "success";
		  $output['data'] = $oderinfo[0];	
		  echo json_encode($output, JSON_UNESCAPED_SLASHES);
		 	exit;
    }
    else
    { 	 
   		$output['status'] = 200;
      $output['msg'] = "success";
      $output['data'] = $oderinfo[0];		    	
			echo json_encode($output, JSON_UNESCAPED_SLASHES);
			exit;
    }
	}
	
	public function cancelOrderBycustomer()
	{
		$order_ids = I('post.order_ids');
		$header = getAllHeaders();
		$token = $header['x-access-token'];
    $userdata = D('User') -> checkTokenAndEchoInfo($token);
    $Order = D('Order');
    if($order_ids == null)
    {
    	$output['status'] = 400;
		  $output['msg'] = "client error";
		  echo json_encode($output, JSON_UNESCAPED_SLASHES);
			exit;
    }
    $order_ids = explode(",", $order_ids);
    $oderinfo = D('Order') -> field('order_id')
    		->where(array('order_id'=>array('in', $order_ids)))
        ->select();
    if(!$oderinfo)
    {
    	$output['status'] = 200;
		  $output['msg'] = "server error";
		  $output['data'] = $oderinfo;
		  echo json_encode($output, JSON_UNESCAPED_SLASHES);
			exit;
    }
    foreach($oderinfo as $k => $v)
   	{
   		 $OrderInfo = D('Order') ->find($v['order_id']);
   		 $Order->order_status = 2;
   		 $rst = $Order -> where(array('order_id'=>$OrderInfo['order_id']))->save();
   	}
    $output['status'] = 200;
    $output['msg'] = 'cancel success';
	  echo json_encode($output, JSON_UNESCAPED_SLASHES);
	  exit;	
	}
	
	public function confirmOrder()
	{
		$order_id = I('get.order_id');	
		$header = getAllHeaders();
		$token = $header['x-access-token'];
    $userdata = D('User') -> checkTokenAndEchoInfo($token);
    $Order = D('Order');
    if($order_id == null)
    {
    	$output['status'] = 400;
		  $output['msg'] = "client error";
		  echo json_encode($output, JSON_UNESCAPED_SLASHES);
			exit;
    }
    
 		$Order->order_status = 4;
 		$rst = $Order -> where(array('order_id'=>$order_id))->save();
 		if($rst)
 		{
 			$output['status'] = 200;
	    $output['msg'] = 'confirm success';
		  echo json_encode($output, JSON_UNESCAPED_SLASHES);
		  exit;
 		}
	}
	
	/*
	public function cancelOrderAtomic()
	{
		$header = getAllHeaders();
		$token = $header['x-access-token'];
    $userdata = D('User') -> checkTokenAndEchoInfo($token);
    $Order = D('Order');
    $orderinfo = $Order->field('order_id, order_status, add_time')->select();
    $curtime = time();
    foreach($oderinfo as $k => $v)
   	{
   		$timeprid  = $curtime - $v[add_time];
   		if($timeprid > 3000)
   		{
   			$OrderInfo = D('Order') ->find($v['add_time']);
   		  $Order->order_status = 2;
   		  $rst = $Order -> where(array('add_time'=>$OrderInfo['add_time']))->save();
   		}
   	}
   	$output['status'] = 200;
    $output['msg'] = 'cancel success';
	  echo json_encode($output, JSON_UNESCAPED_SLASHES);
	  exit;	
	}
	*/
	
	public function clientNotifyUrl()
	{
		$Order = D('Order');
		$order_numbers = I('post.order_numbers');
		if($order_numbers == null)
    {
    	$output['status'] = 400;
		  $output['msg'] = "client error, params is null";
		  echo json_encode($output, JSON_UNESCAPED_SLASHES);
			exit;
    }
    $order_numbers = explode(",", $order_numbers);
    $orderinfo = D('Order')->where(array('order_number'=>array('in', $order_numbers)))->select();
    if(!$orderinfo)
    {
    	$output['status'] = 200;
		  $output['msg'] = "server get data from database fail";
		  $output['data'] = $orderinfo;
		  echo json_encode($output, JSON_UNESCAPED_SLASHES);
			exit;
    }
    else
    {
    	$sum = count($orderinfo);
    	for($i = 0; $i < $sum; ++$i)
    	{
    		$order_number = $orderinfo[$i]['order_number'];
    		$Order->order_pay = 0;
    		$Order->order_status = 3;
    		$rstInfo = $Order -> where(array('order_number'=> $order_number))->save();
    	}
    	$output['status'] = 200;
		  $output['msg'] = 'pay success';
			echo json_encode($output, JSON_UNESCAPED_SLASHES);
			exit;
    }
	}
	
	public function notifyurl()
	{
		require_once('./Common/Plugin/alipay/aop/AopClient.php');
		$aop = new \AopClient;
    $aop->alipayrsaPublicKey = 'MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCtnjStPeDSZOv6O83qcHbgto/y11OfUkEOxRiwi0lZg4KmySqFHXH12sA1PupHVN7dCtaZzrBKIe/YhNkGkqpq0dzY0lFg52ASVtPgrkC0gJNDGM59KicuJkv1EirzKrkSzI9hvtJ4B/S0MLrkQDJPK8AWh/MwN1khF5JsdQHzWMtyT0FgB2DaiNbzVcYSrBeSAet+3c2pF2qee6dBFYJQ4r2rVSj+LFB5innGKNA8RHdiyssEzXZwazPeHF5L+J2/7qCfvksA7yQxIx++EOaKdH1gxW1CWwNSeFkWl46FwfGSZfv11V0jXCzmLyF+b0gmoTHJ+YnsTKdo7Ap5ba5RAgMBAAECggEAHk3B5gcp6a9B3RB5NZVhuoFDCOD6sJFb16chUxdMuzoQIOp16HwmOwJukBymKcMvjydoI7qG3LmlsoYll1ccNb7hrFqxZ5ebFjhfjRT9KERU794xlHk6E30Nvv3nzz/Cw/w+fpIfDGJfHOBwjoyB+32oboZWNTFD9lm17gZSS9YHK1jGACP4VamkOhko8FVcFTxRGdyAMF1vk3pKKBJjgu3VpYQ+QxeVgjwITz5xGoKTRC9+VFlH6wCN3cMStavCWXcpRTddons+qba3tNN0vLHM4jZ+fSICfQg0fosAbZ6ohmgI67NUWuL+RJVZ0rtQXCQ/vIQJHXYG+UfKwaM+AQKBgQDb5H5ydQiC7gFJaCjP7JAFHS5KvUIgQS5ddW9d+KA/lioRG4c/IN4G2D+CB9YzCc49XeArbkRjppkHUrp/pHx5qLWoJ70i0s+kM5QRI6545ImhPTRkyr9KNlT9yKhq6GIfSdzwMEISFpaQKDG3jDsLx/uhq/pL6stBusF1TNEC4QKBgQDKIH4hXcI63+K1GB0SOWTohq03kXqCfCCkwvSSdMegeGcnnoKcd+hKWaqEMQYLtWO5RlwZRPK+aThcsr/Uvu2gmwyZCKbhjbs2vjdR126uAidtsgbHWdrMFjychi9vsP/PTi9RpZEkuzDI3J0a/TY0Aw5NV37KrDxvnCfw68GJcQKBgASOcYhRoIGGCQTKYb4dOsbAWgs2bL5aW2mYW1xpIHjw1aJRHbZTKgaeSIKbQvb/xwRCg7iiqkweUaFzN2YZtHKY6lq3qBWmpKLUZscMJDthEPEEYaeNA/W3tn8jv0mn0xCu6SMY/OV/DlOiYZVaFIcj97Tb6W3VSazs/8E8fEBBAoGAXGeYYhaj+hhqY1H/0FoOyMLxI4tNj6PBpLE/8EiVDsacmh88JN4ogv0VGFP1KJsnWQdSiXbc5rHhw3cwfck/h4H6s2eiK1GJOhCh57ducPypG9wcfzyT62NrGD+8JfqsKBDdTx07CqjNN7ar2C/UfNi8zBzo6SzugDPKiritBPECgYEAlW1zmMU8phIfrN4gUrGNf7fbB1TXzPCgBT+cmz0F7U0cmAzCtzl1xlgIvMVGy1ikr313B2fjfhbMsgB7rzcHNWcUZKJwljwSA5Tfpe+eICx5RouRxiC1q0Q9YC0kx9ydikD2xUusemHvIf3firtywtK2hVGQDjZgcF2oDQSNTmI=';
    $flag = $aop->rsaCheckV1($_POST, NULL, "RSA2");
    if($flag)
    { 	
    	$order_id = 128;
	    $Order = D('Order');
	 		$Order->order_status = 6;
	 		$rst = $Order -> where(array('order_id'=>$order_id))->save();	
      echo 'success';
    } 
    else 
    {
    	$order_id = 128;
	    $Order = D('Order');
	 		$Order->order_status = 6;
	 		$rst = $Order -> where(array('order_id'=>$order_id))->save();	
      echo "fail";
    }
	}
	
	public function delOrder()
	{
		$order_ids = I('post.order_ids');
		$header = getAllHeaders();
		$token = $header['x-access-token'];
    $userdata = D('User') -> checkTokenAndEchoInfo($token);
    if($order_ids == null)
    {
    	$output['status'] = 400;
		  $output['msg'] = "client error";
		  echo json_encode($output, JSON_UNESCAPED_SLASHES);
			exit;
    }
    $order_ids = explode(",", $order_ids);
    $orderinfo = D('Order')
        ->where(array('order_id'=>array('in', $order_ids))) 
        ->delete();
    if(!$orderinfo)
    {
    	$output['status'] = 200;
		  $output['msg'] = "there is not this order in table";
		  echo json_encode($output, JSON_UNESCAPED_SLASHES);
			exit;
    }
    else
    {
    	$output['status'] = 200;
		  $output['msg'] = 'delete success';
			echo json_encode($output, JSON_UNESCAPED_SLASHES);
			exit;
    }
	}
	
	public function AliPaySign()
	{
		if(IS_POST)
    {
			require_once('./Common/Plugin/alipay/aop/AopClient.php');
			//$private_path = "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCtnjStPeDSZOv6O83qcHbgto/y11OfUkEOxRiwi0lZg4KmySqFHXH12sA1PupHVN7dCtaZzrBKIe/YhNkGkqpq0dzY0lFg52ASVtPgrkC0gJNDGM59KicuJkv1EirzKrkSzI9hvtJ4B/S0MLrkQDJPK8AWh/MwN1khF5JsdQHzWMtyT0FgB2DaiNbzVcYSrBeSAet+3c2pF2qee6dBFYJQ4r2rVSj+LFB5innGKNA8RHdiyssEzXZwazPeHF5L+J2/7qCfvksA7yQxIx++EOaKdH1gxW1CWwNSeFkWl46FwfGSZfv11V0jXCzmLyF+b0gmoTHJ+YnsTKdo7Ap5ba5RAgMBAAECggEAHk3B5gcp6a9B3RB5NZVhuoFDCOD6sJFb16chUxdMuzoQIOp16HwmOwJukBymKcMvjydoI7qG3LmlsoYll1ccNb7hrFqxZ5ebFjhfjRT9KERU794xlHk6E30Nvv3nzz/Cw/w+fpIfDGJfHOBwjoyB+32oboZWNTFD9lm17gZSS9YHK1jGACP4VamkOhko8FVcFTxRGdyAMF1vk3pKKBJjgu3VpYQ+QxeVgjwITz5xGoKTRC9+VFlH6wCN3cMStavCWXcpRTddons+qba3tNN0vLHM4jZ+fSICfQg0fosAbZ6ohmgI67NUWuL+RJVZ0rtQXCQ/vIQJHXYG+UfKwaM+AQKBgQDb5H5ydQiC7gFJaCjP7JAFHS5KvUIgQS5ddW9d+KA/lioRG4c/IN4G2D+CB9YzCc49XeArbkRjppkHUrp/pHx5qLWoJ70i0s+kM5QRI6545ImhPTRkyr9KNlT9yKhq6GIfSdzwMEISFpaQKDG3jDsLx/uhq/pL6stBusF1TNEC4QKBgQDKIH4hXcI63+K1GB0SOWTohq03kXqCfCCkwvSSdMegeGcnnoKcd+hKWaqEMQYLtWO5RlwZRPK+aThcsr/Uvu2gmwyZCKbhjbs2vjdR126uAidtsgbHWdrMFjychi9vsP/PTi9RpZEkuzDI3J0a/TY0Aw5NV37KrDxvnCfw68GJcQKBgASOcYhRoIGGCQTKYb4dOsbAWgs2bL5aW2mYW1xpIHjw1aJRHbZTKgaeSIKbQvb/xwRCg7iiqkweUaFzN2YZtHKY6lq3qBWmpKLUZscMJDthEPEEYaeNA/W3tn8jv0mn0xCu6SMY/OV/DlOiYZVaFIcj97Tb6W3VSazs/8E8fEBBAoGAXGeYYhaj+hhqY1H/0FoOyMLxI4tNj6PBpLE/8EiVDsacmh88JN4ogv0VGFP1KJsnWQdSiXbc5rHhw3cwfck/h4H6s2eiK1GJOhCh57ducPypG9wcfzyT62NrGD+8JfqsKBDdTx07CqjNN7ar2C/UfNi8zBzo6SzugDPKiritBPECgYEAlW1zmMU8phIfrN4gUrGNf7fbB1TXzPCgBT+cmz0F7U0cmAzCtzl1xlgIvMVGy1ikr313B2fjfhbMsgB7rzcHNWcUZKJwljwSA5Tfpe+eICx5RouRxiC1q0Q9YC0kx9ydikD2xUusemHvIf3firtywtK2hVGQDjZgcF2oDQSNTmI=";
			//$private_path = "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCSU3hIi6A53aFXry5ddckGYt2Y/uzL2XzYZOHI44W1+vS8wbzx1o9CpBIeC1TlKBgG5qQjxl0oWugos7ZJdlJahQWStZrxZAs5kglZ+mzZmpZTzxchXcHagA9lhd4eTW+xqWs7eGRFPfRYqeessQbEyb6ORwFt8XCVcs62/xUzODiynnijMvknlNbYxXCHS+EBx9B/mhdIzVRYTewbJ6Ef8EXtuPjEpmgtLPwXl7YTwkZinR3GpdTugZeHZR0lNtMRKzX3S+2S8dgNAWylTHGG6I3qx3/25VGs7NtsuLP8GaKPb/KfoHQi6lAM3XQ6GV63Ki5gD2RyJ7wtfZAH2pEbAgMBAAECggEAYbA6KGyXDqrJMUnx8VFWYN4WRTNEEZ/kOm+3US+cr+6X/4B0TRxKTlpNAiPcjJSk3c6THJMs1GlEfw/jjc3hky8lllmJ1MhOuiOl/J00mF4dKFyke5Elf2NpZAToUmCuRfTucyigAJ4pCBx+YAtbknuBrWj4Klc7K3sXSJKpq6RE5i+nXTF3w7zCSGc8r5DI5ipGVLjwozup7m3BVYCELVy8iySiB+6dGo2Cd8Np3JO9U5Q13MjGxnMGrE1e30zMzjMxidD9yW1UaQ0yYSpDs75aup0lkV3Z560W785M1s7YiFK+hlUlfW4ueE745HwJ3CNW+RsrfesBkhG2/LensQKBgQDR64Nj/Iy6h3es5hledtcHvZmfWlH9FKnmTedAlm4SDZ6dglmHExvfvsufRgq4JorQtFkb0+q9XMk5S7IE49Ttv28gLpPaBxbdzrIpzsWnHmTpJVrhfaH7hUriJgdEQIV6fJ1AjpPKIwmc34BLdQ3/ba1p+kY3meYo57YId5j7kwKBgQCyckk6+GIlD6Sk74JyIios17sKdWptoGju6LHzYRfMIjL8wz+VkZc8PPV+L3Rfexm8rlsrU6A+iSZL5mcuuCwAWF0qWDHhJ6HoVMekuTuGGPOeKmJubAsJT2h0XWTKQlpnp9jaC9UQErtOe+fPVAbA9QzOn2HsqJE+8PeT7hdZWQKBgQC1Z/xMnMQUsdrW/KXxv2tF0jB+yDPQLFpCnxH3+8e1LDXlUe8CTp4o9h3LT2EWEKCniSL0bGcQK63tKJ/3n9ezeVqUCgxVPwkgt225uWmPaTG1VUW7VbF0xZSX6FshPUzcM/JFBrFq3mqBOZgKHWbyVJqm2dRyWjnPIaZqnMgEpwKBgC4jcJ3HtRCiD875gn/iJ4d6rAjTPRZlQFxtW/1yoEWOniJOlXUltLXFiS/8Mxmw6YGojzgPokIpEfbT9t/UjMP2FPiq3xK5PZqluQz1O9e7QdomWVb1ppDcsEROFY5aQ6fDdUVDg+5o+XccgF5R+oEPmyUdfqNDHnLouQrNp8nZAoGANGGJRBd/MPlZJSUw1hM9nrirB3wnDybzyqrefNC0f0P+U4gwPhYK3/I+E4OcOAyFAnONweQzwrn9XM9P4lZW1guylxpmciMWIpD6gVrVN/D57zluojNNW2UaHnbGWivPIYzct+AevEIibbtLxMv6sg5+BDoY5k1JPWFWz1O8lw4=";//Ë½Ô¿Â·¾¶
			//$private_path ="MIIEpQIBAAKCAQEA2rhdYuBRwYir+Ch48UgSCr+l7Z0/7QbQbk987VN8E4IYwC8Dz0YSfEmKF0cnR6nP27//xzf+6lmdiY+AC8n62m9gU45gkbsf9Sh5opgrn+87MIfjEih7JdFYlMA5PedQR4Sr/kbw58kgjNCXtGKgDmhK69wKhZ64FIhug6owZq19aSMcpwTeWoVvPcLKb+iGXeXQA2R05mUjh1YwbIeU9qSDgEqTX4cHBbjbH7pabnKv+/vuii0EPvGxFAI91bMytoN9R8bi91WdnUxgzW5kxTBEUWF7narMD0sOvPLHFxnjrzNpVCe/gIt7H8ZJkt2gi627AYgljFPuYnDw7PKswwIDAQABAoIBAQCLwiUCKl5zcTaZ4pqtaqUEs0N+mu2fMqx64FXufFsbSBUysJgZmSf0vTT8/N1voGWOgJgbH3/HFa5hmQ1z+wNNEsAVhDPWyyB3kf5vVBcEImTK9Pm2v6E5IBUfL9kj4ivdFzyjxYboRQ+Ei0F05VRrAF9naPpcOXhcvnUHsvcsk97Q/uEMdX9k1JUqL6kxrhM3X2QjBeC8eh/4NcGdbfMpECJcf1XCmGltE8bpmJHZGGBcGrGs5bFmYsbBaoiXOfDqkIPyD0/swg5lOGEX4/oBrBgZyoVkF47W1Gyks4TwIuFu5eGaVOP9g+LCIicr+P0g1TV2H+PKdx4Tnkh3sSVBAoGBAO/gWjzJcSSwYbQz+jbqXcZ8CQizRUzELiRULp+DcRxtSb0Eqcj8ItbkHLGy/TdGu1xVabuQLjpMXmKUC/t1IbCuhsm2GXs2krjtZ2U3Ivh9PB8kpIt0o+jMBRgL0zKMmGt0y+J7I2ouKDgm8cv1zzpo8CQuEJfn6O/nI3LyyFJjAoGBAOlr+BxGBdik3TQOLH5DoOLHiqhafuC3v8zU5D/M2pU5tfZjQ1GvSPKeLR3eX3/n4A5LTTOSb7ig6K0AcKgTr7AJHYtSnmXKTERRwnQt6x3/ktAsF6TP4qlkt3g0QV6pc5n/nMZ3Q8klIHYugQONOOQLBQBGk0bi99mJEssO1hohAoGAXRP7L9cilg/y+Y+pqaFrXddHUh7t5wnAtcwMg0znmRY3JKcokppzklrVX4aKhuZlUUC7VFJv/aMghLPZqmsa9YnjN2X3oT3d1PAZzMaGRVGjAJqhVpOd/nkcCOadvuGbSyb47hrF9S+P36oM7Q2mqY2KkR9mxOryEhToRnQ6ku0CgYEAjP4cledt7JhYzPKqyXHMIm9pP5u5+77B6dXGMQtqFK0RTkxTA2ofY/1LPzls8fN7kObHMRmIxjrbkHQtmDib7Hb1E4zKBK4XN0Uzcb2ywSH46ilX9sNjI/KkJ8VYnvc3zpNpfS/ZEAyO+RPJ9f09mfFWCf6XQ0AheZKkeWbyyEECgYEAl3bdNKotHriu9xbJWQ3t3hLs8h1LYWCy5Xqj306daIYUVq2NRlIdi/IwY0ZYFovPieTJkgAMwtG8kP9UrVoCEqj4K03dfXmvTOj9Y9scBvSH6rxnIEVO7OlV8X2mqBbovS53s/1wmtQ83uUkFjhNev49yxoIe9rDeCAWWo51REo=";
	    $private_path = "./Common/Plugin/alipay/key/rsa_private_key.pem";
	    
	    $content = array();
	    $content['subject'] = "Ï´ÒÂ·Û";   
	    $content['out_trade_no'] = "000110001202002";  
	    $content['timeout_express'] = "2018-1-24 21:29:30"; 
	    $content['total_amount'] = "100.00";  
	    $content['product_code'] = "QUICK_MSECURITY_PAY";
	    $con = json_encode($content);
	
	    $Client = new \AopClient();
	    $param['app_id'] = '2017091608772582';   
	    $param['method'] = 'alipay.trade.app.pay';
	    $param['charset'] = 'utf-8';  
	    $param['sign_type'] = 'RSA';  
	    $param['timestamp'] = date("Y-m-d H:i:s");
	    $param['version'] = '1.0';  
	    $param['notify_url'] = 'http://zgxnjz.cn/index.php/Home/Order/notifyurl';  
	    $param['biz_content'] = $con;
	
	    $paramStr = $Client->getSignContent($param);
	    
	    $sign = $Client->alonersaSign($paramStr, $private_path, 'RSA', true);
	   
	    $str = $Client->getSignContentUrlencode($param); 
  	}
	}
}

