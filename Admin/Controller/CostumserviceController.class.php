<?php
namespace Admin\Controller;
use Tools\AdminController;
class CostumserviceController extends AdminController
{
	function showlist()
  {
    $daohang = array
    (
      'title1' => '客户服务信息管理',
      'title2' => '客服电话列表',
      'act' => '添加',
      'act_link' => U('addCosTel'),
    );
    $this -> assign('daohang',$daohang);  
    $info = D('Costumservice')->select();
    $this -> assign('info',$info);
    $this->display();  
  }	
  
  function addCosTel()
  {
    $daohang = array
    (
      'title1' => '客户服务信息管理',
      'title2' => '添加客服电话',
      'act' => '返回',
      'act_link' => U('showlist'),
    );
    $this -> assign('daohang',$daohang);
    $this->display(); 
    if(IS_POST)
    {
      $Costumservice = new \Model\CostumserviceModel();
      $shuju = $Costumservice -> create();
      $shuju['add_time'] = time();
      $shuju['upd_time'] = time();
      if($Costumservice->add($shuju))
      {
        $this -> success('添加成功',U('showlist'),1);
      }
      else
      {
        $this -> error('添加失败',U('addCosTel'),1);
      }
    }
  }
  
  public function delCosTel()
  {
    $cos_id = I('get.cos_id');
    $Costumservice = D('Costumservice')
       ->where(array('cos_id'=>$cos_id)) 
       ->delete();
       
    $this -> success('删除成功',U('showlist'),1);
  }
  
  function updCosTel()
  {
    $daohang = array
    (
      'title1' => '客户服务信息管理',
      'title2' => '修改客服电话',
    );
    $this -> assign('daohang',$daohang);
    $cos_id =I('get.cos_id');
    $info= D('Costumservice')
       ->where(array('cos_id' => $cos_id))
       ->select();
    $info =$info[0];    
    if(IS_POST)
    {
      $cosinfo = new \Model\CostumserviceModel();
      $shuju = $cosinfo -> create();
      $shuju['upd_time'] = time();
      if($cosinfo->save($shuju))
      {
        $this -> success('修改成功',U('showlist',array('cos_id'=>$info[cos_id])),1);
      }
      else
      {
        $this -> error('修改失败',U('updCosTel',array('cos_id'=>$cos_id)),1);
      }
    }
    else
    {
      $this -> assign('info', $info);
      $this->display(); 
    }
  }
}