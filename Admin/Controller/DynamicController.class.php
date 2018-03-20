<?php
namespace Admin\Controller;
use Tools\AdminController;
class DynamicController extends AdminController 
{
  function showlist()
  {
    $daohang = array
    (
      'title1' => '公司动态',
      'title2' => '动态列表',
      'act' => '添加',
      'act_link' => U('addplay'),
    );
    $this -> assign('daohang',$daohang);  
    $cateinfo = D('Category')->where(array('cat_pid'=>58))->select();
    $this -> assign('cateinfo',$cateinfo);
    $this -> assign('info',$info);
    $this->display();  
  }
  
  public function find($cat_id= null, $dyn_title=null)
  {
    if($cat_id)
    {
	    if($cat_id !=='0')
	    {
	      $info= D('Dynamic')->where(array('cat_id'=>$cat_id))->field('dyn_id') ->order('dyn_id') 
	       ->select();
	    }
	    else if($cat_id ==='0')
	    {
	        $info= D('Dynamic')->field('dyn_id')->order('dyn_id')->select();
	    }
    }
    else
    {
      $info= D('Dynamic') ->field('dyn_id')->order('dyn_id')
      	->select();
    }
    $sum = '';
    $count = count($info);
    for($i = 0; $i < $count; $i++)
    {
      $sum .= $info[$i]['dyn_id'].',';
    }
    $sum = rtrim($sum, ",");
    $sum = explode(',',$sum);
    $dyncat_ids = $sum;
    if($dyn_title)
    { 
    	$info1= D('Dynamic')->where(array('dyn_title'=>array('like',"%$dyn_title%")))
      	->field('dyn_id')
        ->order('dyn_id')
        ->select();
    }
    else
    {
      $info1= D('Dynamic')->field('dyn_id')
      	->order('dyn_id desc')
      	->select();
    }
    $sum1 = '';
    $count = count($info1);
    for($i = 0; $i < $count; $i++)
    {
        $sum1 .= $info1[$i]['dyn_id'].',';
    }
    $sum1 = rtrim($sum1, ",");
    $sum1 = explode(',',$sum1);
    $dynss_ids = $sum1;
    $dyn_ids = array_intersect( $dynss_ids,$dyncat_ids);
    $dyn_ids = empty($dyn_ids)?'0':$dyn_ids;
    if(empty($dyn_ids))
    {
     	$ss = 0;
    }
    else
    {
     	$ss = count($dyn_ids);
    }
    if($dyn_ids=='0')
    {
      $info2= D('Dynamic')->field('dyn_id') ->order('dyn_id desc') ->select();   
      $sum2 = '';
      $count = count($info2);
      for($i = 0; $i < $count; $i++)
      {
        $sum2 .= $info2[$i]['dyn_id'].',';
      }
      $sum2 = rtrim($sum2, ",");
      $sum2 = explode(',',$sum2);
      $dyn_ids = $sum2;
      $dyntotal =count($dyn_ids);
    }
    $dyntotal =  count($dyn_ids);
    $dyn_ids = implode(',',$dyn_ids);
    $arr = array
    (
      "dyntotal" =>  $dyntotal,
      "ss"       =>  $ss,
      "dyn_ids"  =>  $dyn_ids,
     );
   $arr = implode(',', $arr);
   echo json_encode($arr);
  }
  
	public function getDynamic($page_index)
	{
	  $per = 5;
	  $dyn_ids = I('get.dyn_ids');
	  $page_index = I('get.page_index');
	  $info= D('Dynamic')->alias('y')->join('__CATEGORY__ c on y.cat_id=c.cat_id')
	  	->field('y.*,c.cat_name')->order('y.dyn_id')
	    ->where(array('y.dyn_id' =>array('in',$dyn_ids)))
	    ->limit($page_index * $per, $per)
	    ->select();
	  echo json_encode($info);
	}
	
	function addplay()
	{
    $daohang = array
    (
        'title1' => '动态管理',
        'title2' => '添加动态',
        'act' => '返回',
        'act_link' => U('showlist'),
    );
    $this -> assign('daohang',$daohang);
    
    if(IS_POST)
    {  
      $dynamic = new \Model\DynamicModel();
      $shuju = $dynamic -> create();
      $shuju['add_time']       = time();
      $shuju['upd_time']       = time();
      $shuju['dyn_content']  =  strip_tags($_POST[dyn_content]);
      $this -> uploadImg($shuju);
      if($dynamic->add($shuju))
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
      $cateinfo = D('Category')->where(array('cat_pid'=>58))->select();
      $this -> assign('cateinfo',$cateinfo);
      $this->display(); 
    }
  }
  
  //删除动态
  public function delplay()
  {
    $dyn_id = I('get.dyn_id');
    $delinfo = D('Dynamic')->find($dyn_id);
	  if(!empty($delinfo['dyn_pho_headimg']))
	  {
	    unlink($delinfo['dyn_pho_headimg']);
	  }
      
    if(!empty($delinfo['dyn_pho_centerimg']))
    {
       unlink($delinfo['dyn_pho_centerimg']); 
    }
    
    if(!empty($delinfo['dyn_pho_bottomimg']))
    {
       unlink($delinfo['dyn_pho_bottomimg']); 
    }
    $info = D('Dynamic')->where(array('dyn_id'=>$dyn_id))->delete();
    $this -> success('删除成功',U('showlist'),1);
  }
  
  function upd_play()
  {
    $daohang = array
    (
        'title1' => '公司动态',
        'title2' => '修改动态信息',
        'act' => '返回',
        'act_link' => U('showlist'),
    );
    $this -> assign('daohang',$daohang); 
    $dyn_id =I('get.dyn_id');  
    if(IS_POST)
    {
      $dynamic = new \Model\DynamicModel();
      $shuju = $dynamic -> create();
      $shuju['upd_time']       = time();
      $shuju['dyn_content'] = $_POST[dyn_content];
      $this -> deal_Img($shuju);
      if($dynamic->save($shuju))
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
      $info= D('Dynamic')->where(array('dyn_id'=>$dyn_id))->select();
      $info =$info[0];
      $this -> assign('info',$info);
      $cateinfo = D('Category')->where(array('cat_pid'=>58))->select();
      $this -> assign('cateinfo',$cateinfo);
      $this->display(); 
    }
  }
  
  private function uploadImg(&$data)
  {
    if(!empty($data['dyn_id']))
    {
	    $oldinfo = D('Dynamic')->find($data['dyn_id']);
	    if(!empty($oldinfo['dyn_pho_yheadimg']))
	    {
	      unlink($oldinfo['dyn_pho_yheadimg']);
	    }
	    if(!empty($oldinfo['dyn_pho_headimg']))
	    {
	      unlink($oldinfo['dyn_pho_headimg']);
	    }
	    
	    if(!empty($oldinfo['dyn_pho_ycenterimg']))
	    {
	      unlink($oldinfo['dyn_pho_ycenterimg']);
	    }
	    if(!empty($oldinfo['dyn_pho_centerimg']))
	    {
	      unlink($oldinfo['dyn_pho_centerimg']);
	    }
	    
	    if(!empty($oldinfo['dyn_pho_ybottomimg']))
	    {
	      unlink($oldinfo['dyn_pho_ybottomimg']);
	    }
	    if(!empty($oldinfo['dyn_pho_bottomimg']))
	    {
	      unlink($oldinfo['dyn_pho_bottomimg']);
	    }
	  }
	  $cfg = array(
	      'rootPath' => './DynamicImg/',
	    );
	   $up = new \Think\Upload($cfg);
	   $z = $up -> upload(array('pics'=>$_FILES['dyn_pho']));
	   $im = new \Think\Image();
	   foreach($z as $k => $v)
	   {
       if($k=='0')
       {
          $dyname = $up->rootPath.$v['savepath'].$v['savename'];
          $data['dyn_pho_yheadimg'] =  $dyname;
          $im -> open($dyname);
          $im -> thumb(400,400,6);
          $bigname = $up->rootPath.$v['savepath'].'s_'.$v['savename'];
          $im -> save($bigname);
          $data['dyn_pho_headimg'] = $bigname;
       }
        
       if($k=='1')
       {
          $dyname = $up->rootPath.$v['savepath'].$v['savename'];
          $data['dyn_pho_ycenterimg'] =  $dyname;
          $im -> open($dyname);
          $im -> thumb(400,400,6);
          $bigname = $up->rootPath.$v['savepath'].'s_'.$v['savename'];
          $im -> save($bigname);
          $data['dyn_pho_centerimg'] = $bigname;
       }
       
       if($k=='2')
       {
	        $dyname = $up->rootPath.$v['savepath'].$v['savename'];
	        $data['dyn_pho_ybottomimg'] =  $dyname;
	        $im -> open($dyname);
	        $im -> thumb(400,400,6);
	        $bigname = $up->rootPath.$v['savepath'].'s_'.$v['savename'];
	        $im -> save($bigname);
	        $data['dyn_pho_bottomimg'] = $bigname;
       }
	   }   
  } 
  
  private function deal_Img(&$data)
  {  	         
    if(!empty($data['dyn_id']))
    {
      $oldinfo = D('Dynamic')->find($data['dyn_id']);
      if($_FILES['dyn_pho_yheadimg']['error']===0)
      {
        if(!empty($oldinfo['dyn_pho_yheadimg']))
        {
          unlink($oldinfo['dyn_pho_yheadimg']);
        }
        if(!empty($oldinfo['dyn_pho_headimg']))
        {
          unlink($oldinfo['dyn_pho_headimg']);
        }
        $cfg = array
        (  
          'rootPath' => './DynamicImg/',
        );
        $up = new \Think\Upload($cfg);
        $z = $up -> upload(array('pics'=>$_FILES['dyn_pho_yheadimg']));
        $im = new \Think\Image();
        $yuanname = $up->rootPath.$z['pics']['savepath'].$z['pics']['savename'];
        $data['dyn_pho_yheadimg'] =  $yuanname;
        $im -> open($yuanname);
        $im -> thumb(400,400,6);
        $bigname = $up->rootPath.$z['pics']['savepath'].'s_'.$z['pics']['savename'];
        $im -> save($bigname);
        $data['dyn_pho_headimg'] = $bigname;
      }
      if($_FILES['dyn_pho_ycenterimg']['error']===0)
      {
	      if(!empty($oldinfo['dyn_pho_ycenterimg']))
	      {
	        unlink($oldinfo['dyn_pho_ycenterimg']);
	      }
	      if(!empty($oldinfo['dyn_pho_centerimg']))
	      {
	        unlink($oldinfo['dyn_pho_centerimg']);
	      }
        $cfg = array
        (  
          'rootPath' => './DynamicImg/',
        );
        $up = new \Think\Upload($cfg);
        $z = $up -> upload(array('pics'=>$_FILES['dyn_pho_ycenterimg']));
        $im = new \Think\Image();
        $yuanname = $up->rootPath.$z['pics']['savepath'].$z['pics']['savename'];
        $data['dyn_pho_ycenterimg'] =  $yuanname;
        $im -> open($yuanname);
        $im -> thumb(400,400,6);
        $bigname = $up->rootPath.$z['pics']['savepath'].'s_'.$z['pics']['savename'];
        $im -> save($bigname);
        $data['dyn_pho_centerimg'] = $bigname;
      }
      
      if($_FILES['dyn_pho_ybottomimg']['error']===0)
      {
        if(!empty($oldinfo['dyn_pho_ybottomimg']))
        {
          unlink($oldinfo['dyn_pho_ybottomimg']);
        }
        if(!empty($oldinfo['dyn_pho_bottomimg']))
        {
          unlink($oldinfo['dyn_pho_bottomimg']); 
        }
        $cfg = array
        (  
          'rootPath' => './DynamicImg/',
        );
        $up = new \Think\Upload($cfg);
        $z = $up -> upload(array('pics'=>$_FILES['dyn_pho_ybottomimg']));
        $im = new \Think\Image();
        $yuanname = $up->rootPath.$z['pics']['savepath'].$z['pics']['savename'];
        $data['dyn_pho_ybottomimg'] =  $yuanname;
        $im -> open($yuanname);
        $im -> thumb(400,400,6);
        $bigname = $up->rootPath.$z['pics']['savepath'].'s_'.$z['pics']['savename'];
        $im -> save($bigname);
        $data['dyn_pho_bottomimg'] = $bigname;
      }
    }
    else
    {   
       $cfg = array
       (  
         'rootPath' => './DynamicImg/',
       );
       $up = new \Think\Upload($cfg);
       $z = $up -> upload(array('pics'=>$_FILES['dyn_pho']));
       $im = new \Think\Image();
       foreach($z as $k => $v)
       {
          if($k=='0')
          {
            $yuanname = $up->rootPath.$v['savepath'].$v['savename'];
            $data['dyn_pho_yheadimg'] = $yuanname;
            $im -> open($yuanname);
            $im -> thumb(400,400,6);
            $bigname = $up->rootPath.$v['savepath'].'s_'.$v['savename'];
            $im -> save($bigname);
            $data['dyn_pho_headimg'] = $bigname;
            
          }
          if($k=='1')
          {
            $yuanname = $up->rootPath.$v['savepath'].$v['savename'];
            $data['dyn_pho_ycenterimg'] =  $yuanname;
            $im -> open($yuanname);
            $im -> thumb(400,400,6);
            $bigname = $up->rootPath.$v['savepath'].'s_'.$v['savename'];
            $im -> save($bigname);
            $data['dyn_pho_centerimg'] = $bigname;
          }
          if($k=='2')
          {
            $yuanname = $up->rootPath.$v['savepath'].$v['savename'];
            $data['dyn_pho_ybottomimg'] =  $yuanname;
            $im -> open($yuanname);
            $im -> thumb(400,400,6);
            $bigname = $up->rootPath.$v['savepath'].'s_'.$v['savename'];
            $im -> save($bigname);
            $data['dyn_pho_bottomimg'] = $bigname;
          }
       } 
    }
  }
}
