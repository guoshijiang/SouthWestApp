<?php
namespace Admin\Controller;
use Tools\AdminController;

class HireController extends AdminController 
{
	function showlist($hire_id = null)
  {   
  	$degree = array('小学', '中学', '中职', '高职', '大专', '本科', '硕士研究生', '博士研究生');
    $daohang = array
    (
      'title1' => '招聘管理',
      'title2' => '招聘列表',
      'act' => '添加',
      'act_link' => U('addhire'),
    );
    $this -> assign('daohang',$daohang);
      
    $info= D('Hire') ->order('upd_time')
       ->where(array('cat_pid'=>hire_id))
       ->select();
    foreach($info as $k => $v)
    {
   	  for($index = 0; $index < 8; $index++)
      {
     	  if($info[$k]['hire_degree'] == $index)
	      {
	      	 $info[$k]['hire_degree'] =  $degree[$index];
	      }
      }        
    }
    $this -> assign('info',$info);
    $this->display(); 
  }
   
  function detail($hire_id = null)
  {
		 $degree = array('小学', '中学', '中职', '高职', '大专', '本科', '硕士研究生', '博士研究生');
		 $work_year = array('1-3年工作经验', '3-6年工作经验', '6-10年工作经验', '10年以上工作经验');
     $daohang = array
     (
         'title1' => '招聘列表',
         'title2' => '招聘详情',
     );
     $this -> assign('daohang',$daohang);
     $info= D('Hire')->where(array('hire_id'=>$hire_id))->select();
	   $info =$info[0];
     for($index = 0; $index < 8; $index++)
     {
     	 if($info['hire_degree'] == $index)
	     {
	      	$info['hire_degree'] =  $degree[$index];
	     }
     } 
     
     for($j = 0; $j < 4; $j++)
     {
     	 if($info['work_year'] == $j)
	     {
	      	$info['work_year'] =  $work_year[$j];
	     }
     }
     $this -> assign('info',$info); 
     
     $hireinfo= D('Hireinfo')->where(array('hire_id'=>$hire_id))->select();
     $this -> assign('hireinfo',$hireinfo); 
     $this->display(); 
  } 
  
  function addhire()
  {
    $daohang = array
    (
      'title1' => '招聘管理',
      'title2' => '添加招聘信息',
      'act' => '返回',
      'act_link' => U('showlist'),
    );
    $this -> assign('daohang',$daohang);
    $this->display(); 
    if(IS_POST)
    {
      $hire = new \Model\HireModel();
      $shuju = $hire -> create();
      $shuju['add_time'] = time();
      $shuju['upd_time'] = time();
      if($hire->add($shuju))
      {
        $this -> success('添加成功',U('showlist'),1);
      }
      else
      {
        $this -> error('添加失败',U('addhire'),1);
      }
    }
  }
  
  function addhireIterm()
  {
    $daohang = array
    (
      'title1' => '招聘管理',
      'title2' => '添加职责与要求',
      'act' => '返回',
      'act_link' => U('showlist'),
    );
    
    $this -> assign('daohang',$daohang);
    $this->display();
    $hire_id = I('get.hire_id');
    if(IS_POST)
    {  
      $hiretype = D('Hireinfo');
      $shuju = $hiretype -> create();
      $shuju['hire_id'] = $hire_id;
      $shuju['add_time'] = time();
      $shuju['upd_time'] = time();
      if($hiretype->add($shuju))
      {
        $this -> success('添加成功',U('detail', array('hire_id'=> $hire_id)), 1);
      }
      else
      {
        $this -> error('添加失败',U('addhireIterm', array('hire_id'=> $hire_id)),1);
      }
    }
  }
  
  public function delhire()
  {
    $hire_id = I('get.hire_id');
    $hireinfo = D('Hireinfo')
       ->where(array('hire_id'=>$hire_id)) 
       ->delete();
       
    $hire = D('Hire')
         ->where(array('hire_id'=>$hire_id)) 
         ->delete();
    $this -> success('删除成功',U('showlist'),1);
  }
  
  function updhire()
  {
    $daohang = array
    (
      'title1' => '招聘管理',
      'title2' => '修改招聘信息',
    );
    $this -> assign('daohang',$daohang);
    $hire_id =I('get.hire_id');
    $info= D('Hire')
       ->where(array('hire_id' => $hire_id))
       ->select();
    $info =$info[0];
    if(IS_POST)
    {
      $hireinfo = new \Model\HireModel();
      $shuju = $hireinfo -> create();
      $shuju['upd_time'] = time();
      if($hireinfo->save($shuju))
      {
        $this -> success('修改成功',U('showlist',array('hire_id'=>$info[hire_id])),1);
      }
      else
      {
        $this -> error('修改失败',U('updtype',array('hire_id'=>$hire_id)),1);
      }
    }
    else
    {
      $this -> assign('info',$info);
      $this->display(); 
    }
  }
  
  public function updhireItem()
  {
  	$daohang = array
    (
      'title1' => '招聘管理',
      'title2' => '修改招聘要求',
    );
    $this -> assign('daohang', $daohang);
    $hire_id =I('get.hire_id');
    $info= D('Hireinfo')
       ->where(array('hire_id'=>$hire_id))
       ->select();
    if(IS_POST)
    {
      $hireinfo = D('Hireinfo');
      foreach($info as $k => $v)
      {
       	$shuju['hire_id'] = $v.['hire_id'];
       	$shuju = $hireinfo -> create();
       
        $shuju['upd_time'] = time();
        if($hireinfo->save($shuju))
        {
          $this->success('修改成功',U('showlist',array('hire_id'=>$info[hire_id])),1);
        }
        else
        {
          $this->error('修改失败',U('updhireItem',array('hire_id'=>$hire_id)),1);
        }
      }
    }
    else
    {
      $this -> assign('info', $info);
      $this->display(); 
    }	
  }
}

 
              
               