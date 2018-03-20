<?php
namespace Home\Controller;
use Tools\HomeController;
class DynamicController extends HomeController 
{
	//获取动态分类接口
	public function getBynamicCat()
	{
		if(IS_POST)
    {
			$dymamicCat = D('Category')->where(array('cat_pid'=>58))
					->field('cat_id, cat_name')
					->select();
			if(!$dymamicCat) 
		   {
		      $output['status'] = 200;
		      $output['msg'] = "database is null";
		      $output['data'] = $dymamicCat;
		      echo json_encode($output, JSON_UNESCAPED_SLASHES);
			    exit;
		   }
		   else 
		   {
		  		$output = array
		      (
		    	  'status'=> 200, 
		    	  'msg'   => 'success', 
		    	  'data'  =>array
		    	  (		    	  
		    	 		dymamicCat => $dymamicCat,		    	 				    	 		
		    	  ) 
			 	  );
			    echo json_encode($output, JSON_UNESCAPED_SLASHES);
			    exit;
		   }	
		}
	}
	
	//获取动态列表全部接口
	public function getAllDynamicList()
	{
		if(IS_POST)
    {
	    $dynamicRecord = D('Dynamic') ->field('dyn_id, dyn_pho_headimg, dyn_title, dyn_content, left(from_unixtime(upd_time),16) upd_time')
		  	   ->order('upd_time')
		  	   ->select();
		   if(!$dynamicRecord)
	    {
	    	 $output['status'] = 200;
	       $output['msg'] = "database is null";
	       $output['data'] = $dynamicRecord;
	       echo json_encode($output, JSON_UNESCAPED_SLASHES);
		     exit;
	    }
	    else
	    {
	    	$output['status'] = 200;
	      $output['msg'] = "success";
		    $output['data'] = $dynamicRecord;
		    echo json_encode($output, JSON_UNESCAPED_SLASHES);
			  exit;
			}
		}
	}
	
	public function getDynamicByCatId()
	{
		$cat_id = I('get.cat_id');
		$DynamicByCatId = D('Dynamic')->where(array('cat_id'=> $cat_id))
				->field('dyn_id, dyn_pho_headimg, dyn_title, dyn_content, left(from_unixtime(upd_time),16) upd_time')
	  	  ->order('upd_time')
	  	  ->select();
	   if(!$DynamicByCatId)
    {
    	 $output['status'] = 200;
       $output['msg'] = "database is null";
       $output['data'] = $DynamicByCatId;
       echo json_encode($output, JSON_UNESCAPED_SLASHES);
	     exit;
    }
    else
    {
    	 $output['status'] = 200;
	     $output['msg'] = "success";
		   $output['data'] = $DynamicByCatId;
		   echo json_encode($output, JSON_UNESCAPED_SLASHES);
			 exit;
		}	
	}
	
	public function getPassageDetailContent()
	{
		$dyn_id = I('get.dyn_id');
		$DynamicContent = D('Dynamic')->where(array('dyn_id'=> $dyn_id))
			->field('dyn_title, left(from_unixtime(upd_time),16) upd_time, dyn_content, dyn_pho_headimg, dyn_pho_centerimg, dyn_pho_bottomimg')
			->select();
	   if(!$DynamicContent)
    {
    	 $output['status'] = 200;
       $output['msg'] = "database is null";
       $output['data'] = $DynamicContent;
       echo json_encode($output, JSON_UNESCAPED_SLASHES);
	     exit;
    }
    else
    {
    	 $output['status'] = 200;
	     $output['msg'] = "success";
		   $output['data'] = $DynamicContent[0];
		   echo json_encode($output, JSON_UNESCAPED_SLASHES);
			 exit;
		}	
	}
}