<?php
namespace Home\Controller;
use Tools\HomeController;

class TrainingController extends HomeController 
{
	//获取培训条数的信息接口
	public function getTrainList()
	{
		if(IS_POST)
    {
			 $result= D('Training') ->order('upd_time')
			   ->field('train_id, train_cname, train_teacher, train_way, left(from_unixtime(add_time),16) add_time')
	       ->select();	
	     if(!$result) 
		   {
	        $output['status'] = 200;
	        $output['msg'] = "database is null";
	        $output['data'] = $result;
		   }
		   else 
		   {
		   	 $output = array
		   	 (
	      	 'status' => 200,
	      	 'msg' => "success",
	      	 'data' => $result  	 
         );  
		   }
	     echo json_encode($output, JSON_UNESCAPED_SLASHES);
	  }
	}
	
	//获取培训信息详情接口
	public function getTrainDetail($train_id = null)
	{
		$train= D('Training')->where(array('train_id'=>$train_id))->select();
		
		$tInfo = D('Tinfo') ->where(array('train_id'=>$train_id))->field('tinfo_item, tinfo_content')->select();
		$train =$train[0];
		
	  if(!$train && !$tInfo) 
	  {
      $output['status'] = 200;
      $output['msg'] = "database is null";
      $output['data'] = $tInfo;
	  }
	  else 
	  {
   	  $output = array
   	  (
    	  'status' => 200,
    	  'msg' =>"success",
    	  'data'=>array(
	    	'train' => $train, 
	    	'tInfo'=>$tInfo 
    	 )
      );  
	  }
    echo json_encode($output, JSON_UNESCAPED_SLASHES);
	}
}