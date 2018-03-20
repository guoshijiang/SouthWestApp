<?php
namespace Admin\Controller;
use Tools\AdminController;
class OrderController extends AdminController 
{
	function showlist()
  {
    $daohang = array
    (
      'title1' => '订单管理',
      'title2' => '查看订单信息',
    );
    $info = D('Orderstatus')->order('status_id')->select();
    $this -> assign('info',$info);
    $this -> assign('daohang',$daohang);
    $this->display();  
  }
  
  
  public function find($order_status= null, $order_number=null)
  {
    if($order_status)
    {
	  	$info= D('Order')->where(array('order_status'=>$order_status))->field('order_id') ->order('order_id') 
	       ->select();
    }
    else
    {
      $info= D('Order') ->field('order_id')->order('order_id')
      	->select();
    }
    $sum = '';
    $count = count($info);
    for($i = 0; $i < $count; $i++)
    {
      $sum .= $info[$i]['order_id'].',';
    }
    $sum = rtrim($sum, ",");
    $sum = explode(',', $sum);
    $orderstatus_ids = $sum;
    
    if($order_number)
    { 
    	$info1= D('Order')->where(array('order_number'=>array('like',"%$order_number%")))
      	->field('order_id')
        ->order('order_id')
        ->select();
    }
    else
    {
      $info1= D('Order')->field('order_id')
      	->order('order_id desc')
      	->select();
    }
    $sum1 = '';
    $count = count($info1);
    for($i = 0; $i < $count; $i++)
    {
        $sum1 .= $info1[$i]['order_id'].',';
    }
    $sum1 = rtrim($sum1, ",");
    $sum1 = explode(',',$sum1);
    $orders_ids = $sum1;
    
    $order_ids = array_intersect($orders_ids, $orderstatus_ids);
    $order_ids = empty($order_ids)?'0':$order_ids;
    if(empty($order_ids))
    {
     	$ss = 0;
    }
    else
    {
     	$ss = count($order_ids);
    }
    if($order_ids=='0')
    {
      $info2= D('Order')->field('order_id') ->order('order_id desc') ->select();   
      $sum2 = '';
      $count = count($info2);
      for($i = 0; $i < $count; $i++)
      {
        $sum2 .= $info2[$i]['order_id'].',';
      }
      $sum2 = rtrim($sum2, ",");
      $sum2 = explode(',',$sum2);
      $order_ids = $sum2;
      $ordertotal =count($order_ids);
    }
    $ordertotal =  count($order_ids);
    $order_ids = implode(',',$order_ids);
    $arr = array
    (
      "ordertotal" =>  $ordertotal,
      "ss"         =>  $ss,
      "order_ids"  =>  $order_ids,
     );
   $arr = implode(',', $arr);
   echo json_encode($arr);
  }
  
	public function getOrderList($page_index=null,  $order_ids=null)
	{
	  $per = 5;
	  //$order_ids = explode(",", $order_ids);
	  $orderinfo = D('Order')
    		->field('order_id, order_number, order_pay, order_status, order_price, goods_name, goods_number, goods_log, goods_introduce, left(from_unixtime(add_time),16) add_time')
        ->where(array('order_id' =>array('in', $order_ids)))
        ->limit($page_index * $per, $per)
        ->select();
	  echo json_encode($orderinfo);
	}
}