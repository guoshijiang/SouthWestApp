<?php
namespace Admin\Controller;
use Tools\AdminController;
class CommentController extends AdminController 
{
  function showlist($keyword = "")
  {
      $daohang = array(
          'title1' => '评论管理',
          'title2' => '评论列表',
      );
      $this -> assign('daohang',$daohang);
      $comment = new \Model\CommentModel();
      $info = $comment->getCommentList($keyword);       
      $this -> assign('info',$info);
      $this->display(); 
  }
  
  public function del_comment()
  {
    $cmt_id =I('get.cmt_id');
    $info = D('Comment')->where(array('cmt_id'=>$cmt_id))->delete();
    $this -> success('删除成功',U('showlist'),1);
  }
  
  function update_comment()
  {
    $daohang = array(
        'title1' => '评论管理',
        'title2' => '修改评论信息',
        'act' => '返回',
        'act_link' => U('showlist'),
    );
    $this -> assign('daohang',$daohang);
    $cmt_id =I('get.cmt_id');
    if(IS_POST)
    {
      $comment = new \Model\CommentModel();
      $shuju = $comment -> create();
      $shuju['upd_time']       = time();
      $shuju['cmt_msg']     = $_POST[cmt_msg];
      if($comment->save($shuju))
      {
        $this -> success('修改成功',U('showlist'),1);
      }
      else
      {
        $this -> error('修改失败',U('update_comment',array('cmt_id'=>$cmt_id)),1);
      }
    }
    else
    {
      $info= D('Comment')->where(array('cmt_id'=>$cmt_id))->select();
      $info =$info[0];
      $this -> assign('info',$info);
      $this->display(); 
    }
  }
}
