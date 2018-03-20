<?php
namespace Home\Controller;
use Tools\HomeController;
class CommentController extends HomeController 
{
	function getAllHeaders()
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
	
	public function addCmt()
	{
		if(IS_POST)
		{
	    $cmt_star = I('post.cmt_star');
	    $cmt_msg =  I('post.cmt_msg');
	    $order_id = I('post.order_id');
	    $yuangong_id = I('post.yuangong_id');
	    $goods_id = I('post.goodtype_id');
	    $header = getAllHeaders();
			$token = $header['x-access-token'];
	    $userdata = D('User') -> checkTokenAndEchoInfo($token);
	    $Order = D('Order');
	    if($yuangong_id != null && $goods_id == null)
	    {
	    	$ordercmtinfo = D('Order') -> field('is_cmt')
	    		->where(array('order_id'=>$order_id, 'user_id'=>$userdata['user_id']))
	    		->select();
		    $ordercmtinfo = $ordercmtinfo[0];
		  	if($ordercmtinfo['is_cmt'] == 1)
		  	{
		  		$output['status'] = 200;
		      $output['msg'] = "already commotted";
		      $output['data'] = $ordercmtinfo['is_cmt'];
		      echo json_encode($output, JSON_UNESCAPED_SLASHES);
			    exit;
		  	}
	    	$data['cmt_star'] = $cmt_star;
	    	$data['cmt_msg']  = $cmt_msg;
	    	$data['yuangong_id'] = $yuangong_id;
	    	$data['user_id'] = $userdata['user_id'];
	      $data['add_time'] = $data['upd_time'] = time();
	      if($newid = D('Comment')->add($data))
	    	{
	       	$cmtinfo = D('Comment')
	          	->alias('c')
	          	->join('__USER__ u on c.user_id=u.user_id')
	          	->field('u.username,c.cmt_id,c.cmt_msg,c.cmt_star,left(from_unixtime(c.add_time),16) cmttime')
	         		->find($newid);
	       	if(!$cmtinfo)
			   	{
			    	$output['status'] = 200;
			     	$output['msg'] = "add commet fail";
			     	$output['data'] = $cmtinfo;
			      echo json_encode($output, JSON_UNESCAPED_SLASHES);
				    exit;
			   	}
			    else
			    {
			    	$Order->is_cmt = 1;
			    	$rst = $Order -> where(array('order_id'=>$order_id, 'user_id'=> $userdata['user_id']))->save();
			    	$output['status'] = 200;
		     	  $output['msg'] = "success add comment";
			    	$output['data'] = $cmtinfo;
					  echo json_encode($output, JSON_UNESCAPED_SLASHES);
					  exit;
			    }
	      }
	    }
	    else if($yuangong_id == null && $goods_id != null)
	    {
	    	$ordercmtinfo = D('Order') -> field('is_cmt')
	    		->where(array('order_id'=>$order_id, 'user_id'=>$userdata['user_id']))
	    		->select();
		    $ordercmtinfo = $ordercmtinfo[0];
		  	if($ordercmtinfo['is_cmt'] == 1)
		  	{
		  		$output['status'] = 200;
		      $output['msg'] = "already commotted";
		      $output['data'] = $ordercmtinfo['is_cmt'];
		      echo json_encode($output, JSON_UNESCAPED_SLASHES);
			    exit;
		  	}
	    	$data['cmt_star'] = $cmt_star;
	    	$data['cmt_msg']  = $cmt_msg;
	    	$data['goods_id'] = $goods_id;
	    	$data['user_id'] = $userdata['user_id'];
	      $data['add_time'] = $data['upd_time'] = time();
	      if($newid = D('Comment')->add($data))
	    	{
	       	$cmtinfo = D('Comment')
	          	->alias('c')
	          	->join('__USER__ u on c.user_id=u.user_id')
	          	->field('u.username,c.cmt_id,c.cmt_msg,c.cmt_star,left(from_unixtime(c.add_time),16) cmttime')
	         		->find($newid);
	       	if(!$cmtinfo)
			   	{
			    	$output['status'] = 200;
			     	$output['msg'] = "add commet fail";
			     	$output['data'] = $cmtinfo;
			      echo json_encode($output, JSON_UNESCAPED_SLASHES);
				    exit;
			   	}
			    else
			    {
			    	$Order->is_cmt = 1;
			    	$rst = $Order -> where(array('order_id'=>$order_id, 'user_id'=> $userdata['user_id']))->save();
			    	$output['status'] = 200;
		     	  $output['msg'] = "success add comment";
			    	$output['data'] = $cmtinfo;
					  echo json_encode($output, JSON_UNESCAPED_SLASHES);
					  exit;
			    }
	      }
	    }
	    else
	    {
	    	$array['status'] = 400;
	      $array['msg'] = "client error";  
	      echo json_encode($array,JSON_UNESCAPED_SLASHES);
	      exit;
	    } 
    }   
  }
	
	public function getCmtList()
	{
		if(IS_POST)
		{
	    $yuangong_id = I('post.yuangong_id');
	    $goods_id    = I('post.goodtype_id');
	    $page_index  = I('post.page_index');
	    $header = getAllHeaders();
			$token = $header['x-access-token'];
	    $userdata = D('User') -> checkTokenAndEchoInfo($token);
	    $per = 5;
	    if($yuangong_id != null && $page_index != null && $goods_id == null)
	    {
	    	$info = D('Comment')
	        ->alias('c')
	        ->join('__USER__ u on c.user_id=u.user_id')
	        ->field('u.username,u.user_pho, c.cmt_id,c.cmt_msg,c.cmt_star,left(from_unixtime(c.add_time),16) cmttime')
	        ->where(array('yuangong_id'=>$yuangong_id))
	        ->order('c.cmt_id desc')
	        ->limit(($page_index-1) * $per, $per)
	        ->select();
	        
	      $infoCount = D('Comment')->field('cmt_id')->where(array('yuangong_id'=>$yuangong_id))->select();
	      $all_count = count($infoCount);
	        
		    $cmt_ids = arrayToString($info,'cmt_id');
		    $backinfo = D('Back')
		        ->alias('b')
		        ->join('__USER__ u on b.user_id=u.user_id')
		        ->field('u.username, u.user_pho, b.back_msg,b.back_id,left(from_unixtime(b.add_time),16) backtime,b.cmt_id')
		        ->where(array('b.cmt_id'=>array('in',$cmt_ids),'b.is_show'=>'0'))
		        ->select();
		    foreach($info as $k => $v)
		    {
		      foreach($backinfo as $kk => $vv)
		      {
		        if($vv['cmt_id']===$v['cmt_id'])
		        {
		            $info[$k]['backinfo'][] = $vv;
		        }
		      }
		    }
		    if(!$info)
		    {
		    	 $output = array
			     (
			    	  'status' => 200, 
			    	  'msg' => 'success', 
			    	  'data' => array
			    	  ( 	
			    	  	all_count => $all_count,
						 	  comment => $info,      			 	 
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
			    	 	 all_count => $all_count,
						 	 comment => $info,      			 	 
			       ), 
				 	);
				  echo json_encode($output, JSON_UNESCAPED_SLASHES);
				  exit;
		    }
	    }
	    else if($yuangong_id == null && $page_index != null && $goods_id != null)
	    {
	    	$info = D('Comment')
	        ->alias('c')
	        ->join('__USER__ u on c.user_id=u.user_id')
	        ->field('u.username, u.user_pho, c.cmt_id,c.cmt_msg,c.cmt_star,left(from_unixtime(c.add_time),16) cmttime')
	        ->where(array('goods_id' => $goods_id))
	        ->order('c.cmt_id desc')
	        ->limit(($page_index-1)*$per,$per)
	        ->select();
	      
	      $infoCount = D('Comment')->field(cmt_id)->where(array('goods_id' => $goods_id))->select();
	      $all_count = count($infoCount);
	      
		    $cmt_ids = arrayToString($info,'cmt_id');
		    $backinfo = D('Back')
		        ->alias('b')
		        ->join('__USER__ u on b.user_id=u.user_id')
		        ->field('u.username,u.user_pho, b.back_msg,b.back_id,left(from_unixtime(b.add_time),16) backtime,b.cmt_id')
		        ->where(array('b.cmt_id'=>array('in',$cmt_ids),'b.is_show'=>'0'))
		        ->select();
		
		    foreach($info as $k => $v)
		    {
		      foreach($backinfo as $kk => $vv)
		      {
		        if($vv['cmt_id']===$v['cmt_id'])
		        {
		          $info[$k]['backinfo'][] = $vv;
		        }
		      }
		    }
		    if(!$info)
		    {
		    	 $output = array
			     (
			    	  'status' => 200, 
			    	  'msg' => 'success', 
			    	  'data' => array
			    	  ( 	
			    	  	all_count => $all_count,
						 	  comment => $info,      			 	 
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
			    	 	 all_count => $all_count,
						 	 comment => $info,      			 	 
			       ), 
				 	);
				  echo json_encode($output, JSON_UNESCAPED_SLASHES);
				  exit;
		    }
	    }
	    else
	    {
	    	$array['status'] = 400;
	      $array['msg'] = "client error";  
	      echo json_encode($array,JSON_UNESCAPED_SLASHES);
	      exit;
	    }
    }
  }
  
  function sendBack()
  {
    $data['back_msg'] = I('post.back_msg');
    $data['cmt_id']   = I('post.cmt_id');
    $header = getAllHeaders();
		$token = $header['x-access-token'];
    $userdata = D('User') -> checkTokenAndEchoInfo($token);
    $data['user_id']  = $userdata['user_id'];
    $data['add_time'] = $data['upd_time'] = time();
    if($newid = D('Back')->add($data))
    {
       $backinfo = D('Back')
          ->alias('b')
          ->join('__USER__ u on b.user_id=u.user_id')
          ->field('u.username, u.user_pho, b.back_id,b.back_msg,left(from_unixtime(b.add_time),16) backtime')
          ->find($newid);
       if(!$backinfo)
		   {
		    	 $output['status'] = 200;
		       $output['msg'] = "have not this data in table";
		       $output['data'] = $backinfo;
		       echo json_encode($output, JSON_UNESCAPED_SLASHES);
			     exit;
		   }
		   else
		   {
		   		 $output['status'] = 200;
		       $output['msg'] = "success";
		       $output['data'] = $backinfo;
		       echo json_encode($output, JSON_UNESCAPED_SLASHES);
			     exit;
		   }
    }
  }
  
  public function delCmt()
  {
  	$cmt_id = I('post.cmt_id');
  	$header = getAllHeaders();
		$token = $header['x-access-token'];
    $User = D('User');
    $Comment = D('Comment');
    
    $userResult = $User -> checkTokenAndEchoInfo($token);
    $commentResult = $Comment -> getBycmt_id($cmt_id);
    if($userResult['user_id'] != $commentResult['user_id']) 
    {
       $array['status'] = 200;
       $array['msg'] = "success";
       $array['data'] = $commentResult;
    } 
    else 
    {
       $info = D('Comment')->where(array('cmt_id'=>$cmt_id))->delete();
       $infoback = D('Back')->where(array('cmt_id'=>$cmt_id))->delete();
       $array['status'] = 200;
       $array['msg'] = "delete commet success!";
    }
    echo json_encode($array, JSON_UNESCAPED_SLASHES);
    exit;
  }
}
