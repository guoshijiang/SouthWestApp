<?php
namespace Home\Controller;
use Tools\HomeController;
class IndexController extends HomeController 
{
  public function homeservice()
  { 	
  	//获取保洁员相关的前3条记录
  	if(IS_POST)
    {
    	 $catInfo = D('Category')
	  			->field('cat_id, cat_name')->select();
	  			
	  	 $employee = D('Yuangong');
	  	 $cleanerThreeRecord = $employee->alias('y')
	  	 		->join('__CATEGORY__ c on c.cat_id = y.cat_id')
	  	 		->where(array('c.cat_id'=>10))
	  	 		->field('y.yuangong_id, y.yuangong_s_tx, y.yuangong_name, y.yuangong_jianjie, y.yg_star, y.yuangong_price')
	  	 		->order('y.upd_time')
	  	 		->limit(6)
	  	 		->select();
	  	 	
		  $bmThreeRecord = $employee->alias('y')
		 		->join('__CATEGORY__ c on c.cat_id = y.cat_id')
		 		->where(array('c.cat_id'=>11))
		 		->field('y.yuangong_id, y.yuangong_s_tx, y.yuangong_name, y.yuangong_jianjie, y.yg_star, y.yuangong_price')
		 		->order('y.upd_time')
		 		->limit(6)
		 		->select();
		  
		  $yysThreeRecord = $employee->alias('y')
		 		->join('__CATEGORY__ c on c.cat_id = y.cat_id')
		 		->where(array('c.cat_id'=>12))
		 		->field('y.yuangong_id, y.yuangong_s_tx, y.yuangong_name, y.yuangong_jianjie, y.yg_star, y.yuangong_price')
		 		->order('y.upd_time')
		 		->limit(6)
		 		->select();	 		
		 		
		 	$yuysThreeRecord = $employee->alias('y')
		 		->join('__CATEGORY__ c on c.cat_id = y.cat_id')
		 		->where(array('c.cat_id'=>13))
		 		->field('y.yuangong_id, y.yuangong_s_tx, y.yuangong_name, y.yuangong_jianjie, y.yg_star, y.yuangong_price')
		 		->order('y.upd_time')
		 		->limit(6)
		 		->select(); 		
		 		
		 	$crsThreeRecord = $employee->alias('y')
		 		->join('__CATEGORY__ c on c.cat_id = y.cat_id')
		 		->where(array('c.cat_id'=>14))
		 		->field('y.yuangong_id, y.yuangong_s_tx, y.yuangong_name, y.yuangong_jianjie, y.yg_star, y.yuangong_price')
		 		->order('y.upd_time')
		 		->limit(6)
		 		->select();	
		 		
		  $hgThreeRecord = $employee->alias('y')
		 		->join('__CATEGORY__ c on c.cat_id = y.cat_id')
		 		->where(array('c.cat_id'=>15))
		 		->field('y.yuangong_id, y.yuangong_s_tx, y.yuangong_name, y.yuangong_jianjie, y.yg_star, y.yuangong_price')
		 		->order('y.upd_time')
		 		->limit(6)
		 		->select();
		 		
		  $wqqxThreeRecord = $employee->alias('y')
		 		->join('__CATEGORY__ c on c.cat_id = y.cat_id')
		 		->where(array('c.cat_id'=>16))
		 		->field('y.yuangong_id, y.yuangong_s_tx, y.yuangong_name, y.yuangong_jianjie, y.yg_star, y.yuangong_price')
		 		->order('y.upd_time')
		 		->limit(6)
		 		->select();
		 		
		 $gdgThreeRecord = $employee->alias('y')
		 		->join('__CATEGORY__ c on c.cat_id = y.cat_id')
		 		->where(array('c.cat_id'=>17))
		 		->field('y.yuangong_id, y.yuangong_s_tx, y.yuangong_name, y.yuangong_jianjie, y.yg_star, y.yuangong_price')
		 		->order('y.upd_time')
		 		->limit(6)
		 		->select();
		 		
		  if(!$cleanerThreeRecord && !$bmThreeRecord && !$yysThreeRecord  && !$yuysThreeRecord
		   && !$crsThreeRecord && ! $hgThreeRecord  && !$wqqxThreeRecord && !$gdgThreeRecord) 
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
    			 	 cleaner      => $cleanerThreeRecord,      			 	 
      			 duenna       => $bmThreeRecord,		      			 
	       		 nutritionist => $yysThreeRecord,			       		 
	       		 nursery      => $yuysThreeRecord,			       		 
	       		 prolactor    => $crsThreeRecord,			       		 
	       		 careworker   => $hgThreeRecord,			  
	       		 ewclean      => $wqqxThreeRecord,			       		 
	       		 pipeulock    => $gdgThreeRecord
	         ), 
	  	 	);
	  	  echo json_encode($output, JSON_UNESCAPED_SLASHES);
	  	  exit;
		  }
		}
  }
  
  public function getEmployeeList()
  {  
  	$cat_id =   I('post.cat_id'); 
  	$employee = D('Yuangong');
	  $employeeAllRecord = $employee->alias('y')
	  	 ->join('__CATEGORY__ c on c.cat_id = y.cat_id')
	  	 ->where(array('c.cat_id'=>$cat_id))
	  	 ->field('y.yuangong_id, y.yuangong_s_tx, y.yuangong_name, y.yuangong_jianjie, y.yg_star, y.yuangong_price')
	  	 ->order('y.upd_time')
	  	 ->select();
	  if(!$employeeAllRecord) 
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
    	 'status'=> 200, 
    	 'msg'   => 'success', 
    	 'data'  =>  $employeeAllRecord
	 	  );
	    echo json_encode($output, JSON_UNESCAPED_SLASHES);
	    exit;
   }
	}
	
	function getAllHeaders()
	{
    //忽略获取的header数据
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
	
	//获取单挑详细信息
	public function getOneEmployeeDetail()
	{
		$yuangong_id = I('post.yuangong_id');
	
		$employee = D('Yuangong');
		$comment = D('Comment');
		$address = D('Address');

	  $ygDetailRecord = $employee
	 		->where(array('yuangong_id'=>$yuangong_id))
	 		->field('yuangong_b_tx, yuangong_s_tx,yuangong_name,service_num,yuangong_jianjie,yuangong_tuijian, yuangong_price')
	 		->select();
	 
	  if(!$ygDetailRecord && !$addrRecord && !$ygCommentRecord) 
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
    	  'status'=> 200, 
    	  'msg'   => 'success', 
    	  'data'  => array
    	  (
    	 		employeeinfo => $ygDetailRecord[0],
    	  )
	 	  );
	    echo json_encode($output, JSON_UNESCAPED_SLASHES);
	    exit;
    }	
	}
	
	function RecommetPerTenGoodsList()
	{
		if(IS_POST)
    {
	    $page_index = I('post.page_index');
	    $per = 10;
	    $is_rec='1';
	    $Goods = D('Goods');
	    $goodTenList = $Goods->where(array('is_rec'=> $is_rec))
		  	 ->field('goods_id, goods_s_logo, goods_name, goods_introduce, goods_price')
		  	 ->order('goods_id')
		  	 ->limit(($page_index- 1)* $per, $per)
		  	 ->select();
		  	    
	    if(!$goodTenList)
	    {
	    	 $output = array
		     (
		    	 'status' => 200, 
		    	 'msg' => 'success,database is null', 
		    	 'data' => array
		    	 ( 	
					 	 goodTenList => $goodTenList,      			 	 
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
					 	 goodTenList => $goodTenList,      			 	 
		       ), 
			 	);
			  echo json_encode($output, JSON_UNESCAPED_SLASHES);
			  exit;
	    }
	  }
  }
}

