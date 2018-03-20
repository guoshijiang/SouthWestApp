<?php
namespace Model;
use Think\Model;
class DynamicModel extends Model
{
	 public function getDynamicList()
	 {
     $Dynphote = new \Model\DynphotoModel();
     $result = $this -> where($data) -> select();
     foreach($result as $key=>$value) 
     {   	
       $result[$key]['dyn_pho_headimg']   = $Dynphote -> getDynPhotByDynid($result[$key]['dyn_id']);   
       $result[$key]['dyn_pho_centerimg'] = $Dynphote -> getDynPhotByDynid($result[$key]['dyn_id']);
       $result[$key]['dyn_pho_bottomimg'] = $Dynphote -> getDynPhotByDynid($result[$key]['dyn_id']);    
     }
     return $result;
  }
}