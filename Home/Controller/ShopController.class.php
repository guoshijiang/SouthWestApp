<?php
namespace Home\Controller;
use Tools\HomeController;
class ShopController extends HomeController
{
	public function getAllHeaders()
	{
    $ignore = array('host','accept','content-length','content-type');
    $headers = array();
    foreach($_SERVER as $key=>$value)
    {
      if(substr($key, 0, 5)==='HTTP_')
      {
        $key = substr($key, 5);
        $key = str_replace('_', ' ', $key);
        $key = str_replace(' ', '-', $key);
        $key = strtolower($key);

        if(!in_array($key, $ignore))
        {
          $headers[$key] = $value;
        }
      }
    }
    return $headers;
	}
	
  function addShopCart()
  {
    $yuangong_id = I('get.yuangong_id');
    $goodtype_id = I('get.goodtype_id'); 
    $now_num = I('get.now_num');
    if($now_num > 20)
    {
    	$output['status'] = 200;
	    $output['msg'] = "success";
    	$output['data'] = "now_num can not more than 20";
		  echo json_encode($output, JSON_UNESCAPED_SLASHES);
		  exit;
    }
    $header = getAllHeaders();
		$token = $header['x-access-token'];
    $userdata = D('User') -> checkTokenAndEchoInfo($token);
    if($yuangong_id != null && $now_num != null && $goodtype_id == null)
  	{
  		$isboolinfo = D('Goodshop')->field('yuangong_id')->where(array('yuangong_id'=>$yuangong_id, 'user_id'=> $userdata['user_id']))->select();
  		if($isboolinfo == NULL)
  		{
  			$employeeinfo = D('Yuangong')->find($yuangong_id);	
		  	$data['user_id'] 	 = $userdata['user_id'];
		  	$data['yuangong_id'] = $yuangong_id; 	
		  	$data['is_goods'] = 1;
		  	$data['goods_name'] = $employeeinfo['yuangong_name'];
		  	$data['goods_introduce'] = $employeeinfo['yuangong_jianjie'];
		  	$data['goods_log'] = $employeeinfo['yuangong_s_tx'];
		  	$data['goods_price'] = $employeeinfo['yuangong_price'];
		  	$data['goods_buy_number'] = $now_num;
		  	$data['goods_total_price'] = $employeeinfo['yuangong_price'] * $now_num;
		  	$data['add_time'] = $data['upd_time'] = time();
		  	if($shopid = D('Goodshop')->add($data))
		    {
		      $shopinfo = D('Goodshop')->find($shopid);
		      if(!$shopinfo)
				  {
				    $output['status'] = 200;
				    $output['msg'] = "add goods fail";
				    $output['data'] = $shopinfo;
				    echo json_encode($output, JSON_UNESCAPED_SLASHES);
					  exit;
				  }
				  else
				  {
				  	$output['status'] = 200;
				    $output['msg'] = "success";
			    	$output['data'] = $shopinfo;
					  echo json_encode($output, JSON_UNESCAPED_SLASHES);
					  exit;
				  }
		    }
  		}
  		else
  		{
  			$output['status'] = 200;
		    $output['msg'] = "goods cart already have this goods";
		    echo json_encode($output, JSON_UNESCAPED_SLASHES);
			  exit;
  		}
  	}
  	else if($goodtype_id != null && $now_num != null && $yuangong_id == null)
  	{
  		$isboolinfo = D('Goodshop')->field('goodtype_id')->where(array('goodtype_id'=>$goodtype_id, 'user_id'=> $userdata['user_id']))->select();
  		if($isboolinfo == NULL)
  		{
  			$goodsinfo  = D('Goodtype')->find($goodtype_id);
	  		$goodsinfo2 = D('Goods')->find($goodsinfo['goods_id']);
	      $data['goodtype_id'] = $goodtype_id; 
	      $data['user_id'] 	 = $userdata['user_id']; 	
		  	$data['is_goods'] = 0;	
		  	$data['goods_name'] = $goodsinfo['goods_name'];
		  	$data['goods_introduce'] = $goodsinfo2['goods_introduce'];
		  	$data['goods_log'] = $goodsinfo['goods_s_xc1'];
		  	$data['goods_price'] = $goodsinfo['goods_price'];
		  	$data['goods_buy_number'] = $now_num;
		  	$data['goods_total_price'] = $goodsinfo['goods_price'] * $now_num;
		  	$data['add_time'] = $data['upd_time'] = time();
	      if($shopid = D('Goodshop')->add($data))
		    {
		      $shopinfo = D('Goodshop')->find($shopid);
		      if(!$shopinfo)
				  {
				    $output['status'] = 200;
				    $output['msg'] = "database is null";
				    $output['data'] = $shopinfo;
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
								 	 goods_num => $now_num,      			 	 
					     ), 
					  );
					 echo json_encode($output, JSON_UNESCAPED_SLASHES);
					 exit;
				  }
		    }
  		}
  		else
  		{
  			$goodShop = D('Goodshop');
  			$goodshopInfo = $goodShop->field('goods_buy_number')->where(array('goodtype_id'=>$goodtype_id, 'user_id'=>$userdata[user_id]))->select();
  			if($goodshopInfo[0]['goods_buy_number'] + $now_num > 20 || $goodshopInfo[0]['goods_buy_number'] > 20)
  			{
  				$output['status'] = 200;
			    $output['msg'] = "success";
		    	$output['data'] = "goods_by_number can not more than 20";
				  echo json_encode($output, JSON_UNESCAPED_SLASHES);
				  exit;	
  			}
  			$goodsinfo  = D('Goodtype')->find($goodtype_id);
	   		$goodShop -> goods_buy_number = $goodshopInfo[0]['goods_buy_number'] + $now_num;
	   		$goodShop -> goods_total_price = ($goodshopInfo[0]['goods_buy_number'] + $now_num) * $goodsinfo['goods_price'];
	   		$goodShop -> $goodsinfo['goods_price'];
	   		$rst = $goodShop -> where(array('goodtype_id'=>$goodtype_id,'user_id'=> $userdata['user_id']))->save();
	   		if(!$rst)
	   		{
	   			 $output['status'] = 200;
		       $output['msg'] = "database is null";
		       $output['data'] = $rst;
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
							 	 goods_num => $now_num,      			 	 
				     ), 
					 );
					 echo json_encode($output, JSON_UNESCAPED_SLASHES);
					 exit;
	   		}
  		}
  	}
  	else
  	{
  		$array['status'] = 400;
      $array['msg'] = "error";  
      echo json_encode($array,JSON_UNESCAPED_SLASHES);
      exit;
  	}
  }
  
  function delGdOrEmCart()
  {
  	$shop_ids = I('post.shop_ids');
		$header = getAllHeaders();
		$token = $header['x-access-token'];
    $userdata = D('User') -> checkTokenAndEchoInfo($token);
    if($shop_ids == null)
    {
    	$output['status'] = 400;
		  $output['msg'] = "client error";
		  echo json_encode($output, JSON_UNESCAPED_SLASHES);
			exit;
    }
    $shop_ids = explode(",", $shop_ids);
    $shopinfo = D('Goodshop')
        ->where(array('shop_id'=>array('in', $shop_ids), 'user_id'=>$userdata['user_id']))->delete();
    if(!$shopinfo)
    {
    	$output['status'] = 200;
		  $output['msg'] = "server error";
		  $output['data'] = $shopinfo;
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
  
  function getCartInfo()
  {
    $header = getAllHeaders();
		$token = $header['x-access-token'];
    $userdata = D('User') -> checkTokenAndEchoInfo($token);
    $shopinfo = D('Goodshop') -> where(array('user_id'=>$userdata['user_id']))->select();
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
	    $output['status'] = 200;
	    $output['msg'] = 'success'; 
	    $output['data'] = $shopinfo;
		  echo json_encode($output, JSON_UNESCAPED_SLASHES);
		  exit;
	  }
  }
  
  function gdorepChangeNumber()
  {
  	$now_num = I('get.now_num');
  	$yuangong_id = I('get.yuangong_id');
    $goodtype_id = I('get.goodtype_id'); 
    $header = getAllHeaders();
		$token = $header['x-access-token'];
    $userdata = D('User') -> checkTokenAndEchoInfo($token);
    $goodShop  = D('Goodshop'); 
   	if($now_num != null && $yuangong_id != null && $goodtype_id == null)
   	{
			$employeeinfo = D('Yuangong')->find($yuangong_id);
   		$goodShop->goods_buy_number= $now_num;
   		$goodShop->goods_total_price =  $now_num * (int)$employeeinfo['yuangong_price'];
   		$rst = $goodShop -> where(array('yuangong_id'=>$yuangong_id, 'user_id'=> $userdata['user_id']))->save();
   		if(!$rst)
   		{
   			 $output['status'] = 500;
	       $output['msg'] = "server error";
	       echo json_encode($output, JSON_UNESCAPED_SLASHES);
		     exit;
   		}
   		else
   		{
   			$shopinfo = D('Goodshop')->where(array('user_id'=>$userdata['user_id'], 'yuangong_id'=> $yuangong_id))->select();
   			$output['status'] = 200;
	      $output['msg'] = "success";
	      $output['data'] = $shopinfo[0];
		    echo json_encode($output, JSON_UNESCAPED_SLASHES);
		  	exit;
   		}
   	}
   	else if($now_num != null && $yuangong_id == null && $goodtype_id != null)
   	{
   		$goodsinfo = D('Goodtype')->find($goodtype_id);
   		$ginfo = D('Goodshop')->field('goods_buy_number')
   			->where(array('user_id'=>$userdata['user_id'], 'goodtype_id'=> $goodtype_id))
   			->select();
   		if($ginfo[0]['goods_buy_number'] + $now_num > 20)
   		{
   			$output['status'] = 200;
		    $output['msg'] = "success";
	    	$output['data'] = "goods_buy_number can not more than 20";
			  echo json_encode($output, JSON_UNESCAPED_SLASHES);
			  exit;
   		}
   		$goodShop -> goods_buy_number = $now_num;
   		$goodShop->goods_total_price =  $now_num * $goodsinfo['goods_price'];
   		$rst = $goodShop -> where(array('goodtype_id'=>$goodtype_id,'user_id'=> $userdata['user_id']))->save();
   		if(!$rst)
   		{
   			 $output['status'] = 500;
	       $output['msg'] = "server error";
	       echo json_encode($output, JSON_UNESCAPED_SLASHES);
		     exit;
   		}
   		else
   		{
   			$shopinfo = D('Goodshop')->where(array('user_id'=>$userdata['user_id'], 'goodtype_id'=>$goodtype_id))->select();
   			$output['status'] = 200;
	      $output['msg'] = "success";
	      $output['data'] = $shopinfo[0];
		    echo json_encode($output, JSON_UNESCAPED_SLASHES);
		  	exit;
   		}
   	} 
   	else
   	{
   		$array['status'] = 400;
      $array['msg'] = "error";  
      echo json_encode($array,JSON_UNESCAPED_SLASHES);
      exit;
   	} 
  }
  
  /*
  function delGdOrEmCart()
  {
  	$yuangong_id = I('get.yuangong_id');
    $goodtype_id = I('get.goodtype_id');
    $header = getAllHeaders();
		$token = $header['x-access-token'];
    $userdata = D('User') -> checkTokenAndEchoInfo($token);
    if($goodtype_id != null && $yuangong_id == null)
    {
    	$info = D('Goodshop')->where(array('goodtype_id'=>$goodtype_id, 'user_id'=> $userdata['user_id']))->delete();
      if(!$info)
	  	{
				$output['status'] = 500;
        $output['msg'] = "server error";
        echo json_encode($output, JSON_UNESCAPED_SLASHES);
	      exit;
	  	}
	  	else
	  	{
		    $output['status'] = 200;
        $output['msg'] = "delete success";
			  echo json_encode($output, JSON_UNESCAPED_SLASHES);
			  exit;
	  	}
    }
    else if($goodtype_id == null && $yuangong_id != null)
    {
    	 $info = D('Goodshop')->where(array('yuangong_id'=>$yuangong_id, 'user_id'=> $userdata['user_id']))->delete();
       if(!$info)
	  	 {
				 $output['status'] = 500;
         $output['msg'] = "server error";
         echo json_encode($output, JSON_UNESCAPED_SLASHES);
	       exit;
	  	 }
	  	 else
	  	 {
	  		 $output['status'] = 200;
         $output['msg'] = "delete success";
			   echo json_encode($output, JSON_UNESCAPED_SLASHES);
			   exit;
	  	 }
    }
    else
  	{
  		$array['status'] = 400;
      $array['msg'] = "error";  
      echo json_encode($array,JSON_UNESCAPED_SLASHES);
      exit;
  	} 
  }
  */
}
