<?php
namespace Admin\Controller;
use Tools\AdminController;
class TrainingController extends AdminController 
{
	function showlist()
  {   
  	$trainWay = array('面授', '网络授课');
    $daohang = array
    (
      'title1' => '培训管理',
      'title2' => '培训列表',
      'act' => '添加',
      'act_link' => U('addTraining'),
    );
    $this -> assign('daohang',$daohang);
      
    $info= D('Training') ->order('upd_time')
       ->select();
    foreach($info as $k => $v)
    {
   	  for($index = 0; $index < 2; $index++)
      {
     	  if($info[$k]['train_way'] == $index)
	      {
	      	 $info[$k]['train_way'] =  $trainWay[$index];
	      }
      }        
    }
    $this -> assign('info',$info);
    $this->display(); 
  }
  
  function trDetail($train_id = null)
  {
  	$trainWay = array('面授', '网络授课');
    $daohang = array
    (
       'title1' => '培训列表',
       'title2' => '培训信息详情',
    );
    $this -> assign('daohang',$daohang);
    $info= D('Training')->where(array('train_id'=>$train_id))->select();
	  $info =$info[0];
    for($index = 0; $index < 2; $index++)
    {
   	  if($info[$k]['train_way'] == $index)
      {
      	 $info[$k]['train_way'] =  $trainWay[$index];
      }
    } 
    $this -> assign('info',$info); 
    $tinfo= D('Tinfo')->where(array('train_id'=>$train_id))->select();
    $this -> assign('tinfo',$tinfo); 
    $this->display(); 
  }
  
  function addTraining()
  {
    $daohang = array
    (
      'title1' => '培训管理',
      'title2' => '添加培训信息',
      'act' => '返回',
      'act_link' => U('showlist'),
    );
    $this -> assign('daohang',$daohang);
    $this->display(); 
    if(IS_POST)
    {
      $train = new \Model\TrainingModel();
      $shuju = $train -> create();
      $shuju['add_time'] = time();
      $shuju['upd_time'] = time();
      $this -> deal_logo($shuju);
      if($train->add($shuju))
      {
        $this -> success('添加成功',U('showlist'),1);
      }
      else
      {
        $this -> error('添加失败',U('addTraining'),1);
      }
    }
  }
  
  private function deal_logo(&$data)
  {
	   if($_FILES['teacher_photo']['error']===0)
	   {
	      if(!empty($data['train_id']))
	      {
	        $oldinfo = D('Training')->find($data['train_id']);
	        if(!empty($oldinfo['teacher_yphoto']))
	        {
	             unlink($oldinfo['teacher_yphoto']);
	        }
	        if(!empty($oldinfo['teacher_sphoto']))
	        {
	            unlink($oldinfo['teacher_sphoto']);
	        }
	      }
	     $cfg = array
	     (
	        'rootPath' => './TeacherPhoto/',
	      );
	     $up = new \Think\Upload($cfg);
	     $z = $up -> uploadOne($_FILES['teacher_photo']);
	     $bigname = $up->rootPath.$z['savepath'].$z['savename'];
	     $data['teacher_yphoto'] = $bigname;
	     $im = new \Think\Image();
	     $im -> open($bigname);
	     $im -> thumb(80,80,1);
	     $smallname = $up->rootPath.$z['savepath'].'s_'.$z['savename'];
	     $im -> save($smallname);
	     $data['teacher_sphoto'] = $smallname;
	   }
  }
  
  function addtrItem()
  {
    $daohang = array
    (
      'title1' => '培训管理',
      'title2' => '添加培训内容',
      'act' => '返回',
      'act_link' => U('showlist'),
    );
    $this -> assign('daohang',$daohang);
    $this->display();
    $train_id = I('get.train_id');
    if(IS_POST)
    {  
      $tinfo = D('Tinfo');
      $shuju = $tinfo -> create();
      $shuju['train_id'] = $train_id;
      $shuju['add_time'] = time();
      $shuju['upd_time'] = time();
      if($tinfo->add($shuju))
      {
        $this -> success('添加成功',U('trDetail', array('train_id'=> $train_id)), 1);
      }
      else
      {
        $this -> error('添加失败',U('addtrItem', array('train_id'=> $train_id)),1);
      }
    }
  }
  
  public function delTraining()
  {
    $train_id = I('get.train_id');
    $oldinfo = D('Training')->find($train_id);
    if(!empty($oldinfo['teacher_yphoto']))
    {
         unlink($oldinfo['teacher_yphoto']);
    }
    if(!empty($oldinfo['teacher_sphoto']))
    {
        unlink($oldinfo['teacher_sphoto']);
    }
    $trainingInfo = D('Training')
       ->where(array('train_id'=>$train_id)) 
       ->delete();
    $tinfo = D('Tinfo')
       ->where(array('train_id'=>$train_id)) 
       ->delete();
    $this->success('删除成功',U('showlist'),1);
  }
  
  function updTraining()
  {
    $daohang = array
    (
      'title1' => '培训管理',
      'title2' => '修改培训信息',
    );
    $this -> assign('daohang',$daohang);
    $train_id =I('get.train_id');
    $info = D('Training')
       ->where(array('train_id' => $train_id))
       ->select();
    $info =$info[0];
    if(IS_POST)
    {
      $tinfo = new \Model\TrainingModel;
      $shuju = $tinfo -> create();
      $shuju['upd_time'] = time();
      $this -> deal_logo($shuju);
      if($tinfo->save($shuju))
      {
        $this -> success('修改成功',U('showlist',array('train_id'=>$info[train_id])),1);
      }
      else
      {
        $this -> error('修改失败',U('updTraining',array('train_id'=>$train_id)),1);
      }
    }
    else
    {
      $this -> assign('info',$info);
      $this->display(); 
    }
  }
  
  public function updtrItem()
  {
  	$daohang = array
    (
      'title1' => '培训管理',
      'title2' => '修改培训内容',
    );
    $this -> assign('daohang', $daohang);
    $train_id =I('get.train_id');
    $info= D('Tinfo')
       ->where(array('train_id'=>$train_id))
       ->select();
    if(IS_POST)
    {
      $hireinfo = D('Tinfo');
      foreach($info as $k => $v)
      {
       	$shuju['train_id'] = $v.['train_id'];
       	$shuju = $hireinfo -> create();
        $shuju['upd_time'] = time();
        if($hireinfo->save($shuju))
        {
          $this->success('修改成功',U('showlist',array('train_id'=>$info[train_id])),1);
        }
        else
        {
          $this->error('修改失败',U('updtrItem',array('train_id'=>$train_id)),1);
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