<?php
namespace Home\Model;
use Think\Model;

class YuangongModel extends Model 
{
	 public function getYgNameeByYid($yuangong_id) 
  {
      $result = $this -> getByyuangong_id($yuangong_id);
      return $result ? $result['yuangong_name'] : '评论的是商品';
  }
}