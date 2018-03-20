<?php
namespace Admin\Controller;
//use Tools\AdminController;
use Tools\AdminController;
class GoodsController extends AdminController 
{
  //商品列表
  function showlist()
  {
    $daohang = array
    (
       'title1' => '商品管理',
       'title2' => '商品列表',
       'act' => '添加',
       'act_link' => U('tianjia'),
    );
    $this -> assign('daohang',$daohang);
    $this -> assign('info',$info);
    $cateinfo = D('Category')
          ->where(array('cat_pid'=>55))
          ->select();
    $this -> assign('cateinfo',$cateinfo);
    $this->display(); 
  }
    
//点击事件
 public function find(){
    $cat_id       = I('get.cat_id');
    $goods_name  = I('get.goods_name');
    if($cat_id){
       if($cat_id !=='0'){
           $info= D('Goods')
                ->where(array('cat_id'=>$cat_id))
                ->field('goods_id')
                ->order('goods_id desc')
                ->select();

        }else if($cat_id ==='0'){
          $info= D('Goods')
                ->field('goods_id')
                ->order('goods_id desc')
                ->select();
        }
    }else{
          $info= D('Goods')
                ->field('goods_id')
                ->order('goods_id desc')
                ->select();
    }
    $sum = '';
    $count = count($info);
    for($i = 0; $i < $count; $i++){
        $sum .= $info[$i]['goods_id'].',';
    }
   $sum = rtrim($sum, ",");
   $sum = explode(',',$sum);
   $goodsct_ids = $sum;
    if($goods_name){ 
         $info1= D('Goods')
                ->where(array('goods_name'=>array('like',"%$goods_name%")))
                ->field('goods_id')
                ->order('goods_id desc')
                ->select();
    }else{
          $info1= D('Goods')
                ->field('goods_id')
                ->order('goods_id desc')
                ->select();
    }
    $sum1 = '';
        $count = count($info1);
        for($i = 0; $i < $count; $i++){
            $sum1 .= $info1[$i]['goods_id'].',';
        }
       $sum1 = rtrim($sum1, ",");
       $sum1 = explode(',',$sum1);
       $goodsss_ids = $sum1;
     $goods_ids = array_intersect( $goodsss_ids,$goodsct_ids);
     $goods_ids = empty($goods_ids)?'0':$goods_ids;
      if(empty($goods_ids)){
        $ss = 0;
      }else{
        $ss = count($goods_ids);
      }
      if($goods_ids=='0'){
          $info2= D('Goods')
                ->field('goods_id')
                ->order('goods_id desc')
                ->select();
          $sum2 = '';
          $count = count($info2);
           for($i = 0; $i < $count; $i++){
             $sum2 .= $info2[$i]['goods_id'].',';
           }
           $sum2 = rtrim($sum2, ",");
           $sum2 = explode(',',$sum2);
           $goods_ids = $sum2;
           $goodstotal =count($goods_ids);
      }
      $goodstotal =  count($goods_ids);
      $goods_ids = implode(',',$goods_ids);
      $arr = array(
        "goodstotal"   =>$goodstotal,
        "ss"              =>$ss,
        "goods_ids"    =>$goods_ids,
       );
     $arr = implode(',',$arr);
     echo json_encode($arr);
 }
 //ajax获得员工信息
   public function getgoods($page_index){
          $per = 5;
          $goods_ids = I('get.goods_ids');
          $page_index = I('get.page_index');//当前页码-1  的信息
           $info= D('Goods')
              ->alias('g')
              ->join('__CATEGORY__ c on g.cat_id=c.cat_id')
              ->field('g.*,c.cat_name')
              ->order('g.upd_time desc')
              ->where(array('g.goods_id' =>array('in',$goods_ids)))
              ->limit($page_index*$per,$per)
              ->select();
        echo json_encode($info);
    }
//属性列表
  function typeshowlist(){
        $daohang = array(
            'title1' => '商品管理',
            'title2' => '商品属性列表',
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        $goods_id = I('get.goods_id');
        $infogoods= D('Goods')
              ->where(array('goods_id'=>$goods_id))
              ->field('goods_name,goods_id')
              ->select();
        $infogoods = $infogoods[0];
        $this -> assign('infogoods',$infogoods);
       // dump($infogoods);
        $info= D('Goodtype')
              ->where(array('goods_id'=>$goods_id))
              ->order('upd_time desc')
              ->select();
        //dump($info);
        $this -> assign('info',$info);
        $this->display(); 
    }
    //商品详情
  function goodsxiangqing(){
        $daohang = array(
            'title1' => '商品管理',
            'title2' => '商品详情',
            'act' => '返回',
            'act_link' => U('showlist'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        $goods_id = I('get.goods_id');
        $infogoods= D('Goods')
              ->where(array('goods_id'=>$goods_id))
              ->select();
        $infogoods = $infogoods[0];
        $this -> assign('infogoods',$infogoods);
       // dump($infogoods);
        $info= D('Goodtype')
              ->where(array('goods_id'=>$goods_id))
              ->order('upd_time desc')
              ->select();
        //dump($info);
        $this -> assign('info',$info);
        $this->display(); 
    }
    //添加商品属性
     function tianjiatype(){
        $daohang = array(
            'title1' => '商品管理',
            'title2' => '添加商品属性',
            'act' => '返回',
            'act_link' => U('showlist'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        $goods_id = I('get.goods_id');
        if(IS_POST){
           //dump($_FILES['goods_xc']);
           //dump($_POST);//die();
            $goodstype = new \Model\GoodtypeModel();
            $shuju = $goodstype -> create();
            $shuju['add_time']       = time();
            $shuju['upd_time']       = time();
            $this -> deal_xctype($shuju);
            if($goodstype->add($shuju)){
              $this -> success('添加成功',U('typeshowlist',array('goods_id'=> $goods_id)),1);
            }else{
              $this -> error('添加失败',U('tianjiatype',array('goods_id'=> $goods_id)),1);
            }
        }else{
            $this -> assign('goods_id',$goods_id );
            // dump($cateinfo);
            $this->display(); 
        }
    }
     //添加主商品相关信息添加到属性表中
     private function tianjiagoodstype($goods_id){
            $info = D(Goods)
                 ->where(array('goods_id'=>$goods_id))
                 ->select();
            $info = $info[0];
           $arr =array(
                'goods_id'         => $info[goods_id],
                'goods_name'       => $info[goods_name],
                'goods_price'      => $info[goods_price],
                'goods_number'     => $info[goods_number],
                'goods_weight'     => $info[goods_weight],
                'goods_xc1'        => $info[goods_xc1],
                'goods_s_xc1'      => $info[goods_s_xc1],
                'goods_xc2'        => $info[goods_xc2],
                'goods_s_xc2'      => $info[goods_s_xc2],
                'goods_xc3'        => $info[goods_xc3],
                'goods_s_xc3'      => $info[goods_s_xc3],
                'add_time'         => time() ,
                'upd_time'         => time() ,
            );
           D('Goodtype') ->add($arr);
    }
    function tianjia(){
        $daohang = array(
            'title1' => '商品管理',
            'title2' => '添加商品',
            'act' => '返回',
            'act_link' => U('showlist'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        if(IS_POST){
           // dump($_FILES['goods_xc']);
           // dump($_FILES['goods_xc1']);
           // dump($_POST);die();
            $goods = new \Model\GoodsModel();
            $shuju = $goods -> create();
            $shuju['add_time']       = time();
            $shuju['upd_time']       = time();
            $this -> deal_logo($shuju);
            $this -> deal_xc($shuju);
            if($newid = $goods->add($shuju)){
               $this -> tianjiagoodstype($newid);
               $this -> success('添加成功',U('showlist'),1);
            }else{
              $this -> error('添加失败',U('tianjia'),1);
            }
        }else{
           $cateinfo = D('Category')
                ->where(array('cat_pid'=>55))
                ->select();
            $this -> assign('cateinfo',$cateinfo);
            // dump($cateinfo);
            $this->display(); 
        }
    }
   //商品logo图片处理
    private function deal_logo(&$data){
        if($_FILES['goods_tx']['error']===0){
            if(!empty($data['goods_id'])){
                  $oldinfo = D('Goods')->find($data['goods_id']);
                  if(!empty($oldinfo['goods_b_logo'])){
                       unlink($oldinfo['goods_b_logo']);
                  }
                  if(!empty($oldinfo['goods_s_logo'])){
                      unlink($oldinfo['goods_s_logo']);
                  }
            }
                $cfg = array(
                    'rootPath' => './Goodsimgs/',
                  );
                $up = new \Think\Upload($cfg);
                $z = $up -> uploadOne($_FILES['goods_tx']);
                $bigname = $up->rootPath.$z['savepath'].$z['savename'];
                $data['goods_b_logo'] = $bigname;
                $im = new \Think\Image();
                $im -> open($bigname);
                $im -> thumb(80,80,1);
                $smallname = $up->rootPath.$z['savepath'].'s_'.$z['savename'];
                $im -> save($smallname);
                $data['goods_s_logo'] = $smallname;
        }
    }
   //我的商品之删除
    public function del(){
      $goods_id = I('get.goods_id');
        $infotype = D('Goodtype')
                 ->where(array('goods_id'=>$goods_id))
                 ->field('goodtype_id') 
                 ->select();
        foreach($infotype as $k => $v){
            $oldinfo = D('Goodtype')
                ->find($v[goodtype_id]);
                 unlink($oldinfo['goods_xc1']);
                 unlink($oldinfo['goods_s_xc1']);
                 unlink($oldinfo['goods_xc2']);
                 unlink($oldinfo['goods_s_xc2']);
                 unlink($oldinfo['goods_xc3']);
                 unlink($oldinfo['goods_s_xc3']);
            // dump($oldinfo);
             $infotype = D('Goodtype')
               ->where(array('goodtype_id'=>$v[goodtype_id])) 
               ->delete();
        }
        $oldinfo1 = D('Goods')
             ->find($goods_id);
             if($oldinfo1){
                 unlink($oldinfo['goods_b_logo']);
                 unlink($oldinfo['goods_s_logo']);
                 unlink($oldinfo['goods_xc1']);
                 unlink($oldinfo['goods_s_xc1']);
                 unlink($oldinfo['goods_xc2']);
                 unlink($oldinfo['goods_s_xc2']);
                 unlink($oldinfo['goods_xc3']);
                 unlink($oldinfo['goods_s_xc3']);
             }
       // dump($oldinfo1);die();
        $info = D('Goods')
             ->where(array('goods_id'=>$goods_id)) 
             ->delete();
        $this -> success('删除成功',U('showlist'),1);
    }
    //我的商品属性之删除
    public function deltype(){
      $goodtype_id = I('get.goodtype_id');
      //dump($goods_id);die();
       $oldinfo = D('Goodtype')
               ->find($goodtype_id);
       $goods_id = $oldinfo[goods_id];
      //  dump($goods_id);
      // dump( $oldinfo);die();
       unlink($oldinfo['goods_xc1']);
       unlink($oldinfo['goods_s_xc1']);
       unlink($oldinfo['goods_xc2']);
       unlink($oldinfo['goods_s_xc2']);
       unlink($oldinfo['goods_xc3']);
       unlink($oldinfo['goods_s_xc3']);
        $info = D('Goodtype')
             ->where(array('goodtype_id'=>$goodtype_id)) 
             ->delete();
          //dump($info);
        $this -> success('删除成功',U('goodsxiangqing',array('goods_id'=>$goods_id)),1);
    }
  //商品属性相册处理
 private function deal_xctype(&$data){
            if(!empty($data['goodtype_id'])){
              //dump(1);die();
                  $oldinfo = D('Goods')->find($data['goodtype_id']);
                  if($_FILES['goods_xc1']['error']===0){
                         if(!empty($oldinfo['goods_xc1'])){
                            unlink($oldinfo['goods_xc1']);
                          }
                         if(!empty($oldinfo['goods_s_xc1'])){
                              unlink($oldinfo['goods_s_xc1']);
                          }
                      $cfg = array(  
                            'rootPath' => './Goodsimgs/',
                        );
                     $up = new \Think\Upload($cfg);
                     $z = $up -> upload(array('pics'=>$_FILES['goods_xc1']));
                     $im = new \Think\Image();
                    $yuanname = $up->rootPath.$z['pics']['savepath'].$z['pics']['savename'];
                    //dump($z['savepath']);
                     //dump($yuanname);die();
                    $data['goods_xc1'] =  $yuanname;
                    $im -> open($yuanname);//打开原图
                    $im -> thumb(400,400,6);//大图
                    $bigname = $up->rootPath.$z['pics']['savepath'].'s_'.$z['pics']['savename'];
                    $im -> save($bigname);
                    $data['goods_s_xc1'] = $bigname;
                  }
                  if($_FILES['goods_xc2']['error']===0){
                         if(!empty($oldinfo['goods_xc2'])){
                           unlink($oldinfo['goods_xc2']);
                          }
                         if(!empty($oldinfo['goods_s_xc2'])){
                              unlink($oldinfo['goods_s_xc2']);
                          }
                      $cfg = array(  
                            'rootPath' => './Goodsimgs/',
                        );
                     $up = new \Think\Upload($cfg);
                     $z = $up -> upload(array('pics'=>$_FILES['goods_xc2']));
                     $im = new \Think\Image();
                    $yuanname = $up->rootPath.$z['pics']['savepath'].$z['pics']['savename'];
                    $data['goods_xc2'] =  $yuanname;
                    $im -> open($yuanname);//打开原图
                    $im -> thumb(400,400,6);//大图
                    $bigname = $up->rootPath.$z['pics']['savepath'].'s_'.$z['pics']['savename'];
                    $im -> save($bigname);
                    $data['goods_s_xc2'] = $bigname;
                  }
                   if($_FILES['goods_xc3']['error']===0){
                         if(!empty($oldinfo['goods_xc3'])){
                           unlink($oldinfo['goods_xc3']);
                          }
                         if(!empty($oldinfo['goods_s_xc3'])){
                              unlink($oldinfo['goods_s_xc3']);
                          }
                      $cfg = array(  
                            'rootPath' => './Goodsimgs/',
                        );
                     $up = new \Think\Upload($cfg);
                     $z = $up -> upload(array('pics'=>$_FILES['goods_xc3']));
                     $im = new \Think\Image();
                    $yuanname = $up->rootPath.$z['pics']['savepath'].$z['pics']['savename'];
                    $data['goods_xc3'] =  $yuanname;
                    $im -> open($yuanname);//打开原图
                    $im -> thumb(400,400,6);//大图
                    $bigname = $up->rootPath.$z['pics']['savepath'].'s_'.$z['pics']['savename'];
                    $im -> save($bigname);
                    $data['goods_s_xc3'] = $bigname;
                  }
            }else{
               $cfg = array(  
                    'rootPath' => './Goodsimgs/',
                  );
                 $up = new \Think\Upload($cfg);
                 $z = $up -> upload(array('pics'=>$_FILES['goods_xc']));
                 $im = new \Think\Image();
                 foreach($z as $k => $v){
                      if($k=='0'){
                          $yuanname = $up->rootPath.$v['savepath'].$v['savename'];
                          $data['goods_xc1'] =  $yuanname;
                          $im -> open($yuanname);//打开原图
                          $im -> thumb(400,400,6);//大图
                          $bigname = $up->rootPath.$v['savepath'].'s_'.$v['savename'];
                          $im -> save($bigname);
                          $data['goods_s_xc1'] = $bigname;
                      }
                       if($k=='1'){
                            $yuanname = $up->rootPath.$v['savepath'].$v['savename'];
                            $data['goods_xc2'] =  $yuanname;
                            $im -> open($yuanname);//打开原图
                            $im -> thumb(400,400,6);//大图
                            $bigname = $up->rootPath.$v['savepath'].'s_'.$v['savename'];
                            $im -> save($bigname);
                            $data['goods_s_xc2'] = $bigname;
                       }
                       if($k=='2'){
                              $yuanname = $up->rootPath.$v['savepath'].$v['savename'];
                              $data['goods_xc3'] =  $yuanname;
                              $im -> open($yuanname);//打开原图
                              $im -> thumb(400,400,6);
                              $bigname = $up->rootPath.$v['savepath'].'s_'.$v['savename'];
                              $im -> save($bigname);
                              $data['goods_s_xc3'] = $bigname;
                       }
                  } 
          }
    }
//我的商品之修改属性
    function updtype(){
         $daohang = array(
            'title1' => '商品管理',
            'title2' => '修改商品属性信息',
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        $goodtype_id =I('get.goodtype_id');
        $info= D('Goodtype')
              ->where(array('goodtype_id'=>$goodtype_id))
              ->select();
        $info =$info[0];
        if(IS_POST){
        // dump($goodtype_id);
        // dump($_FILES['goods_tx']);
        // dump($_FILES['goods_xc1']);
        // dump($_FILES['goods_xc2']);
        // dump($_FILES['goods_xc3']);
        // dump($_POST);//die();
            $goodstype = new \Model\GoodtypeModel();
            $shuju = $goodstype -> create();
            $shuju['upd_time']       = time();
            $this -> deal_xctype($shuju);
            if($goodstype->save($shuju)){
              $this -> success('修改成功',U('goodsxiangqing',array('goods_id'=>$info[goods_id])),1);
            }else{
              $this -> error('修改失败',U('updtype',array('goodtype_id'=>$goodtype_id)),1);
            }
        }else{
          $this -> assign('info',$info);
          $this->display(); 
        }
    }
//主商品相册之修改
    private function deal_xc(&$data){
            if(!empty($data['goods_id'])){
              //dump(1);die();
                  $oldinfo = D('Goods')->find($data['goods_id']);
                  if($_FILES['goods_xc1']['error']===0){
                         if(!empty($oldinfo['goods_xc1'])){
                            unlink($oldinfo['goods_xc1']);
                          }
                         if(!empty($oldinfo['goods_s_xc1'])){
                              unlink($oldinfo['goods_s_xc1']);
                          }
                      $cfg = array(  
                            'rootPath' => './Goodsimgs/',
                        );
                     $up = new \Think\Upload($cfg);
                     $z = $up -> upload(array('pics'=>$_FILES['goods_xc1']));
                     $im = new \Think\Image();
                    $yuanname = $up->rootPath.$z['pics']['savepath'].$z['pics']['savename'];
                    //dump($z['savepath']);
                     //dump($yuanname);die();
                    $data['goods_xc1'] =  $yuanname;
                    $im -> open($yuanname);//打开原图
                    $im -> thumb(400,400,6);//大图
                    $bigname = $up->rootPath.$z['pics']['savepath'].'s_'.$z['pics']['savename'];
                    $im -> save($bigname);
                    $data['goods_s_xc1'] = $bigname;
                  }
                  if($_FILES['goods_xc2']['error']===0){
                         if(!empty($oldinfo['goods_xc2'])){
                           unlink($oldinfo['goods_xc2']);
                          }
                         if(!empty($oldinfo['goods_s_xc2'])){
                              unlink($oldinfo['goods_s_xc2']);
                          }
                      $cfg = array(  
                            'rootPath' => './Goodsimgs/',
                        );
                     $up = new \Think\Upload($cfg);
                     $z = $up -> upload(array('pics'=>$_FILES['goods_xc2']));
                     $im = new \Think\Image();
                    $yuanname = $up->rootPath.$z['pics']['savepath'].$z['pics']['savename'];
                    $data['goods_xc2'] =  $yuanname;
                    $im -> open($yuanname);//打开原图
                    $im -> thumb(400,400,6);//大图
                    $bigname = $up->rootPath.$z['pics']['savepath'].'s_'.$z['pics']['savename'];
                    $im -> save($bigname);
                    $data['goods_s_xc2'] = $bigname;
                  }
                   if($_FILES['goods_xc3']['error']===0){
                         if(!empty($oldinfo['goods_xc3'])){
                           unlink($oldinfo['goods_xc3']);
                          }
                         if(!empty($oldinfo['goods_s_xc3'])){
                              unlink($oldinfo['goods_s_xc3']);
                          }
                      $cfg = array(  
                            'rootPath' => './Goodsimgs/',
                        );
                     $up = new \Think\Upload($cfg);
                     $z = $up -> upload(array('pics'=>$_FILES['goods_xc3']));
                     $im = new \Think\Image();
                    $yuanname = $up->rootPath.$z['pics']['savepath'].$z['pics']['savename'];
                    $data['goods_xc3'] =  $yuanname;
                    $im -> open($yuanname);//打开原图
                    $im -> thumb(400,400,6);//大图
                    $bigname = $up->rootPath.$z['pics']['savepath'].'s_'.$z['pics']['savename'];
                    $im -> save($bigname);
                    $data['goods_s_xc3'] = $bigname;
                  }
            }else{
               $cfg = array(  
                    'rootPath' => './Goodsimgs/',
                  );
                 $up = new \Think\Upload($cfg);
                 $z = $up -> upload(array('pics'=>$_FILES['goods_xc']));
                 $im = new \Think\Image();
                 foreach($z as $k => $v){
                      if($k=='0'){
                          $yuanname = $up->rootPath.$v['savepath'].$v['savename'];
                          $data['goods_xc1'] =  $yuanname;
                          $im -> open($yuanname);//打开原图
                          $im -> thumb(400,400,6);//大图
                          $bigname = $up->rootPath.$v['savepath'].'s_'.$v['savename'];
                          $im -> save($bigname);
                          $data['goods_s_xc1'] = $bigname;
                      }
                       if($k=='1'){
                            $yuanname = $up->rootPath.$v['savepath'].$v['savename'];
                            $data['goods_xc2'] =  $yuanname;
                            $im -> open($yuanname);//打开原图
                            $im -> thumb(400,400,6);//大图
                            $bigname = $up->rootPath.$v['savepath'].'s_'.$v['savename'];
                            $im -> save($bigname);
                            $data['goods_s_xc2'] = $bigname;
                       }
                       if($k=='2'){
                              $yuanname = $up->rootPath.$v['savepath'].$v['savename'];
                              $data['goods_xc3'] =  $yuanname;
                              $im -> open($yuanname);//打开原图
                              $im -> thumb(400,400,6);
                              $bigname = $up->rootPath.$v['savepath'].'s_'.$v['savename'];
                              $im -> save($bigname);
                              $data['goods_s_xc3'] = $bigname;
                       }
                  } 
          }
    }
 //添加主商品相关信息修改到属性表中
     private function updgoodstype($goodtype_id,$goods_id){
         $info = D(Goods)
                 ->where(array('goods_id'=>$goods_id))
                 ->select();
         $info = $info[0];
           $arr =array(
                'goodtype_id'     => $goodtype_id,
                'goods_id'         => $info[goods_id],
                'goods_name'       => $info[goods_name],
                'goods_price'      => $info[goods_price],
                'goods_number'     => $info[goods_number],
                'goods_weight'     => $info[goods_weight],
                'goods_xc1'        => $info[goods_xc1],
                'goods_s_xc1'      => $info[goods_s_xc1],
                'goods_xc2'        => $info[goods_xc2],
                'goods_s_xc2'      => $info[goods_s_xc2],
                'goods_xc3'        => $info[goods_xc3],
                'goods_s_xc3'      => $info[goods_s_xc3],
                'add_time'         => $info[add_time],
                'upd_time'         => $info[upd_time],
            );
          $goodtype = new \Model\GoodtypeModel();
          $goodtype->save($arr);
    }
//我的商品之修改
    function upd(){
        $daohang = array(
            'title1' => '商品管理',
            'title2' => '修改商品信息',
            'act' => '返回',
            'act_link' => U('showlist'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        $goods_id =I('get.goods_id');
        $goodtype_id = D(Goodtype)
                 ->where(array('goods_id'=>$goods_id))
                 ->field('goodtype_id')
                 ->select();
        $goodtype_id = $goodtype_id[0]['goodtype_id'];
        //dump($goods_id);
        if(IS_POST){
            $goods = new \Model\GoodsModel(); 
            $shuju = $goods -> create();
            $shuju['upd_time']       = time();
            $this ->deal_logo($shuju);
            $this ->deal_xc($shuju);
            if($goods->save($shuju)){
              $this -> updgoodstype($goodtype_id,$goods_id);
              $this -> success('修改成功',U('showlist'),1);
            }else{
              $this -> error('修改失败',U('upd',array('goods_id'=>$goods_id)),1);
            }
        }else{
              $info= D('Goods')
                    ->where(array('goods_id'=>$goods_id))
                    ->select();
              $info =$info[0];
               //dump($info);
              $this -> assign('info',$info);
               $cateinfo = D('Category')
                      ->where(array('cat_pid'=>55))
                      ->select();
                $this -> assign('cateinfo',$cateinfo);
                // dump($cateinfo);
                $this->display(); 
        }
    }
}
