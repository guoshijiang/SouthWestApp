<?php
namespace Home\Controller;
use Tools\HomeController;

class HireController extends HomeController 
{
	//获取招聘条数的信息接口
	public function getHireList()
	{
		if(IS_POST)
    {
			 $result= D('Hire') ->order('upd_time')
			   ->field('hire_id, hire_name, hire_area, work_area, left(from_unixtime(upd_time),16) upd_time')
	       ->select();	
	     if(!$result) 
		   {
	        $output['status'] = 500;
	        $output['msg'] = "server error";
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
	
	//获取招聘信息详情接口
	public function getHireDetail($hire_id = null)
	{
		$hire= D('Hire')->where(array('hire_id'=>$hire_id))
				->field('hire_id, hire_name, hire_area, hire_degree, work_area, work_year, work_exp, office_salary, hire_person, hire_tel, hire_qq, hire_wechat, hire_email, add_time,left(from_unixtime(upd_time),16) upd_time')
				->select();
		$hireInfo = D('Hireinfo') ->where(array('hire_id'=>$hire_id))->field('work_need, work_duty')->select();
		$hire =$hire[0];
		
	  if(!$hire || !$hireInfo) 
	  {
      $output['status'] = 500;
      $output['msg'] = "server error";
	  }
	  else 
	  {
   	  $output = array
   	  (
    	  'status' => 200,
    	  'msg' =>"success",
    	  'data'=>array(
	    	  'hire' => $hire, 
	    	  'hireInfo'=>$hireInfo 
    	  )
      );  
	  }
    echo json_encode($output, JSON_UNESCAPED_SLASHES);
	}
}