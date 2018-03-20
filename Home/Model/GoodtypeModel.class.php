<?php
namespace Home\Model;
use Think\Model;

class GoodtypeModel extends Model 
{
	 public function getGoodsNameByGoodtypeId($goods_id) 
  {
    $result = $this -> getBygoodtype_id($goods_id);
    return $result ? $result['goods_name'] : '评论的是员工';
  }
}