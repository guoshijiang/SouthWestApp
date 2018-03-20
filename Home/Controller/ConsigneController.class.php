<?php
namespace Home\Controller;
use Tools\HomeController;
class ConsigneController extends HomeController 
{
	public function getAddressList()
	{
		$header = getAllHeaders();
		$token = $header['x-access-token'];
		$userdata = D('User') -> checkTokenAndEchoInfo($token);
		$AddrInfo = D('Consignee')->where(array('user_id'=>$userdata['user_id']))
					->field('cgn_id, user_id, cgn_bool, cgn_name, cgn_tel, cgn_addr, cgn_daddr')
					->select();
		if(!$AddrInfo) 
    {
      $output['status'] = 200;
      $output['msg'] = "server error";
      $output['data'] = $AddrInfo;
      echo json_encode($output, JSON_UNESCAPED_SLASHES);
	    exit;
    }
    else 
    {
  	  $output['status'] = 200;
      $output['msg'] = "success";
      $output['data'] = $AddrInfo;
      echo json_encode($output, JSON_UNESCAPED_SLASHES);
	    exit;
    }		
	}
	
	public function createAddress()
	{
		$shuju['cgn_name'] = I('post.cgn_name');
		$shuju['cgn_tel'] = I('post.cgn_tel');
		//$shuju['cgn_addr'] = I('post.cgn_addr');
		$shuju['cgn_daddr'] = I('post.cgn_daddr');
		$header = getAllHeaders();
		$token = $header['x-access-token'];
		$addressCon = D('Consignee');
		$userdata = D('User') -> checkTokenAndEchoInfo($token);
		$addressCon->cgn_bool= 0;
    $rst = $addressCon -> where(array('user_id'=> $userdata['user_id']))->save();
		$data['user_id'] =  $userdata['user_id'];
		$data['cgn_name'] = $shuju['cgn_name']; 
    $data['cgn_tel'] = $shuju['cgn_tel'];
    $data['cgn_bool'] = 1;
		//$data['cgn_addr'] = $shuju['cgn_addr'];
	  $data['cgn_daddr'] = $shuju['cgn_daddr'];
		$data['add_time'] = $data['upd_time'] = time();
		if($shuju['cgn_name'] == null || $shuju['cgn_tel']== null || $shuju['cgn_daddr'] == null)
		{
			$output['status'] = 400;
      $output['msg'] = "client error";
      echo json_encode($output, JSON_UNESCAPED_SLASHES);
      exit;
		}
		else if($newid = $addressCon ->add($data))
    {
       $addrinfo = D('Consignee')
          ->field('cgn_id, user_id, cgn_bool, cgn_name, cgn_tel, cgn_addr, cgn_daddr')
          ->find($newid);
       if(!$addrinfo)
		   {
		    	$output['status'] = 500;
		      $output['msg'] = "server error";
		      echo json_encode($output, JSON_UNESCAPED_SLASHES);
			    exit;
		   }
		   else
		   {
		    	$output['status'] = 200;
          $output['msg'] = "success";
          $output['data'] = $addrinfo;
          echo json_encode($output, JSON_UNESCAPED_SLASHES);
	        exit;
		   }
    }
	}
	
	public function updateAddress()
	{
		$cgn_id = I('post.cgn_id');
		$cgn_name = I('post.cgn_name');
		$cgn_tel = I('post.cgn_tel');
		//$cgn_addr = I('post.cgn_addr');
		$cgn_daddr = I('post.cgn_daddr');
    $header = getAllHeaders();
		$token = $header['x-access-token'];
    $userdata = D('User') -> checkTokenAndEchoInfo($token);
    $addressCon  = D('Consignee'); 
    if($cgn_id == null)
    {
    	$output['status'] = 400;
      $output['msg'] = "clinet error";
      echo json_encode($output, JSON_UNESCAPED_SLASHES);
	    exit;
    }   
    if($cgn_name != null)
    {
    	$addressCon->cgn_name= $cgn_name;
    }
    if($cgn_tel != null)
    {
    	$addressCon->cgn_tel = $cgn_tel;
    }
    /*
    if($cgn_addr != null)
    {
    	$addressCon->cgn_addr= $cgn_addr;
    } 
    */
    if($cgn_daddr != null)
    {
    	$addressCon->cgn_daddr= $cgn_daddr;
    }
 		$rst = $addressCon -> where(array('cgn_id'=>$cgn_id, 'user_id'=> $userdata['user_id']))->save();
 		if(!$rst)
 		{
 			 $output['status'] = 500;
       $output['msg'] = "server error";
       echo json_encode($output, JSON_UNESCAPED_SLASHES);
	     exit;
 		}
 		else
 		{
 			$shopinfo = D('Consignee')->where(array('user_id'=>$userdata['user_id'], 'cgn_id'=> $cgn_id))->select();
 			$output['status'] = 200;
      $output['msg'] = "success";
      $output['data'] = $shopinfo[0];
	    echo json_encode($output, JSON_UNESCAPED_SLASHES);
	  	exit;
 		}
	}
	
	public function delAddress()
	{
		$cgn_id = I('get.cgn_id');
    $header = getAllHeaders();
		$token = $header['x-access-token'];
    $userdata = D('User') -> checkTokenAndEchoInfo($token);
    if($cgn_id == null)
    {
    	$output['status'] = 400;
      $output['msg'] = "clinet error";
      echo json_encode($output, JSON_UNESCAPED_SLASHES);
	    exit;
    }
    else
    {
    	$info = D('Consignee')->where(array('cgn_id'=>$cgn_id))->delete();
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
	}
	
	public function setDefultAddress()
	{
		$cgn_id = I('get.cgn_id');
    $header = getAllHeaders();
		$token = $header['x-access-token'];
    $userdata = D('User') -> checkTokenAndEchoInfo($token);
    $addressCon  = D('Consignee'); 
    if($cgn_id == null)
    {
    	$output['status'] = 400;
      $output['msg'] = "clinet error";
      echo json_encode($output, JSON_UNESCAPED_SLASHES);
	    exit;
    }
    $addressCon->cgn_bool= 0;
    $rst = $addressCon -> where(array('user_id'=> $userdata['user_id']))->save();
    
 		$addressCon->cgn_bool= 1;
 		$rst = $addressCon -> where(array('cgn_id'=>$cgn_id, 'user_id'=> $userdata['user_id']))->save();
 		if(!$rst)
 		{
 			 $output['status'] = 500;
       $output['msg'] = "server error";
       echo json_encode($output, JSON_UNESCAPED_SLASHES);
	     exit;
 		}
 		else
 		{
 			$shopinfo = D('Consignee')->where(array('user_id'=>$userdata['user_id'], 'cgn_id'=> $cgn_id))->select();
 			$output['status'] = 200;
      $output['msg'] = "success";
      $output['data'] = $shopinfo[0];
	    echo json_encode($output, JSON_UNESCAPED_SLASHES);
	  	exit;
 		}
	}
}