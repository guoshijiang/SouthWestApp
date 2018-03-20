<?php
namespace Admin\Controller;
//use Tools\AdminController;
use Tools\AdminController;
class UserController extends AdminController {
    function showlist(){
        $daohang = array(
            'title1' => '用户管理',
            'title2' => '用户列表',
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        $info= D('User')
            ->order('user_id desc')
            ->select();
        $usertotal =count($info);
        $this -> assign('usertotal',$usertotal);
        $this->display(); 
    }
}
