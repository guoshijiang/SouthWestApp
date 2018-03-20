<?php
namespace Admin\Controller;
use Tools\AdminController;
class BackinfoController extends AdminController 
{
	function showlist()
  {
  	$binfoStatus = array('未处理', '已处理');
    $daohang = array
    (
      'title1' => '客户反馈',
      'title2' => '客户反馈信息列表',
    );
    $this -> assign('daohang',$daohang);  
    $info = D('Backinfo')->select();
    
    foreach($info as $k => $v)
    {
   	  for($index = 0; $index < 2; $index++)
      {
     	  if($info[$k]['binfo_status'] == $index)
	      {
	      	 $info[$k]['binfo_status'] =  $binfoStatus[$index];
	      }
      }        
    }
    
    $this -> assign('info',$info);
    $this->display();  
  }
  
  
  public function delbackinfo()
  {
    $binfo_id = I('get.binfo_id');    
    $info = D('Backinfo')->where(array('binfo_id'=>$binfo_id))->delete();
    $this -> success('删除成功',U('showlist'), 1);
  }
  
  function handlebinfo($binfo_id = null)
  {
    $daohang = array
    (
      'title1' => '客户反馈',
      'title2' => '处理客户反馈信息',
      'act' => '返回',
      'act_link' => U('showlist'),
    );
    $this -> assign('daohang',$daohang);
    if(IS_POST)
    {
      $binfo = new \Model\BackinfoModel();
      $shuju = $binfo -> create();
      $shuju['upd_time']  = time();
      $shuju['bct_content'] = $_POST[bct_content];
      if($binfo->save($shuju))
      {
        $this -> success('处理成功',U('showlist'),1);
      }
      else
      {
        $this -> error('处理失败',U('handlebinfo'),1);
      }
    }
    else
	  {
	    $info= D('Backinfo')->where(array('binfo_id'=>$binfo_id))->select();
	    $info =$info[0];
	    $this -> assign('info',$info);
	    $this->display(); 
	  }
  }
}