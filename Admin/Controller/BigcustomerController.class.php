<?php
namespace Admin\Controller;
use Tools\AdminController;
class BigcustomerController extends AdminController 
{
	function showlist()
  {
    $daohang = array
    (
      'title1' => '行业客户',
      'title2' => '客户信息列表',
      'act' => '添加',
      'act_link' => U('addcustomer'),
    );
    $this -> assign('daohang',$daohang);  
    $info = D('Bigcustomer')->select();
    $this -> assign('info',$info);
    $this->display();  
  }
  
  function addcustomer()
  {
    $daohang = array
    (
      'title1' => '行业客户',
      'title2' => '添加行业客户',
      'act' => '返回',
      'act_link' => U('showlist'),
    );
    $this -> assign('daohang',$daohang);
    $this->display(); 
    if(IS_POST)
    {
      $bigcustomer = new \Model\BigcustomerModel();
      $shuju = $bigcustomer -> create();
      $shuju['add_time'] = time();
      $shuju['upd_time'] = time();
      $shuju['bct_content'] = $_POST[bct_content];
      $this -> deal_logo($shuju);
      if($bigcustomer->add($shuju))
      {
        $this -> success('添加成功','showlist',1);
      }
      else
      {
        $this -> error('添加失败','tianjia',1);
      }
    }
  }
  
  private function deal_logo(&$data)
  {
    if($_FILES['teacher_yphoto']['error'] === 0)
    {
	    if(!empty($data['train_id']))
	    {
        $oldinfo = D('Training')->find($data['train_id']);
        if(!empty($oldinfo['teacher_yphoto']))
        {
          unlink($oldinfo['teacher_yphoto']);
        }
        if(!empty($oldinfo['teacher_photo']))
        {
          unlink($oldinfo['teacher_photo']);
        }
	    }
      $cfg = array(
          'rootPath' => './BigcustomerImg/',
        );   
      $up = new \Think\Upload($cfg);
      $z = $up -> uploadOne($_FILES['bct_img']);
      $bigname = $up->rootPath.$z['savepath'].$z['savename'];
      $data['bct_yimg'] = $bigname;
      $im = new \Think\Image();
      $im -> open($bigname);
      $im -> thumb(80,80,1);
      $smallname = $up->rootPath.$z['savepath'].'s_'.$z['savename'];
      $im -> save($smallname);
      $data['bct_simg'] = $smallname;
    }
  }
  
  public function delcustomer()
  {
    $bct_id = I('get.bct_id');
    $oldinfo = D('Bigcustomer')->find($bct_id);
    if(!empty($oldinfo['bct_yimg']))
    {
    	unlink($oldinfo['bct_yimg']);
    }
    if(!empty($oldinfo['bct_simg']))
    {
      unlink($oldinfo['bct_simg']);
    }
    $info = D('Bigcustomer')->where(array('bct_id'=>$bct_id))
    	 ->delete();
    $this -> success('删除成功',U('showlist'),1);
  }
  
  function updcustomer($bct_id = null)
  {
    $daohang = array
    (
      'title1' => '行业客户',
      'title2' => '修改客户信息',
      'act' => '返回',
      'act_link' => U('showlist'),
    );
    $this -> assign('daohang',$daohang);
    if(IS_POST)
    {
      $bigcustomer = new \Model\BigcustomerModel();
      $shuju = $bigcustomer -> create();
      $shuju['upd_time']  = time();
      $shuju['bct_content'] = $_POST[bct_content];
      $this -> deal_logo($shuju);
      if($bigcustomer->save($shuju))
      {
        $this -> success('修改成功',U('showlist'),1);
      }
      else
      {
        $this -> error('修改失败',U('upd'),1);
      }
    }
    else
	  {
	    $info= D('Bigcustomer')->where(array('bct_id'=>$bct_id))->select();
	    $info =$info[0];
	    $this -> assign('info',$info);
	    $this->display(); 
	  }
  }
}