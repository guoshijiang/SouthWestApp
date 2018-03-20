<?php
namespace Admin\Controller;
use Tools\AdminController;
class ImagesController extends AdminController
{
	function showlist()
  {
    $daohang = array
    (
      'title1' => '图片图标',
      'title2' => '图片图标列表',
      'act' => '添加',
      'act_link' => U('addImgs'),
    );
    $this -> assign('daohang',$daohang);  
    $info = D('Images')->select();
    $this -> assign('info',$info);
    $this->display();  
  }	
  
  function addImgs()
  {
    $daohang = array
    (
      'title1' => '图片图标',
      'title2' => '添加图标图片',
      'act' => '返回',
      'act_link' => U('showlist'),
    );
    $this -> assign('daohang',$daohang);
    $this->display(); 
    if(IS_POST)
    {
      $imgs = new \Model\ImagesModel();
      $shuju = $imgs -> create();
      $shuju['add_time'] = time();
      $shuju['upd_time'] = time();
      $shuju['img_name'] = $_POST[img_name];
      $this -> uploadImg($shuju);
       
      if($imgs->add($shuju))
      {
        $this -> success('添加成功','showlist',1);
      }
      else
      {
        $this -> error('添加失败','tianjia',1);
      }
    }
  }
  
  function updImgs($img_id = null)
  {
    $daohang = array
    (
      'title1'   =>  '图片图标',
      'title2'   =>  '修改图片图标',
      'act'      =>  '返回',
      'act_link' =>  U('showlist'),
    );
    $this -> assign('daohang', $daohang);
    if(IS_POST)
    {
      $img = new \Model\ImagesModel();
      $shuju = $img -> create();
      $shuju['upd_time']  = time();
      $shuju['img_name'] = $_POST[img_name];
      $this -> uploadImg($shuju);
      if($img->save($shuju))
      {
        $this -> success('修改成功',U('showlist'),1);
      }
      else
      {
        $this -> error('修改失败',U('updImgs'),1);
      }
    }
    else
	  {
	    $info= D('Images')->where(array('img_id'=>$img_id))->select();
	    $info =$info[0];
	    $this -> assign('info',$info);
	    $this->display(); 
	  }
  }
  
  private function uploadImg(&$data)
  {
  	
    if($_FILES['img_img']['error'] === 0)
    {
	    if(!empty($data['img_id']))
	    {
        $oldinfo = D('Images')->find($data['img_id']);
        if(!empty($oldinfo['img_img']))
        {
          unlink($oldinfo['img_img']);
        }
	    }
      $cfg = array(
          'rootPath' => './IconImgs/',
        ); 
        
      $up = new \Think\Upload($cfg);
      $z = $up -> uploadOne($_FILES['img_img']);
      $imgname = $up->rootPath.$z['savepath'].$z['savename'];
      $im = new \Think\Image();
      $im -> open($imgname);
      $im -> save($imgname);
      $data['img_img'] = $imgname;
    }
  }
}