<?php
namespace Model;
use Think\Model;
class CommentModel extends Model
{
	 public function getCommentList($keyword) 
	 {
     $User = D('Home/User');
     $Yuangong = D('Home/Yuangong');
		 $Goodtype = D('Home/Goodtype');
     $data['cmt_msg'] = array('like','%'.$keyword.'%');
     $result = $this -> where($data) -> select();
     foreach($result as $key=>$value) 
     {   	
       $result[$key]['username'] = $User -> getUsernameByUid($result[$key]['user_id']);       
       $result[$key]['yuangong_name'] = $Yuangong -> getYgNameeByYid($result[$key]['yuangong_id']);
       $result[$key]['goods_name'] = $Goodtype->getGoodsNameByGoodtypeId($result[$key]['goods_id']);
     }
     return $result;
  }
}