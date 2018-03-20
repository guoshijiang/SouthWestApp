<?php
namespace Model;
use Think\Model;
class DynphotoModel extends Model
{
	 public function getDynPhotByDynid($dyn_id)
	 { 
     $result = $this -> getBydyn_id($dyn_id);
     return $result; 
  }
}