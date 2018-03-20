<?php
namespace Home\Controller;
use Tools\HomeController;
class CostumserviceController extends HomeController
{
	public function getCosterTelPhone()
  {
  	if(IS_POST)
    {
	  	$cosSerinfo = D('Costumservice')->field('cos_phone')
	        ->order('upd_time desc')->limit(3)->select();
	        
	    if($cosSerinfo == null)
	    {
	    	$array['status'] = 200;
	      $array['msg'] = "database is null";
	      $array['data'] = $cosSerinfo;
	      echo json_encode($array, JSON_UNESCAPED_SLASHES);
	      exit;	
	    }
	    else
	    {
	    	$array['status'] = 200;
	      $array['msg'] = "success";
	      $array['data'] = $cosSerinfo;
	      echo json_encode($array, JSON_UNESCAPED_SLASHES);
	      exit;
	    } 
    }
  }
}