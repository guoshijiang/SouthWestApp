<?php
namespace Home\Controller;
use Tools\HomeController;
class BackinfoController extends HomeController
{
	public function setCustomerBack()
	{
		$binfo_title = I('post.binfo_title');
    $binfo_content = I('post.binfo_content'); 
    if($binfo_title == null || $binfo_content == null)
    {
    	$output['status'] = 400;
	    $output['msg'] = "client params is null";
		  echo json_encode($output, JSON_UNESCAPED_SLASHES);
		  exit;
    }
    $header = getAllHeaders();
		$token = $header['x-access-token'];
    $userdata = D('User') -> checkTokenAndEchoInfo($token); 
    $userinfo = D('User')->field('username')->where(array('user_id'=> $userdata['user_id']))->select();    
    $user_id = $userdata['user_id'];
    if($userinfo == null)
    {
    	$output['status'] = 200;
	    $output['msg'] = "success, but don`t have this user";
	    $output['data'] = $userinfo;
		  echo json_encode($output, JSON_UNESCAPED_SLASHES);
		  exit;
    }
    $uinfo = D('User')->find($user_id );	
    $data['binfo_title'] = $binfo_title; 	
    $data['binfo_content'] = $binfo_content; 	
    $data['binfo_status'] = 0;
    $data['user_id'] 	 = $userdata['user_id'];
		$data['username'] = $uinfo['username'];
	  $data['add_time'] = time();
		if($binfo_id = D('Backinfo')->add($data))
    {
      $backinfo = D('Backinfo')->find($binfo_id);
      if(!$backinfo)
		  {
		    $output['status'] = 200;
		    $output['msg'] = "add back info fail";
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
	
	public function getSelfBinfo()
	{
		if(IS_POST)
		{
			$header = getAllHeaders();
			$token = $header['x-access-token'];
      $userdata = D('User') -> checkTokenAndEchoInfo($token);
      
      $backInfo = D('Backinfo')
      	->field('binfo_id, binfo_title, binfo_content, binfo_status, user_id, username, left(from_unixtime(add_time),16) add_time, left(from_unixtime(hd_time),16) hd_time')
      	->where(array('user_id'=> $userdata['user_id']))->select();
      if($backInfo != null)
      {
      	$output['status'] = 200;
		    $output['msg'] = "success";
	    	$output['data'] = $backInfo;
			  echo json_encode($output, JSON_UNESCAPED_SLASHES);
			  exit;
      }
      else
      {
      	$output['status'] = 200;
		    $output['msg'] = "get self back info fail";
	    	$output['data'] = $backInfo;
			  echo json_encode($output, JSON_UNESCAPED_SLASHES);
			  exit;
      }
		}
	}
}