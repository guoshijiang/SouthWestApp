<?php
namespace Home\Controller;
use Tools\HomeController;

class BigcustomerController extends HomeController 
{
	public function getCustomerList()
	{
		if(IS_POST)
    {
			 $customer = D('Bigcustomer') ->order('upd_time')
			   ->field('bct_simg')
	       ->select();	
	     if(!$customer) 
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
	      	 'data' => $customer  	 
         );  
		   }
	     echo json_encode($output, JSON_UNESCAPED_SLASHES);
	  }
	}
}