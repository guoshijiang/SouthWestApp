<?php
namespace Home\Controller;
use Tools\HomeController;
class GoodsController extends HomeController 
{
	public function getCat()
	{
		if(IS_POST)
    {
    	 $img   = D('Images');
	  	 $gzImg = $img -> where(array('img_id'=>33))
	  	 		->field('img_name, img_img')
	  	 		->select();
	  	 	 
	  	 $qjImg = $img -> where(array('img_id'=>34))
	  	 		->field('img_name, img_img')
	  	 		->select();
	  	 		
	  	 if(!$qjImg && !$gzImg) 
		   {
		      $output['status'] = 200;
		      $output['msg'] = "database is null";
		      $output['data'] = $qjImg;
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
		    	 		gzImg => $gzImg[0],
		    	 		qjImg => $qjImg[0]
		    	  ) 
			 	  );
			    echo json_encode($output, JSON_UNESCAPED_SLASHES);
			    exit;
		   }	 
    }
	}
	
	public function shopSixRecord()
  {
  	if(IS_POST)
    {
	  	 $goods = D('Goods');
	  	 $gzTechanSixRecord = $goods->alias('g')
	  	 		->join('__CATEGORY__ c on c.cat_id = g.cat_id')
	  	 		->where(array('c.cat_id'=>56))
	  	 		->field('c.cat_id, g.goods_id, g.goods_s_logo, g.goods_name, g.goods_introduce, g.goods_price')
	  	 		->order('g.upd_time')
	  	 		->limit(9)
	  	 		->select();
	  	
	  	 $qjGoodsSixRecord = $goods->alias('g')
	  	 		->join('__CATEGORY__ c on c.cat_id = g.cat_id')
	  	 		->where(array('c.cat_id'=>57))
	  	 		->field('c.cat_id, g.goods_id, g.goods_s_logo, g.goods_name, g.goods_introduce, g.goods_price')
	  	 		->order('g.upd_time')
	  	 		->limit(9)
	  	 		->select();
	  	 		
	  	 if(!$gzTechanSixRecord && !$qjGoodsSixRecord) 
		   {
		      $output['status'] = 200;
		      $output['msg'] = "database is null";
		      $output['data'] = $gzTechanSixRecord;
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
		    	 		gzGoods => $gzTechanSixRecord,		    	 		
		    	 		qjGoods => $qjGoodsSixRecord
		    	  ) 
			 	  );
			    echo json_encode($output, JSON_UNESCAPED_SLASHES);
			    exit;
		   }
    }
  }
  
  function getPerSixGoodsList()
	{
		if(IS_POST)
    {
	    $cat_id = I('post.cat_id');
	    $page_index = I('post.page_index');
	    $per = 10;
	    $Goods = D('Goods');
	    $goodSixList = $Goods ->where(array('cat_id'=>$cat_id))
		  	 ->field('goods_id, goods_s_logo, goods_name, goods_introduce, goods_price')
		  	 ->order('goods_id')
		  	 ->limit(($page_index - 1) * $per, $per)
		  	 ->select();
		  	    
	    if(!$goodSixList)
	    {
	    	 $output['status'] = 200;
	       $output['msg'] = "database is null";
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
					 	 goodSixList => $goodSixList,      			 	 
		       ), 
			 	);
			  echo json_encode($output, JSON_UNESCAPED_SLASHES);
			  exit;
	    }
    }
  }
  
  public function getGoodsAttrName()
  {
  	$goods_id = I('get.goods_id');
  	$Goodtype = D('Goodtype');
  	$goodsAttr = $Goodtype
  		->where(array('goods_id'=>$goods_id))
	    ->field('goodtype_id, goods_name')
	  	->select();
	  if(!$goodsAttr)
    {
    	 $output['status'] = 200;
       $output['msg'] = "database is null";
       $output['data'] = $goodsAttr;
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
				 	 goodsAttr => $goodsAttr,      			 	 
	       ), 
		 	);
		  echo json_encode($output, JSON_UNESCAPED_SLASHES);
		  exit;
    }
  }
  
  function getDetailGoodsInfo()
  {
  	$goods_id = I('get.goods_id');
   	$Goodtype = D('Goodtype');	
   	$goodsDetail = $Goodtype->alias('gt')
   				->join('__GOODS__ g on g.goods_id = gt.goods_id')
   				->where(array('gt.goods_id'=> $goods_id))
					->field('gt.goodtype_id, g.goods_xc1, g.goods_s_xc1, g.goods_xc2, g.goods_s_xc2, g.goods_xc3, g.goods_s_xc3, g.goods_price, g.goods_name, g.goods_introduce, g.goods_weight')
					->select();
	  if(!$goodsDetail)
    {
    	 $output['status'] = 200;
       $output['msg'] = "database is null";
       $output['data'] = $goodsDetail;
       echo json_encode($output, JSON_UNESCAPED_SLASHES);
	     exit;
    }
    else
    {
    	 $output = array
	    (
	    	 'status' => 200, 
	    	 'msg' => 'success', 
	    	 'data' => $goodsDetail[0]
		 	);
		  echo json_encode($output, JSON_UNESCAPED_SLASHES);
		  exit;
    }
  }
  
  public function findGoodsByAttrName()
  {
  	$goods_id = I('get.goods_id');
   	$goods_name = I('get.goods_name');
   	$Goodtype = D('Goodtype');
   	
   	$goodsDetail = $Goodtype ->alias('gt')
	  	 ->join('__GOODS__ g on g.goods_id = gt.goods_id')
  	   ->where(array('gt.goods_name'=> $goods_name))
	     ->field('gt.goodtype_id, gt.goods_s_xc1, gt.goods_s_xc2, gt.goods_s_xc3, gt.goods_price, gt.goods_name, g.goods_introduce, gt.goods_weight')
	  	 ->select();
	  	 
   	if(!$goodsDetail)
    {
    	 $output['status'] = 200;
       $output['msg'] = "database is null";
       $output['data'] = $goodsDetail;
       echo json_encode($output, JSON_UNESCAPED_SLASHES);
	     exit;
    }
    else
    {
    	$output = array
	    (
	    	 'status' => 200, 
	    	 'msg' => 'success', 
	    	 'data' => $goodsDetail[0]
		 	);
		  echo json_encode($output, JSON_UNESCAPED_SLASHES);
		  exit;
    }
  }
}