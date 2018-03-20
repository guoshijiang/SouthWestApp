<?php
namespace Admin\Controller;
use Tools\AdminController;
class YuangongController extends AdminController
{
 function showlist()
 {
   $daohang = array
   (
     'title1' => '员工管理',
     'title2' => '员工列表',
     'act' => '添加',
     'act_link' => U('tianjia'),
   );
   $this -> assign('daohang',$daohang);
   $cateinfo = D('Category')
      ->where(array('cat_pid'=>9))
      ->select();
   $this -> assign('cateinfo',$cateinfo);
   $this->display(); 
 }
    //点击事件
 public function find()
 {
   $cat_id = I('get.cat_id');
   $yuangong_name  = I('get.yuangong_name');
   if($cat_id)
   {
     if($cat_id !=='0')
     {
       $info= D('Yuangong')
          ->where(array('cat_id'=>$cat_id))
          ->field('yuangong_id')
          ->order('yuangong_id desc')
          ->select();
     }
     else if($cat_id ==='0')
     {
       $info= D('Yuangong')
          ->field('yuangong_id')
          ->order('yuangong_id desc')
          ->select();
     }
  }
  else
  {
    $info= D('Yuangong')
       ->field('yuangong_id')
       ->order('yuangong_id desc')
       ->select();
  }
  $sum = '';
  $count = count($info);
  for($i = 0; $i < $count; $i++)
  {
    $sum .= $info[$i]['yuangong_id'].',';
  }
  $sum = rtrim($sum, ",");
  $sum = explode(',',$sum);
  $yuangongct_ids = $sum;
  if($yuangong_name)
  { 
    $info1= D('Yuangong')
       ->where(array('yuangong_name'=>array('like',"%$yuangong_name%")))
       ->field('yuangong_id')
       ->order('yuangong_id desc')
       ->select();
  }
  else
  {
    $info1= D('Yuangong')
        ->field('yuangong_id')
        ->order('yuangong_id desc')
        ->select();
  }
  $sum1 = '';
  $count = count($info1);
  for($i = 0; $i < $count; $i++)
  {
      $sum1 .= $info1[$i]['yuangong_id'].',';
  }
  $sum1 = rtrim($sum1, ",");
  $sum1 = explode(',',$sum1);
  $yuangongss_ids = $sum1;
  $yuangong_ids = array_intersect( $yuangongss_ids,$yuangongct_ids);
  $yuangong_ids = empty($yuangong_ids)?'0':$yuangong_ids;
  if(empty($yuangong_ids))
  {
    $ss = 0;
  }
  else
  {
    $ss = count($yuangong_ids);
  }
  if($yuangong_ids=='0')
  {
    $info2= D('Yuangong')
          ->field('yuangong_id')
          ->order('yuangong_id desc')
          ->select();
    $sum2 = '';
    $count = count($info2);
    for($i = 0; $i < $count; $i++)
    {
      $sum2 .= $info2[$i]['yuangong_id'].',';
    }
    $sum2 = rtrim($sum2, ",");
    $sum2 = explode(',',$sum2);
    $yuangong_ids = $sum2;
    $yuangongtotal =count($yuangong_ids);
  }
    $yuangongtotal =  count($yuangong_ids);
    $yuangong_ids = implode(',',$yuangong_ids);
    $arr = array
    (
      "yuangongtotal"   =>$yuangongtotal,
      "ss"              =>$ss,
      "yuangong_ids"    =>$yuangong_ids,
     );
    $arr = implode(',',$arr);
    echo json_encode($arr);
 }
 //ajax获得员工信息
 public function getyuangong($page_index)
 {
   $per = 5;
   $yuangong_ids = I('get.yuangong_ids');
   $page_index = I('get.page_index');
   $info= D('Yuangong')
      ->alias('y')
      ->join('__CATEGORY__ c on y.cat_id=c.cat_id')
      ->field('y.*,c.cat_name')
      ->order('y.upd_time desc')
      ->where(array('y.yuangong_id' =>array('in',$yuangong_ids)))
      ->limit($page_index*$per,$per)
      ->select();
   echo json_encode($info);
 }
 
 function tianjia()
 {
  $daohang = array
  (
      'title1' => '员工管理',
      'title2' => '添加员工',
      'act' => '返回',
      'act_link' => U('showlist'),
  );
  $this -> assign('daohang',$daohang);
  if(IS_POST)
  {
    $yuangong = new \Model\YuangongModel();
    $shuju = $yuangong -> create();
    $shuju['add_time']       = time();
    $shuju['upd_time']       = time();
    $this -> deal_logo($shuju);
    if($yuangong->add($shuju))
    {
      $this -> success('添加成功','showlist',1);
    }
    else
    {
      $this -> error('添加失败','tianjia',1);
    }
  }
  else
  {
    $cateinfo = D('Category')
       ->where(array('cat_pid'=>9))
       ->select();
    $this -> assign('cateinfo',$cateinfo);
    $this->display(); 
  }
 }
 private function deal_logo(&$data)
 {
   if($_FILES['yuangong_tx']['error']===0)
   {
      if(!empty($data['yuangong_id']))
      {
        $oldinfo = D('Yuangong')->find($data['yuangong_id']);
        if(!empty($oldinfo['yuangong_b_tx']))
        {
             unlink($oldinfo['yuangong_b_tx']);
        }
        if(!empty($oldinfo['yuangong_s_tx']))
        {
            unlink($oldinfo['yuangong_s_tx']);
        }
      }
     $cfg = array
     (
        'rootPath' => './Yuangongtouxiang/',
      );
     $up = new \Think\Upload($cfg);
     $z = $up -> uploadOne($_FILES['yuangong_tx']);
     $bigname = $up->rootPath.$z['savepath'].$z['savename'];
     $data['yuangong_b_tx'] = $bigname;
     $im = new \Think\Image();
     $im -> open($bigname);
     $im -> thumb(80,80,1);
     $smallname = $up->rootPath.$z['savepath'].'s_'.$z['savename'];
    
     $im -> save($smallname);
     $data['yuangong_s_tx'] = $smallname;
   }
 }
    
 public function del()
 {
   $yuangong_id = I('get.yuangong_id');
   $oldinfo = D('Yuangong')->find($yuangong_id);
   if(!empty($oldinfo['yuangong_b_tx']))
   {
     unlink($oldinfo['yuangong_b_tx']);
   }
   if(!empty($oldinfo['yuangong_s_tx']))
   {
     unlink($oldinfo['yuangong_s_tx']);
   }
   $info = D('Yuangong')
      ->where(array('yuangong_id'=>$yuangong_id)) 
      ->delete();
   $this -> success('删除成功',U('showlist'),1);
 }
     
 function upd()
 {
   $daohang = array
   (
      'title1' => '员工管理',
      'title2' => '修改员工信息',
      'act' => '返回',
      'act_link' => U('showlist'),
   );
   $this -> assign('daohang',$daohang);
   $yuangong_id =I('get.yuangong_id');
   if(IS_POST)
   {
      $yuangong = new \Model\YuangongModel();
      $shuju = $yuangong -> create();
      $shuju['upd_time']       = time();
      $this -> deal_logo($shuju);
      if($yuangong->save($shuju))
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
     $info= D('Yuangong')
        ->where(array('yuangong_id'=>$yuangong_id))
        ->select();
     $info =$info[0];
     $this -> assign('info',$info);
     $cateinfo = D('Category')
       ->where(array('cat_pid'=>9))
       ->select();
     $this -> assign('cateinfo',$cateinfo);
     $this->display(); 
   }
 }
}
